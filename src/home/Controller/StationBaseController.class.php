<?php
namespace home\Controller;
use Think\Controller;
class StationBaseController extends Controller {
	function _initialize() {
        //获取商家导航
        $merchants_micro_station_nav = DD('MerchantsMicroStationNav');
        $nav_list = $merchants_micro_station_nav->get_station_nav_list();

		$this->assign(array(
            'title'             => C('shop_name') . '-微站',
            'nav_list'          => $nav_list,
            'shop_name'         => C('shop_name'),
            'telephone'         => C('telephone'),
            'homepage_logo'     => C('homepage_logo'),
        ));
	}
	
}