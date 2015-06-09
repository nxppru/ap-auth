<?php
namespace admin\Model;
use Think\Model;
use Think\Exception;
use Think\Cache;
use Think\Log;
class RouterModel extends Model{
	protected $handler ;
	protected $cache;
	private   $redis_prefix='router:';
 	function __construct() {

 		$this->cache   = Cache::getInstance();
 	}
 	
 
 	/**
	 +----------------------------------------------------------
	 * 根据路由mac及商家热点账号获取路由信息
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $mac 路由mac
	 * @param $mid 热点账号
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function get_router_info($mac, $field){
		$key = $this->redis_prefix.strtolower($mac);
		
		if($this->cache->exists($key) == 0){
			return false;
		}
		if (!is_array($field)){
			$field = array('router_mac', 'status', 'router_address', 'router_type', 'wan_ip', 'sv', 'type', 'start_time', 'client_ip', 'sys_uptime', 'sys_memfree', 'sys_load', 'wifidog_uptime', 'check_time', 'clientcount', 'online_time');
		}
		$router_info = array();
		if (count($field) > 1){
			$data = $this->cache->hmget($key, $field);
	 		foreach ($field as $k => $value) {
	 			$router_info[$value] = $data[$k];
	 		}
		}else if(count($field) == 1){
			$router_info[$field[0]] = $this->cache->hget($key, $field[0]);
		}
	 	
		
	 	return $router_info;
	}

	/**
	 +----------------------------------------------------------
	 * 修改路由信息
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $mac 路由mac
	 * @param $mid 热点账号
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function update_router_info($mac, $f, $val){
	 	$key = $this->redis_prefix.strtolower($mac);
	 	if($this->cache->exists($key) == 0){
			return false;
		}
	 	$this->cache->hset($key, $f, $val);
	 	return true;
	}
 	/**
	 +----------------------------------------------------------
	 * 根据路由mac及商家热点账号更新路由信息
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $mac 路由mac
	 * @param $mid 热点账号
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
 	public function get_router_info_by_mac($params){
    	$mac = strtolower($params['gw_mac']);
 		$key = $this->redis_prefix.$mac;
 		$router_mac = C('router_mac');
 		if (empty($mac) || $mac != $router_mac){
 			return false;
 		}
 		
 		$client_ip = get_client_ip();

 	
 		//更新cache中的信息
 		$router_info = array();
 		$router_info['client_ip'] = $client_ip;
		$router_info['sys_uptime'] = $params['sys_uptime'];
		$router_info['sys_memfree'] = $params['sys_memfree'];
		$router_info['sys_load'] = $params['sys_load'];
		$router_info['wifidog_uptime'] = $params['wifidog_uptime'];
		$router_info['check_time'] = intval($params['check_time']) == 0 ? 120 : intval($params['check_time']);
		$router_info['clientcount'] = $params['clientcount'];
		$router_info['router_address'] = $params['gw_address'];
		$router_info['router_type'] = $params['router_type'];
		$router_info['wan_ip'] = $params['wan_ip'];
		$router_info['sv'] = $params['sv'];

		$router_info['online_time'] = time();//最后响应时间时间
		

		$this->set_redis_for_router_info($key, $router_info);
 		return true;
 	}
 	public function set_redis_for_router_info($key, $router_info){
		$this->cache->hmset($key, $router_info);
		return true;
 	}


	/**
	 +----------------------------------------------------------
	 * 检测路由是否合法
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $id 商家编号
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function check_router_by_mac($mac){
		$router_mac = C('router_mac');
		if ($mac != $router_mac){
			return false;
		}
		return true;
	}
	/**
	 +----------------------------------------------------------
	 * 编辑路由
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $param
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function edit_router($router_mac){
		if (empty($router_mac)){
			throw new Exception("请填写路由MAC", 1);
		}
		$mac = C('router_mac');

		//判断是否修改了MAC
		if ($router_mac != $mac){
			//删除源路由redis
			$key = 'router:'.strtolower($mac);
			if ($this->cache->exists($key) == 1){
				$this->cache->rm($key);
			}
			//删除路由配置信息
			$router_wifi_config = D('RouterWifiConfig');
			$router_wifi_config->del_wifi_config($mac);

			$client = D('Client');
			//将源路由mac中的用户踢下线
			$online_user_list = $client->get_online_user_list();
			foreach($online_user_list as $val){
				$client->kick($val[0]);
			}
		}
		$config = array(
   			'router_mac'		=> $router_mac,
   		);
   		$this->update_config($config);
		return true;
	}
	//修改配置文件
	protected function update_config($new_config) {
		$config_file = CONF_PATH . '/router.php';
		if (is_writable($config_file)) {
			$config = require $config_file;
			$config = array_merge($config, $new_config);
			file_put_contents($config_file, "<?php \nreturn " . var_export($config, true) . ";", LOCK_EX);
			@unlink(RUNTIME_FILE);
			return true;
		} else {
			return false;
		}
	}
 	/**
	 +----------------------------------------------------------
	 * 根据商家编号及路由编号获取路由信息
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $id 商家编号
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
 	public function get_router_info_id_userid($id, $user_id){
		//路由状态 离线 未连接  在线
		$router_info1 =  $this->handler->where(array('user_id'=>$user_id, 'id'=>$id))->find();
		if (!$router_info1){
			throw new Exception("路由不存在", 1);
		}
		return $this->get_router_info_by_id($id);
 	}
 	public function get_router_info_by_id($id){
 		$router_info1 =  $this->handler->where(array('id'=>$id))->find();
		if (!$router_info1){
			throw new Exception("路由不存在", 1);
		}
 		$clent = DD('Client');
		$router_info1['mid'] = strtolower($router_info1['mid']);
		//查看是否有路由连接上来

		$key = $this->redis_prefix.strtolower($router_info1['router_mac']);
		$key1 = 'not_router:'.strtolower($router_info1['router_mac']);
		
		//如果当前路由存在于未知路由列表中，则从未知列表中移除
		if ($this->cache->exists($key1) == 1){
			if ($this->cache->exists($key) == 0){
				$not_router_info = $this->get_notrouter_info(strtolower($router_info1['router_mac']));
				$this->set_redis_for_router_info($key, $not_router_info);
			}
			$this->cache->rm($key1);
		}

		$router_info = $this->get_router_info(strtolower($router_info1['router_mac']));
	
		if (!$router_info){
			$router_info1['status'] = '-1';//未连接
		}else{
			if ($router_info['status'] != '3'){
				if(time() - $router_info['online_time'] > ($router_info['check_time'])+120){
					$router_info1['status'] = '-1';//未连接
				}else{
					$router_info1['status'] = '1';//在线
				}
			}else{
				$router_info1['status'] = '3';
			}
			
			//删除超时的在线用户
			$clent->del_timeout_user($router_info1['mid'], $router_info1['router_mac'], $router_info['check_time']);
			//获取认证在线用户数量
			$online_user_list = $clent->get_online_user_list();

			$router_info1['sys_uptime'] 		= $router_info['sys_uptime'];
			$router_info1['sys_memfree'] 		= $router_info['sys_memfree'];
			$router_info1['sys_load'] 			= $router_info['sys_load'];
			$router_info1['wifidog_uptime']		= $router_info['wifidog_uptime'];
			$router_info1['check_time'] 		= $router_info['check_time'].'秒';
			$router_info1['clientcount'] 		= $router_info['clientcount'];
			$router_info1['router_address'] 	= $router_info['router_address'];
			$router_info1['router_type'] 		= $router_info['router_type'];
			$router_info1['wan_ip'] 			= $router_info['wan_ip'];
			$router_info1['sv'] 				= $router_info['sv'];

			if ($router_info1['status'] == '1'){
				$router_info1['online_time'] 		= time() - $router_info['start_time'];
			}else if($router_info1['status'] != '3'){
				$router_info1['online_time'] 		= 0;
			}
			
			$router_info1['last_online_time']	= date('Y-m-d H:i:s', $router_info['online_time']);
			$router_info1['start_time']			= date('Y-m-d H:i:s', $router_info['start_time']);
			$router_info1['online_user_count'] 	= count($online_user_list);
		}
		//统计该路由历史用户总数
		$signinlog = DD('UserSigninLog');
		//历史最高在线人数
		$max_log = $signinlog->get_signlog_for_max_by_routermac($router_info1['router_mac'], $router_info1['mid']);
		//return array('login_total'=>$info['login_total'], 'date':$info['date']);
		$router_info1['max_login'] = $max_log;
		//最近10天的认证数流量图
		$log_list_top10 = $signinlog->get_signlog_for_top10_by_routermac($router_info1['router_mac'], $router_info1['mid']);

		$today = date('Y-m-d');
		$yesterday = date('Y-m-d' , strtotime('-1 day')); 
		//定义最近10天的数组
		$temp_array = array(
			date('Y-m-d' , strtotime('-9 day')),
			date('Y-m-d' , strtotime('-8 day')),
			date('Y-m-d' , strtotime('-7 day')),
			date('Y-m-d' , strtotime('-6 day')),
			date('Y-m-d' , strtotime('-5 day')),
			date('Y-m-d' , strtotime('-4 day')),
			date('Y-m-d' , strtotime('-3 day')),
			date('Y-m-d' , strtotime('-2 day')),
			$yesterday, 
			$today, 
		);
		$temp = array();
		foreach ($log_list_top10 as $key => $value) {
			$temp[$value['date']] = $value;
		}
		$router_info1['today'] = intval($temp[$today]['user_total']);
		$router_info1['yesterday'] = intval($temp[$yesterday]['user_total']);
		$top10 = array();
		foreach ($temp_array as $key => $value) {
			$top10[] = array('date'=>$value, 'login_total'=>intval($temp[$value]['user_total']));
		}
		$router_info1['top10'] = $top10;
		
		//累计认证人数
		$sum_log = $signinlog->get_signlog_for_sum_by_routermac($router_info1['router_mac'], $router_info1['mid']);
		$router_info1['sum_login'] = $sum_log;
		return $router_info1;
 	}
 
 	/**
	 +----------------------------------------------------------
	 * 根据商家编号获取路由列表--详细信息
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $id 商家编号
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function get_router_info_for_admin(){
		$router_name = C('router_name');
		$router_mac = 	strtolower(C('router_mac'));
		$clent = DD('Client');
		$RouterWifiConfig = DD('RouterWifiConfig');
		//查看是否有路由连接上来
		
		$key = $this->redis_prefix.$router_mac;
		

		$router_info = $this->get_router_info($router_mac);
		$router_info['router_mac'] = $router_mac;
		$router_info['router_name'] = $router_name;
		
		if (!$router_info){
			$router_info['status'] = '-1';//未连接
		}else{

			if ($router_info['status'] != '3'){
				if(time() - $router_info['online_time'] > ($router_info['check_time'])+120){
					$router_info['status'] = '-1';//未连接
				}else{
					$router_info['status'] = '1';//在线
				}
			}else{
				$router_info['status'] = 3;
			}
			
			//删除超时的在线用户
			$clent->del_timeout_user($router_info['check_time']);
			//获取认证在线用户数量
			$online_user_count = $clent->get_online_user_count();
			$router_info['ssid']				= $RouterWifiConfig->get_wifidog_onef($router_info['router_mac'], 'ssid');
			$router_info['check_time'] 			= $router_info['check_time'].'秒';
			$router_info['online_time'] 		= $router_info['status'] != -1 ? time() - $router_info['start_time'] : 0;
			$router_info['last_online_time']	= date('Y-m-d H:i:s', $router_info['online_time']);
			$router_info['start_time']			= date('Y-m-d H:i:s', $router_info['start_time']);
			$router_info['online_user_count'] 	= $online_user_count;
		}
		
		return $router_info;
	}
	
	
	/**
	 +----------------------------------------------------------
	 * 路由逻辑处理
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $param
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	private function ext_router_list($router_list){
		$clent = DD('Client');
		$RouterWifiConfig = DD('RouterWifiConfig');
		//查看是否有路由连接上来
		foreach ($router_list as $key => &$value) {
			$key = $this->redis_prefix.strtolower($value['router_mac']);
			$key1 = 'not_router:'.strtolower($value['router_mac']);
			if ($this->cache->exists($key1) == 1){				
				if ($this->cache->exists($key) == 0){
					$not_router_info = $this->get_notrouter_info(strtolower($value['router_mac']));
					$this->set_redis_for_router_info($key, $not_router_info);
				}
				$this->cache->rm($key1);
			}

			$router_info = $this->get_router_info(strtolower($value['router_mac']));
			if (!$router_info){
				$value['status'] = '-1';//未连接
			}else{
	
				if ($router_info['status'] != '3'){
					if(time() - $router_info['online_time'] > ($router_info['check_time'])+120){
						$value['status'] = '-1';//未连接
					}else{
						$value['status'] = '1';//在线
					}
				}else{
					$value['status'] = 3;
				}
				
				//删除超时的在线用户
				$clent->del_timeout_user($value['mid'], $value['router_mac'], $router_info['check_time']);
				//获取认证在线用户数量
				$online_user_list = $clent->get_online_user_list();
				
				$value['ssid']				= $RouterWifiConfig->get_wifidog_onef($value['router_mac'], $value['mid'], 'ssid');
				
				
				$value['sys_uptime'] 		= $router_info['sys_uptime'];
				$value['sys_memfree'] 		= $router_info['sys_memfree'];
				$value['sys_load'] 			= $router_info['sys_load'];
				$value['wifidog_uptime']	= $router_info['wifidog_uptime'];
				$value['check_time'] 		= $router_info['check_time'].'秒';
				$value['clientcount'] 		= $router_info['clientcount'];
				$value['router_address'] 	= $router_info['router_address'];
				$value['router_type'] 		= $router_info['router_type'];
				$value['wan_ip'] 			= $router_info['wan_ip'];
				$value['sv'] 				= $router_info['sv'];
				$value['online_time'] 		= $value['status'] != -1 ? time() - $router_info['start_time'] : 0;
				$value['last_online_time']	= date('Y-m-d H:i:s', $router_info['online_time']);
				$value['start_time']		= date('Y-m-d H:i:s', $router_info['start_time']);
				$value['online_user_count'] = count($online_user_list);
			}
		}
		return $router_list;
	}
	
	
	/**
	 +----------------------------------------------------------
	 * 升级路由
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $param
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function upgrade($id){
		if (intval($id)==0){
			throw new Exception("路由不存在", 1);
		}
		$user_id = session('adminid');
		//判断编辑的路由是否所属于该商家
		$router_info1 = $this->handler->where(array('user_id'=>$user_id, 'id'=>$id))->find();
		if (!$router_info1){
			throw new Exception("路由不存在", 1);
		}

		$router_info1['mid'] = strtolower($router_info1['mid']);
		$router_info1['router_mac'] = strtolower($router_info1['router_mac']);
		$key = $this->redis_prefix.strtolower($router_info1['router_mac']);
		
		
		$router_info = $this->get_router_info($router_info1['router_mac'], array('online_time', 'check_time', 'sv'));

		if(!$router_info || time() - $router_info['online_time'] > ($router_info['check_time'])+120){
			throw new Exception("路由不是在线状态，无法升级", 1);
		}

		//获取当前路由的版本n
		$router_sv = $router_info['sv'];
		if (empty($router_sv)){
			throw new Exception("不能获取当前路由的版本，无法升级", 1);
		}
		if ($router_sv < '4.2.26'){
			throw new Exception("当前路由的版本低于4.2.26，无法升级,请手动升级到4.2.26", 1);
		}
		//获取固件表中最新固件
		$firmware = D('Firmware');
		$firmware_info = $firmware->get_new_firmware();
		if (!$firmware_info){
			throw new Exception("未发现最新版本的固件，无法升级", 1);
		}
		
		//比较版本
		if ($router_sv >= $firmware_info['sv']){
			throw new Exception("该路由已经是最新版本，无需升级", 1);
		}
		//创建升级任务
		$content = 'upgrade:md5='.$firmware_info['md5'].'#url='.C('WEB_SITE').'/admin/upload/firmware/'.$firmware_info['firmware'].'#ver='.$firmware_info['sv'];
		$param = array(
            'router_mac'    => $router_info1['router_mac'],
            'mid'           => $router_info1['mid'],
            'type'          => 'upgrade',
            'content'       => $content,
            'sv'			=> $firmware_info['sv'],
        );
        
		$router_task = D('RouterTask');
		$rs = $router_task->add_router_task($param);
		if (!$rs){
			throw new Exception("创建任务失败，请重试", 1);
		}
		
		return '已下发升级任务，路由将在'.$router_info['check_time'].'秒左右执行任务,您可以在任务列表中查看任务状态';
	}
	/**
	 +----------------------------------------------------------
	 * 重启路由
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $param
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function reboot($id){
		if (intval($id)==0){
			throw new Exception("路由不存在", 1);
		}
		$user_id = session('adminid');
		//判断编辑的路由是否所属于该商家
		$router_info1 = $this->handler->where(array('user_id'=>$user_id, 'id'=>$id))->find();
		if (!$router_info1){
			throw new Exception("路由不存在", 1);
		}
		$router_info1['mid'] = strtolower($router_info1['mid']);
		$router_info1['router_mac'] = strtolower($router_info1['router_mac']);
		$key = $this->redis_prefix.strtolower($router_info1['router_mac']);
		
		$router_info = $this->get_router_info($router_info1['router_mac'], array('online_time', 'check_time'));

		if(!$router_info || time() - $router_info['online_time'] > ($router_info['check_time'])+120){
			throw new Exception("路由不是在线状态，无法重启", 1);
		}
		//创建升级任务
		
		$param = array(
            'router_mac'    => $router_info1['router_mac'],
            'mid'           => $router_info1['mid'],
            'type'          => 'restart',
            'content'		=> '路由重启',
        );
        
		$router_task = D('RouterTask');
		$rs = $router_task->add_router_task($param);
		if (!$rs){
			throw new Exception("创建任务失败，请重试", 1);
		}
		
		return '已下发重启任务，路由将在'.$router_info['check_time'].'秒左右执行任务';
	}
	/**
	 +----------------------------------------------------------
	 * 获取路由在线用户
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $param
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function get_online_user_for_router($router_id, $user_id){

		if (intval($router_id) == 0 || intval($user_id) == 0){
			throw new Exception("路由不存在", 1);
		}
		//判断编辑的路由是否所属于该商家
		$router_info1 = $this->handler->where(array('user_id'=>$user_id, 'id'=>$router_id))->find();
		if (!$router_info1){
			throw new Exception("路由不存在", 1);
		}
		
		return $this->get_online_user_for_router1($router_id);
	}
	public function get_online_user_for_router1($router_id){

		
		//判断编辑的路由是否所属于该商家
		$router_info1 = $this->handler->where(array('id'=>$router_id))->find();
		if (!$router_info1){
			throw new Exception("路由不存在", 1);
		}
		$router_info1['mid'] = strtolower($router_info1['mid']);
		$router_info1['router_mac'] = strtolower($router_info1['router_mac']);
		$key = $this->redis_prefix.strtolower($router_info1['router_mac']);
		
		$router_info = $this->get_router_info($router_info1['router_mac'], array('online_time', 'check_time'));

		if(!$router_info || time() - $router_info['online_time'] > ($router_info['check_time'])+120){
			throw new Exception("路由不是在线状态", 1);
		}
		$client = DD('Client');
		//清除超时用户
		$client->del_timeout_user($router_info1['mid'], $router_info1['router_mac'], $router_info['check_time']);
		//获取在线用户mac
		$online_user_mac_list = $client->get_online_user_list();
		$online_user_list = array();
		//获取userid及full_signin_log_id
		$third_id = '';
		$full_signin_log_id = array();
		foreach ($online_user_mac_list as $k => $val) {
			$temp = $client->get_user_info($router_info1['mid'], $router_info1['router_mac'], $val[0], array('full_signin_log_id', 'third_id', 'start_date_time', 'mac', 'username', 'auth_type', 'incoming', 'outgoing'));
			$online_user_list[] = $temp;
			$full_signin_log_id[] = $temp['full_signin_log_id'];
			$third_id .= $temp['third_id'] . ",";
		}
		$third_id = rtrim($third_id, ',');
	
		//获取用户数据
		$client_list = $client->get_user_list_by_thirdid($router_info1['mid'], $router_info1['router_mac'], $third_id);
		$new_client_list = array();
		foreach ($client_list as $k => $v) {

			$new_client_list[$v['third_id']] = $v;
		}
		//print_r($new_client_list);
		//获取当前登录日志数据
		$full_signin_log = DD('FullSigninLog');
		$full_signin_log_list = $full_signin_log->get_fullsigninlog_list_by_id($router_info1['mid'], implode(',', $full_signin_log_id));
		$new_full_signin_log_list = array();
		foreach ($full_signin_log_list as $k => $val) {
			$new_full_signin_log_list[$val['id']] = $val;
		}
		//组合数据
		foreach ($online_user_list as $k => &$val) {
			$val['times'] = $new_client_list[$val['third_id']]['times'];
			$val['device_type'] = $new_client_list[$val['third_id']]['device_type'];
			$val['devices_cj'] = $new_client_list[$val['third_id']]['devices_cj'];
			$val['src_url'] = $new_full_signin_log_list[$val['full_signin_log_id']]['src_url'];
			$val['online_time'] = time() - $val['start_date_time'];
			$val['start_date_time'] = date('Y-m-d H:i:s', $val['start_date_time']);
			$val['router_id'] = $router_id;
			$val['router_name'] = $router_info1['router_name'];
			$val['user_id1'] = $router_info1['user_id'];
		}
		return $online_user_list;
	}
	/**
	 +----------------------------------------------------------
	 * 将用户踢下线
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $param
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function tick($router_id, $user_id, $mac){
		if (intval($router_id) == 0 || intval($user_id) == 0 || empty($mac)){
			throw new Exception("用户不存在", 1);
		}
		//判断编辑的路由是否所属于该商家
		$router_info1 = $this->handler->where(array('user_id'=>$user_id, 'id'=>$router_id))->find();
		if (!$router_info1){
			throw new Exception("路由不存在", 1);
		}
		$router_info1['mid'] = strtolower($router_info1['mid']);
		$router_info1['router_mac'] = strtolower($router_info1['router_mac']);
		$key = $this->redis_prefix.strtolower($router_info1['router_mac']);
		
		$router_info = $this->get_router_info($router_info1['router_mac'], array('online_time', 'check_time'));

		if(!$router_info || time() - $router_info['online_time'] > ($router_info['check_time'])+120){
			throw new Exception("路由不是在线状态", 1);
		}
		//踢用户下线
		$client = DD('Client');
		$rs = $client->kick($router_info1['mid'], $router_info1['router_mac'], $mac);
		
		if (!$rs){
			throw new Exception("操作失败，请重试", 1);
		}
		return true;
	}
	/**
	 +----------------------------------------------------------
	 * 获取该路由下面的历史用户列表
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $param
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function get_user_list_for_router($router_id, $user_id, $pagenum, $pagelen, $sortkey, $reverse, $where){
		if (intval($router_id) == 0 || intval($user_id) == 0){
			throw new Exception("路由不存在", 1);
		}
		//判断编辑的路由是否所属于该商家
		$router_info1 = $this->handler->where(array('user_id'=>$user_id, 'id'=>$router_id))->find();
		if (!$router_info1){
			throw new Exception("路由不存在", 1);
		}
		
		return $this->get_user_list_for_router1($router_id, $pagenum, $pagelen, $sortkey, $reverse, $where);
	}
	/**
	 +----------------------------------------------------------
	 * 获取该路由下面的历史用户列表
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $param
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function get_user_list_for_router1($router_id, $pagenum, $pagelen, $sortkey, $reverse, $where){
		
		//判断编辑的路由是否所属于该商家
		$router_info1 = $this->handler->where(array('id'=>$router_id))->find();
		if (!$router_info1){
			throw new Exception("路由不存在", 1);
		}
		//获取历史用户列表
		$client = DD('Client');
		$user_list = $client->get_user_list_by_midroutermac($router_info1['mid'], $router_info1['router_mac'], $pagenum, $pagelen, $sortkey, $reverse, $where);
		foreach ($user_list['list'] as $key => &$value) {
			$value['router_name'] = $router_info1['router_name'];
			$value['user_id1'] = $router_info1['user_id'];
		}
		
		return $user_list;
	}
	/**
	 +----------------------------------------------------------
	 * 获取该路由下面的历史用户列表
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $param
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function del_router($router_id, $user_id){
		if (intval($router_id) == 0 || intval($user_id) == 0){
			throw new Exception("路由不存在", 1);
		}
		//判断编辑的路由是否所属于该商家
		$router_info1 = $this->handler->where(array('user_id'=>$user_id, 'id'=>$router_id))->find();
		if (!$router_info1){
			throw new Exception("路由不存在", 1);
		}
		$router_info1['mid'] = strtolower($router_info1['mid']);
		$router_info1['router_mac'] = strtolower($router_info1['router_mac']);
		//路由配置
		$router_wifi_config = DD('RouterWifiConfig');
		$rs1 = $router_wifi_config->del_wifi_config($router_id, $router_info1['router_mac'], $router_info1['mid']);
		if (!$rs1){
			throw new Exception("删除路由配置信息失败，请重试", 1);
			return false;
		}
		//删除路由
		$rs = $this->handler->where(array('id'=>$router_id))->delete();
		if (!$rs){
			throw new Exception("删除失败，请重试", 1);
			return false;
		}
		//删除缓存
		$key = $this->redis_prefix.strtolower($router_info1['router_mac']);
		$this->cache->rm($key);
		return true;
	}
}