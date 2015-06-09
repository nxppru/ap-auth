<?php
namespace admin\Controller;
use Think\Controller;
use Think\Exception;
class FirmwareController extends BaseController {
    public function index(){
    	$fir         = D('Firmware');
    	$return_data    = array();
    	try{
    		$list = $fir->get_firmware_list();
    		$return_data = array(
    			'ret'           => 1,
    			'msg'           => '',
    			'list'      	=> $list,
    		);
    	}catch(Exception $e){
    		$return_data = array(
    			'ret'	=> 0,
    			'msg'	=> $e->getMessage(),
    			'data'	=> '',
    		);
    	}
    	exit(json_encode($return_data));
    }
    /**
     +----------------------------------------------------------
     * 上传固件
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
    */
    public function upload(){
        $return_data    = array();
        try {
            $fir         = D('Firmware');
            $name = $fir->upload();
            $return_data = array(
                'ret'           => 1,
                'msg'           => '上传成功',
                'data'          => $name,
            );
        } catch (Exception $e) {
            $return_data = array(
                'ret'   => 0,
                'msg'   => $e->getMessage(),
                'data'  => '',
            );
        }
        exit(json_encode($return_data));
    }
    /**
	 +----------------------------------------------------------
	 * 添加路由
	 +----------------------------------------------------------
	 * @access public
	 +----------------------------------------------------------
	*/
    public function add_firmware(){
    	$param = array(
            'firmware'	=> I('post.firmware'),
            'sv' 	=> I('post.sv'),
            'md5'   		=> I('post.md5'),
            'remark'      	=> I('post.remark'),
        );
        $return_data    = array();
        try {
            $fir         = D('Firmware');
            $fir->add_firmware($param);
            $return_data = array(
                'ret'           => 1,
                'msg'           => '新增固件成功',
            );
        } catch (Exception $e) {
            $return_data = array(
                'ret'   => 0,
                'msg'   => $e->getMessage(),
                'data'  => '',
            );
        }
        exit(json_encode($return_data));
    }
    /**
     +----------------------------------------------------------
     * 添加路由
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
    */
    public function edit_firmware(){
        $param = array(
            'id'        => I('post.id'),
            'sv'        => I('post.sv'),
            'remark'    => I('post.remark'),
        );
        $return_data    = array();
        try {
            $fir         = D('Firmware');
            $fir->edit_firmware($param);
            $return_data = array(
                'ret'           => 1,
                'msg'           => '编辑固件成功',
            );
        } catch (Exception $e) {
            $return_data = array(
                'ret'   => 0,
                'msg'   => $e->getMessage(),
                'data'  => '',
            );
        }
        exit(json_encode($return_data));
    }
    /**
     +----------------------------------------------------------
     * 删除固件
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
    */
    public function del_firmware(){
        $id = I('post.id');
        $return_data    = array();
        try {
            $fir         = D('Firmware');
            $fir->del_firmware($id);
            $return_data = array(
                'ret'           => 1,
                'msg'           => '删除固件成功',
            );
        } catch (Exception $e) {
            $return_data = array(
                'ret'   => 0,
                'msg'   => $e->getMessage(),
                'data'  => '',
            );
        }
        exit(json_encode($return_data));
    }
}