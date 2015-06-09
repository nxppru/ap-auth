<?php
class MerchantDelegation {
	public function onAddCell($args){
		$str = '' ;
		
		
		if($args[2]['name'] == 'account_type') {
			$str = account_type($args[1]['account_type'], $args[1]['deadline']);
		}else if($args[2]['name'] == 'province'){
            $str = $args[1]['province'].$args[1]['city'].$args[1]['area'];
		}else if ($args[2]['name'] == 'username'){
			$str = $args[1]['username'] . '<br/>' . $args[1]['mid'];
		}else {
			return '' ;
		}
		return "<td>{$str}</td>" ;
	}
	
}