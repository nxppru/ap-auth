<?php
/*
* 后台搜索工具框+功能按钮
*/
class SelectInputWidget extends Widget{
    public function render($data){
		$user = DD('Public');
		$field = empty($data['sf']) ? $data['index'].','.$data['option'] : 
				$data['index'].','.$data['option'].','.$data['sf'];
		
		$users = $user->get_field_index($data['table_name'], $field);
		foreach ($users as &$row){
			$split 			= $row[$data['option']];
			$row['prex'] 	= strtoupper(substr($split,0,2)); //取前两位大写字母
		}
		
		$data['data'] = $users;
		return $this->renderFile('default',$data);
   }
 }