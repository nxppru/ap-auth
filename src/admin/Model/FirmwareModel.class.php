<?php
namespace admin\Model;
use Think\Model;
use Think\Exception;
use Think\Cache;
use Think\Log;

class FirmwareModel extends Model{
	protected $handler ;
	protected $cache;
 	function __construct() {
 		$this->handler = M('firmware');
 		$this->cache   = Cache::getInstance();
 	}
 	/**
     +----------------------------------------------------------
     * 获取固件列表
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param $param a
     +----------------------------------------------------------
     * @return array
     +----------------------------------------------------------
    */
    public function get_firmware_list(){
        $group_id = session('group_id');
        if ($group_id != 1){
            throw new Exception("您无权查看该功能", 1);
        }
        return $this->handler->select();
    }
 	/**
      +----------------------------------------------------------
      * 上传固件
      +----------------------------------------------------------
      * @access public
      +----------------------------------------------------------
      * @param $type
      +----------------------------------------------------------
      * @return array
      +----------------------------------------------------------
     */
    public function upload(){
        $upload = new \Think\Upload();// 实例化上传类    

        $upload->rootPath   = STATIC_PATH;   
        $upload->savePath   = 'upload/firmware/'; // 设置附件上传目录    
        $upload->saveName   = array('uniqid','');
        $upload->autoSub    = false;
        $upload->replace    = true;
        // 上传文件     
        $info   =   $upload->upload();    
        if(!$info) {
            // 上传错误提示错误信息          
            throw new Exception($upload->getError(), 1);
        }
        //获取文件MD5
        $md5 = md5_file(STATIC_PATH.'upload/firmware/'.$info['fileToUpload']['savename']);
        return array('md5'=>$md5, 'savename'=>$info['fileToUpload']['savename']);
    }
     /**
      +----------------------------------------------------------
      * 添加固件
      +----------------------------------------------------------
      * @access public
      +----------------------------------------------------------
      * @param $type
      +----------------------------------------------------------
      * @return array
      +----------------------------------------------------------
     */
    public function add_firmware($param){
        if (empty($param['firmware'])){
            throw new Exception("请上传固件", 1);
        }
        if (empty($param['sv'])){
            throw new Exception("请填写版本号", 1);
        }
        $rs = $this->handler->add(array(
            'firmware'     => $param['firmware'],
            'sv'           => $param['sv'],
            'md5'          => $param['md5'],
            'remark'       => $param['remark'],
            'create_date'  => date('Y-m-d H:i:s'),
        ));
        if ($rs === false){
            throw new Exception("添加固件失败", 1);
        }
        return true;
    }
     /**
      +----------------------------------------------------------
      * 编辑固件
      +----------------------------------------------------------
      * @access public
      +----------------------------------------------------------
      * @param $type
      +----------------------------------------------------------
      * @return array
      +----------------------------------------------------------
     */
    public function edit_firmware($param){
        if (empty($param['id'])){
            throw new Exception("请选择要编辑的固件", 1);
        }
        if (empty($param['sv'])){
            throw new Exception("请填写版本号", 1);
        }
        $rs = $this->handler->where(array('id'=>$param['id']))->save(array(
            'sv'           => $param['sv'],
            'remark'       => $param['remark'],
        ));
        if ($rs === false){
            throw new Exception("编辑固件失败", 1);
        }
        return true;
    }
     /**
      +----------------------------------------------------------
      * 删除固件
      +----------------------------------------------------------
      * @access public
      +----------------------------------------------------------
      * @param $type
      +----------------------------------------------------------
      * @return array
      +----------------------------------------------------------
     */
    public function del_firmware($id){
        if (empty($id)){
            throw new Exception("请选择要删除的固件", 1);
        }
        $list = $this->handler->where(array('id'=>array('IN', $id)))->select();

        $rs = $this->handler->where(array('id'=>array('IN', $id)))->delete();
        if ($rs === false){
            throw new Exception("删除固件失败", 1);
        }
        //删除文件
        foreach ($list as $key => $value) {
            @unlink(STATIC_PATH.'upload/firmware/'.$value['firmware']);
        }
        return true;
    }
     /**
      +----------------------------------------------------------
      * 获取最新的固件版本
      +----------------------------------------------------------
      * @access public
      +----------------------------------------------------------
      * @param $type
      +----------------------------------------------------------
      * @return array
      +----------------------------------------------------------
     */
    public function get_new_firmware(){
        return $this->handler->order('sv desc')->find();
    }


}