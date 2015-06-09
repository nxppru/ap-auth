<?php
namespace admin\Model;
use Think\Model;
use Think\Exception;
class AgencyModel extends Model{
	protected $handler ;
	protected $cache;
 	function __construct() {
 		$this->handler = M('agency');
 	}
 	/**
	 +----------------------------------------------------------
	 * 获取代理商总数
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $username 用户名
	 * @param $password 密码
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function get_agency_count(){
		return $this->handler->count();
	}
 	/**
	 +----------------------------------------------------------
	 * 获取代理商列表
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $username 用户名
	 * @param $password 密码
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
 	public function get_agency_list($pagenum, $pagelen, $sortkey, $reverse, $where1){
 		$tp = $this->handler->tablePrefix;
 		//定义搜索和排序字段
        $field = array(
        	'user_id'			=> 'a.user_id',
        	'manager'			=> 'a.manager',
        	'merchant_limit'	=> 'a.merchant_limit',
        	'allow_modify'		=> 'a.allow_modify',
        	'username'			=> 'b.username',
        	'agency_name'		=> 'a.agency_name',
        );
        $sortkey = empty($sortkey) ? 'user_id' : $sortkey;
        $reverse = empty($reverse) ? 'desc' : $reverse;
        $pagelen = intval($pagelen) == 0 ? 20 : $pagelen;
        $start = 0;
        if (intval($pagenum) > 0){
        	$start = (intval($pagenum) - 1) * intval($pagelen);
  
        }
        //查询字段
        $where = array();
        
        if (!empty($where1['keyword'])){
        	$where1['keyword'] = urldecode($where1['keyword']);
        	$where['b.username'] = array('like', $where1['keyword'] . '%');
        }

 
    	if (!empty($where1['time_start']) || !empty($where1['time_end'])){
    		if (empty($where1['time_start']) && !empty($where1['time_end'])){
        		$where1['time_start'] = date('Y-m-d');
        	}
        	if (empty($where1['time_end']) && !empty($where1['time_start'])){
        		$where1['time_end'] = date('Y-m-d');
        	}
        	$where1['time_end'] = $where1['time_end'] . ' 23:59:59';
        	if (strtotime($where1['time_start']) < strtotime($where1['time_end'])){
        		$where['b.created_at'] = array('BETWEEN', array($where1['time_start'], $where1['time_end']));
        	}
    	}
 		//获取总数
 		$count = $this->handler->table($tp . 'agency as a')->join('LEFT JOIN '.$tp . 'admins as b ON a.user_id = b.id')->where($where)->count();
 		$list = $this->handler->field('a.*, b.username, b.activated')->table($tp . 'agency as a')->join('LEFT JOIN '.$tp . 'admins as b ON a.user_id = b.id')->order($field[$sortkey] . ' ' . $reverse)->where($where)->limit($start. ',' . $pagelen)->select();

 		return array('list'=>$list, 'count'=>$count);
 	}
 	/**
	 +----------------------------------------------------------
	 * 新增代理商
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $param 数组
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function add_agency($param){
		if (empty($param['username']) || strlen($param['username']) < 2 || strlen($param['username'])>20){
			throw new Exception("账号不能为空，或者长度不在范围之内[2-20]", 1);
		}
		if (empty($param['password'])){
			throw new Exception("密码不能为空", 1);
		}
		if ($param['passwordconfirm'] != $param['password']){
			throw new Exception("两次密码不一致", 1);
		}
		if (empty($param['agency_name']) || mb_strlen($param['agency_name'], 'utf8') < 2 || mb_strlen($param['agency_name'], 'utf8') > 20){
			throw new Exception("代理商名称不能为空，或者长度不在范围之内[2-20]", 1);
		}
		if (empty($param['merchant_limit']) || intval($param['merchant_limit']) < 1 || intval($param['merchant_limit']) > 9999){
			throw new Exception("允许新增商户数不能为空，或者不在规定范围之内[1-9999]", 1);
		}
		if(intval($param['allow_modify']) > 9999){
			throw new Exception("可发短信数不能为空，或者不在规定范围之内[0-999999]", 1);
		}
		//开启事务，添加代理商
		$this->handler->startTrans();
		//添加账号到登录表中
		$admin = D('Admin');
		$admin_rs = $admin->add_admin(array('username'=>$param['username'], 'password'=>$param['password'], 'group_id'=>2, 'parent_uid'=>0, 'disable'=>$param['disable']));
		if (!$admin_rs){
			$this->handler->rollback();
			throw new Exception("添加账号失败，请重试", 1);
			
		}
		//添加代理商详细表
		$rs = $this->handler->add(array(
			'user_id'      		=> $admin_rs,
            'agency_name'     	=> $param['agency_name'],
            'manager'       	=> $param['manager'],
            'mobile'            => $param['mobile'],
            'qq'             	=> $param['qq'],
            'allow_modify' 		=> $param['allow_modify'],
            'merchant_limit'    => $param['merchant_limit'],
            'company_address' 	=> $param['company_address'],
		));
		if (!$rs){
			$this->handler->rollback();
			throw new Exception("添加代理商详细信息失败，请重试", 1);
		}
		$this->handler->commit();
	}
	/**
	 +----------------------------------------------------------
	 * 编辑代理商
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $param 数组
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function edit_agency($param){
		
		if(intval($param['user_id']) == 0){
			throw new Exception("请选择需要编辑的代理商", 1);
		}
		
		if (empty($param['agency_name']) || mb_strlen($param['agency_name'], 'utf8') < 2 || mb_strlen($param['agency_name'], 'utf8') > 20){
			throw new Exception("代理商名称不能为空，或者长度不在范围之内[2-20]", 1);
		}
		if (empty($param['merchant_limit']) || intval($param['merchant_limit']) < 1 || intval($param['merchant_limit']) > 9999){
			throw new Exception("允许新增商户数不能为空，或者不在规定范围之内[1-9999]", 1);
		}
		if(intval($param['allow_modify']) > 9999){
			throw new Exception("可发短信数不能为空，或者不在规定范围之内[0-9999]", 1);
		}
		//检查该代理商是否存在
		$list = $this->get_agency_by_id($param['user_id']);
		if (!is_array($list)){
			throw new Exception("该代理商不存在", 1);
		}
		//开启事务，添加代理商
		$this->handler->startTrans();
		//添加账号到登录表中
		$admin = D('Admin');
		$admin_rs = $admin->edit_admin(array('id'=>$param['user_id'], 'disable'=>$param['disable']));
		if ($admin_rs === false){
			$this->handler->rollback();
			throw new Exception("修改账号状态失败，请重试", 1);
			
		}
		//添加代理商详细表
		$rs = $this->handler->where(array('user_id'=>$param['user_id']))->save(array(
            'agency_name'     	=> $param['agency_name'],
            'manager'       	=> $param['manager'],
            'mobile'            => $param['mobile'],
            'qq'             	=> $param['qq'],
            'allow_modify' 		=> $param['allow_modify'],
            'merchant_limit'    => $param['merchant_limit'],
            'company_address' 	=> $param['company_address'],
		));
	
		if ($rs === false){
			$this->handler->rollback();
			throw new Exception("修改代理商详细信息失败，请重试", 1);
		}
		$this->handler->commit();
	}
	/**
	 +----------------------------------------------------------
	 * 保存认证设置
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $id
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function save_auth($param){
		$this->handler->where(array('user_id'=>session('adminid')))->save(array(
			'auth_href'	=> $param['auth_href'],
		));
		return true;
	}
	/**
	 +----------------------------------------------------------
	 * 根据代理商编号获取代理商信息
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $id
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function get_agency_by_id($id){
		$tp = $this->handler->tablePrefix;
		$list = $this->handler->field('a.*, b.username, b.activated')->table($tp . 'agency as a')->join($tp . 'admins as b ON a.user_id = b.id')->where(array('a.user_id'=>$id))->find();
		return $list;
	}
	/**
	 +----------------------------------------------------------
	 * 删除代理商
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $id
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function del_anency($id){
		//开启事务，添加代理商
		$this->handler->startTrans();
		//删除账号到登录表中
		$admin = D('Admin');
		$admin_rs = $admin->del_admin($id);
		if ($admin_rs === false){
			$this->handler->rollback();
			throw new Exception("删除账号状态失败，请重试", 1);
			
		}
		//删除代理商详细表
		$rs = $this->handler->where(array('user_id'=>array('IN', $id)))->delete();
		if (!$rs){
			$this->handler->rollback();
			throw new Exception("删除代理商失败，请重试", 1);
		}
		$this->handler->commit();
	}
	/**
	 +----------------------------------------------------------
	 * 重置密码
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $id
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function update_password($id, $password){
		$admin = D('Admin');
		$rs = $admin->update_password($id, $password);
		if ($rs === false){
			throw new Exception("重置密码失败，请重试", 1);
		}
		return true;
	}
	/**
	 +----------------------------------------------------------
	 * 新增短信数
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $id, $num
	 +----------------------------------------------------------
	 * @return bool
	 +----------------------------------------------------------
	*/
	public function inc_modify_num($id, $num){
		$agency_info = $this->get_agency_by_id($id);
		if (!is_array($agency_info)){
			throw new Exception("该代理商不存在", 1);
		}
		$rs = $this->handler->where(array('user_id'=>$id))->save(array(
			'allow_modify'	=> intval($agency_info['allow_modify'])+intval($num),
			'use_modify'	=> intval($agency_info['use_modify'])-intval($num),
		));

		//如果当前登录用户是该代理商，则修改其短信数和使用数
		if ($agency_info['user_id'] == session('adminid')){
			session('allow_modify', intval($agency_info['allow_modify']) + intval($num));
			session('use_modify', intval($agency_info['use_modify'])-intval($num));
		}
		return $rs;
	}
	/**
	 +----------------------------------------------------------
	 * 减少短信数
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $id, $num
	 +----------------------------------------------------------
	 * @return bool
	 +----------------------------------------------------------
	*/
	public function dec_modify_num($id, $num){
		$agency_info = $this->get_agency_by_id($id);
		if (!is_array($agency_info)){
			throw new Exception("该代理商不存在", 1);
		}
		if (intval($agency_info['allow_modify']) < intval($num)){
			throw new Exception("该代理商的短信数不足", 1);
		}
		$rs = $this->handler->where(array('user_id'=>$id))->save(array(
			'allow_modify'	=> intval($agency_info['allow_modify'])-intval($num),
			'use_modify'	=> intval($agency_info['use_modify'])+intval($num),
		));
		//如果当前登录用户是该代理商，则修改其短信数
		if ($agency_info['user_id'] == session('adminid')){
			session('allow_modify', intval($agency_info['allow_modify'])-intval($num));
			session('use_modify', intval($agency_info['use_modify'])+intval($num));
		}
		return $rs;
	}
	/**
	 +----------------------------------------------------------
	 * 新增商户数
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $id, $num
	 +----------------------------------------------------------
	 * @return bool
	 +----------------------------------------------------------
	*/
	public function inc_merchant_num($id, $num){
		$agency_info = $this->get_agency_by_id($id);
		if (!is_array($agency_info)){
			throw new Exception("该代理商不存在", 1);
		}
		$rs = $this->handler->where(array('user_id'=>$id))->save(array(
			'merchant_limit'	=> intval($agency_info['merchant_limit'])+intval($num),
			'use_merchant'	=> intval($agency_info['use_merchant'])-intval($num),
		));
		$adminid = session('adminid');
		//如果当前登录用户是该代理商，则修改其短信数和使用数
		if ($agency_info['user_id'] == session('adminid')){
			session('merchant_limit', intval($agency_info['merchant_limit']) + intval($num));
			session('use_merchant', intval($agency_info['use_merchant'])-intval($num));
		}
		return $rs;
	}
	/**
	 +----------------------------------------------------------
	 * 减少商户数
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $id, $num
	 +----------------------------------------------------------
	 * @return bool
	 +----------------------------------------------------------
	*/
	public function dec_merchant_num($id, $num){
		$agency_info = $this->get_agency_by_id($id);
		if (!is_array($agency_info)){
			throw new Exception("该代理商不存在", 1);
		}
		if (intval($agency_info['merchant_limit']) < intval($num)){
			throw new Exception("该代理商的商户数不足", 1);
		}
		$rs = $this->handler->where(array('user_id'=>$id))->save(array(
			'merchant_limit'	=> intval($agency_info['merchant_limit'])-intval($num),
			'use_merchant'	=> intval($agency_info['use_merchant'])+intval($num),
		));
		//如果当前登录用户是该代理商，则修改其短信数
		if ($agency_info['user_id'] == session('adminid')){
			session('merchant_limit', intval($agency_info['merchant_limit'])-intval($num));
			session('use_merchant', intval($agency_info['use_merchant'])+intval($num));
		}
		return $rs;
	}
}