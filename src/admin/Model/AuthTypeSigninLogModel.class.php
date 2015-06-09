<?php
// +----------------------------------------------------------------------
// | openWMS (开源wifi营销平台)
// +----------------------------------------------------------------------
// | Copyright (c) 2015-2025 http://cnrouter.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.gnu.org/licenses/gpl-2.0.html )
// +----------------------------------------------------------------------
// | Author: PhperHong <phperhong@cnrouter.com>
// +----------------------------------------------------------------------
namespace admin\Model;
use Think\Model;
use Think\Exception;
use Think\Cache;
use Think\Log;

class AuthTypeSigninLogModel extends Model{
	protected $handler ;
	protected $cache;
 	function __construct() {
 		$this->handler = M('auth_type_signinlog');
 		$this->cache   = Cache::getInstance();
 	}
 	/**
     +----------------------------------------------------------
     * 添加用户登录日志
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param $param a
     +----------------------------------------------------------
     * @return array
     +----------------------------------------------------------
    */
 	public function add_auth_type_signinlog($param){
          $date = date('Y-m-d');
          $count = $this->handler->where(array('date'=>$date))->count();
          if ($count == 0){

               $rs = $this->handler->add(array(
                    $param['auth_type']	=> 1,
                    'date'         	=> date('Y-m-d'),
               ));
               

               if (!$rs){
                    Log::record('client_type_signinlog表插入数据失败，sql'.$this->handler->getLastSql());
               }
          }else{
               $rs = $this->handler->where(array('date'=>$date))->setInc($param['auth_type'], 1);
               if (!$rs){
                    Log::record('client_type_signinlog表更新数据失败，sql'.$this->handler->getLastSql());
               }
          }
 	}
	/**
     +----------------------------------------------------------
     * 统计全站认证方式
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @return array
     +----------------------------------------------------------
    */
    public function chart_auth_type($param){
    	$where = array();
    	if (!empty($param['time_start']) && !empty($param['time_end'])){
    		$where['date'] = array('between', $param['time_start'].','.$param['time_end']);
    	}
    	$list = $this->handler->field('sum(akey_verify) as akey_verify, sum(mobile) as mobile,sum(virtualmobile) as virtualmobile,sum(qq) as qq,sum(weixin_verify) as weixin_verify,sum(weibo) as weibo')->where($where)->find();
    	//获取详情
    	

    	return $list;
    }
    
    /**
     +----------------------------------------------------------
     * 统计代理商下用户认证方式
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @return array
     +----------------------------------------------------------
    */
    public function chart_auth_type_for_agency($param){
    	
    	//获取代理商下面的商户
    	$merchant = DD('Merchant');
    	$merchant_list = $merchant->get_merchant_by_parent_uid(session('adminid'));
    	if (!$merchant_list){
    		return false;
    	}
    	$mid = array();
    	foreach ($merchant_list as $key => $value) {
    		$mid[] = $value['mid'];
    	}
    	$where = array('mid'=>array('IN', implode(',', $mid)));
    	if (!empty($param['time_start']) && !empty($param['time_end'])){
    		$where['date'] = array('between', $param['time_start'].','.$param['time_end']);
    	}
    	$list = $this->handler->field('sum(akey_verify) as akey_verify, sum(mobile) as mobile,sum(virtualmobile) as virtualmobile,sum(qq) as qq,sum(weixin_verify) as weixin_verify,sum(weibo) as weibo')->where($where)->find();
    

    	return $list;
    }
}