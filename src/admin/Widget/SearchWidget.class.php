<?php
/*
* 后台搜索工具框+功能按钮
*/
class SearchWidget extends Widget{
    public function render($data){
    	
    	if (isset($data['time']['start_datetime'])) {
    		$data['time']['start_datetime'] = $data['time']['start_datetime'] ? $data['time']['start_datetime'] 
    		: mktime(0,0,0,date("m"),'01',date("Y"));
    	}
    	if (isset($data['time']['end_datetime'])) {
    		$data['time']['end_datetime'] = $data['time']['end_datetime'] ? $data['time']['end_datetime'] 
    		: mktime(0,0,0,date("m")+1,'01',date("Y"));
    	}
		$param = $data;
		$param['button_style'] = array(
				'plus'	=>'warning',
				'trash'	=>'danger',
				'refresh'=>'primary',
				'share-alt'=> 'success'
    	);
    	$param['backspace'] = "\r\n";
    	
//     	print_r($param);die;
		return $this->renderFile('default',$param);
   }

  
   
 }