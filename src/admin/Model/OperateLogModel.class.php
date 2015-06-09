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
class OperateLogModel extends Model{
	protected $handler ;
	protected $cache;
 	function __construct() {
 		$this->handler = M('operate_log');
 	}
	/**
	 +----------------------------------------------------------
	 * 添加操作日志
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	 * @return bool
	 +----------------------------------------------------------
	*/
	public function add_operate_log($param){
		$arr = array();
		foreach($param as $k=>$v){
			$arr[] = array(
				'adminid'	=> session('adminid'),
				'user_id'	=> $v['user_id'],
				'type'		=> $v['type'],
				'content'	=> $v['content'],
				'create_date'	=> date('Y-m-d H:i:s'),
			);
		}
		return $this->handler->addAll($arr);
	}
}