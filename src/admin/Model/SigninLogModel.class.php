<?php
namespace admin\Model;
use Think\Model;
use Think\Exception;
use Think\Cache;
use Think\Log;

class SigninLogModel extends Model{
	protected $handler ;
	protected $cache;
 	function __construct() {
 		$this->handler = M('signinlog');
 		$this->cache   = Cache::getInstance();
 	}
 	/**
     +----------------------------------------------------------
     * 添加每日商家设备登录日志
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param $param a
     +----------------------------------------------------------
     * @return array
     +----------------------------------------------------------
    */
 	public function add_signin_log(){
          $date = date('Y-m-d');
          $count = $this->handler->where(array('date'=>$date))->count();
          if ($count == 0){
               $rs = $this->handler->add(array(
                    'date'    => date('Y-m-d'),
               ));
               if (!$rs){
                    Log::record('signinlog表插入数据失败，sql'.$this->handler->getLastSql());
               }
          }else{
               $rs = $this->handler->where(array('date'=>$date))->setInc('login_total', 1);
               if (!$rs){
                    Log::record('signinlog表更新数据失败，sql'.$this->handler->getLastSql());
               }
          }
 		
 	}
     /**
     +----------------------------------------------------------
     * 通过路由mac及商家编号获取最高认证数及日期
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param $param a
     +----------------------------------------------------------
     * @return array
     +----------------------------------------------------------
    */
     public function get_signlog_for_max_by_routermac($router_mac, $mid){
          $num = $this->handler->where(array('mid'=>$mid, 'router_mac'=>$router_mac))->max('login_total');
          if (!$num){
               return array('login_total'=>0, 'date'=>date('Y-m-d'));
          }
          $info = $this->handler->where(array('mid'=>$mid, 'router_mac'=>$router_mac, 'login_total'=>$num))->order('date desc')->find();
          return array('login_total'=>$info['login_total'], 'date'=>$info['date']);

     }
     /**
     +----------------------------------------------------------
     * 通过路由mac及商家编号获取最近10天的认证数及日期
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param $param a
     +----------------------------------------------------------
     * @return array
     +----------------------------------------------------------
    */
     public function get_signlog_for_top10_by_routermac($router_mac, $mid){
          return  $this->handler->where(array('mid'=>$mid, 'router_mac'=>$router_mac))->limit('0, 10')->order('date desc')->select();
     }
    
     /**
     +----------------------------------------------------------
     * 通过路由mac及商家编号获取累计认证人数
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param $param a
     +----------------------------------------------------------
     * @return array
     +----------------------------------------------------------
    */
    public function get_signlog_for_sum_by_routermac($router_mac, $mid){
        $sum = $this->handler->where(array('mid'=>$mid, 'router_mac'=>$router_mac))->sum('login_total');;
        if (!$sum){
            return 0;
        }
        return $sum;
    }
}