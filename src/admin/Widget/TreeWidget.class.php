<?php
/*
* 后台首页菜单
*/
class TreeWidget extends Widget{
    public function render($data){

    	$menu 	= DD('Function');
     	$where	= array('url_type'=>'0');     //过滤按钮
		$list = $menu->get_menu_list($where);   //获取全部菜单
		foreach ($list as $row){
			if ($row['url'] == '#') {
				$name[$row['id']] = array(	//提取一级菜单
					'url_name'	=> $row['url_name'],
					'image'		=> $row['image'],
					'sort'		=> $row['sort'],
				);
			}else{
				$sort[$row['fid']][] = $row;	//提取一级菜单提取子菜单
			}
		}
		$param = array(
			'sort' 		=> $sort,
			'name' 		=> $name,
			'id'   		=> $data['id'],
			'selected'  => $data['selected'],
		);
		return $this->renderFile('default',$param);
   }
   
 }