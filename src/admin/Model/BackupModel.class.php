<?php
namespace admin\Model;
use Think\Model;
use Think\Exception;
use \Org\DbManage\DbManage;

class BackupModel extends Model{
	
 	function __construct() {
 	
   

 	}
 	/**
     * 获取备份列表
     *
     * @return string
     */
 	public function get_backup_list(){
 		$dir = DB_BACKUP;

 		$dirArray=array();
	    if (false != ($handle = opendir ( $dir ))) {
	        $i=0;
	        while ( false !== ($file = readdir ( $handle )) ) {
	            //去掉"“.”、“..”以及带“.xxx”后缀的文件
	            if ($file != "." && $file != ".."&&!strpos($file,".")) {
	                $dirArray[$i]['filename']=$file;
	                $dirArray[$i]['update_time'] = date('Y-m-d H:i:s', filectime(DB_BACKUP.'/'.$file));
	                $i++;
	            }
	        }
	        //关闭句柄
	        closedir ( $handle );
	    }
	    return $dirArray;
 	}
 	
    /**
     * 数据库备份
     */
    public function export() {
       	$time = time();
        $dir = DB_BACKUP.$time.'/';
        $db = new DBManage ( C('DB_HOST'), C('DB_USER'), C('DB_PWD'), C('DB_NAME'), 'utf8' );
        $db->backup ('', $dir, '', $time);
        
    }
    /**
     * 恢复数据库备份
     */
    public function restore($filename){
    	$dir = DB_BACKUP.$filename.'/'.$filename.'_all_v1.sql';
    	$db = new DBManage ( C('DB_HOST'), C('DB_USER'), C('DB_PWD'), C('DB_NAME'), 'utf8' );
        $db->restore ($dir);
    }
    /**
     * 删除数据库备份
     */
    public function del_backup($filename){
    	$dir = DB_BACKUP.$filename.'/';
    	//先删除目录下的文件：
		$dh=opendir($dir);
		while ($file=readdir($dh)) {
			if($file!="." && $file!="..") {
				$fullpath=$dir."/".$file;
				if(!is_dir($fullpath)) {
					unlink($fullpath);
				} 
			}
		}
		closedir($dh);
		if(rmdir($dir)) {
			return true;
		} else {
			throw new Exception("删除失败", 1);
			
		}
    }

}