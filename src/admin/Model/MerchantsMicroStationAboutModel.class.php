<?php
namespace admin\Model;
use Think\Model;
use Think\Exception;
use Think\Log;
use Think\Cache;
class MerchantsMicroStationAboutModel extends Model{
	protected $handler ;
	protected $cache;
 	function __construct() {
 		$this->handler = M('merchants_micro_station_about');
 		$this->cache   = Cache::getInstance();
 	}
 	/**
	 +----------------------------------------------------------
	 * 根据商家编号获取商家关于我们
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $user_id
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
 	public function get_station_about_info(){
 		$list = $this->handler->find();
 		
 		return $list;
 	}
 	/**
	 +----------------------------------------------------------
	 * 编辑关于我们
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @param $user_id
	 +----------------------------------------------------------
	 * @return array
	 +----------------------------------------------------------
	*/
	public function edit_about_info($content){
		if (empty($content)){
			throw new Exception("请填写内容", 1);
		}
		$list = $this->get_station_about_info();
		if ($list){
			$this->handler->save(array(
				'content'	=> $content,
				'create_datetime'	=> date('Y-m-d H:i:s'),
			));
		}else{
			$this->handler->add(array(
				'user_id'=>session('adminid'),
				'content'	=> $content,
				'create_datetime'	=> date('Y-m-d H:i:s'),
			));
		}
		
	}
 	
}