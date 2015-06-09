<?php
namespace admin\Controller;
use Think\Controller;
class EmptyController extends Controller {
    function _initialize(){    
        $cop = C('COPYRIGHT');
        $group_id = session('group_id');
        if ($group_id == 3){
            //获取商户信息
            $merchant = DD('Merchant');
            $merchant_info = $merchant->get_merchant_by_id(session('adminid'));
            $cop['mid'] = $merchant_info['mid'];
        }
        $cop['web_site'] = C('WEB_SITE');
        $this->assign($cop);
        $this->display('Empty:index');
    }
    public function index(){       
        
        
    }

}