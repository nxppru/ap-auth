<?php
class ActivityDelegation {
	public function onAddCell($args){
		$str = '' ;
		
		
		if($args[2]['name'] == 'thumb') {
			if (!empty($args[1]['thumb'])){
				$str = '<img src="'.__ROOT__ .'/upload/station_activity/'.$args[1]['thumb'].'" width="50" height="50">';
			}else{
				$str = '';
			}
			
		}else if ($args[2]['name'] == 'status'){
			
			if (strtotime($args[1]['start_datetime'])<time() && strtotime($args[1]['end_datetime']) > time()){
 				$str = '<font color="green">进行中</font>';
 			}else if (strtotime($args[1]['start_datetime'])>time() ){
 				$str = '<font color="blue">未开始</font>';
 			}else if(strtotime($args[1]['end_datetime'])<time() ){
 				$str = '<font color="red">已结束</font>';
 			}
		}else {
			return '' ;
		}
		return "<td>{$str}</td>" ;
	}
	
}