<?php
class AgencyDelegation {
	public function onAddCell($args){
		$str = '' ;
		
		
		if($args[2]['name'] == 'allow_modify') {
			$str = $args[1]['use_modify'].'/'.$args[1]['allow_modify'];
		}else if($args[2]['name'] == 'merchant_limit'){
            $str = $args[1]['use_merchant'].'/'.$args[1]['merchant_limit'];
		}else {
			return '' ;
		}
		return "<td>{$str}</td>" ;
	}
	
}