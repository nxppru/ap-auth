<?php
namespace Home\Controller;
use Think\Controller;
class EmptyController   extends Controller{  
	
	public function index(){        
		$this->display('Empty:index');
	}
	public function _empty(){        
		$this->display('Empty:index');
	}
}