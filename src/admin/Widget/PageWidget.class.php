<?php
namespace admin\Widget;
use Think\Controller;

class PageWidget extends Controller{
	
	private $rpOptions = array(20,50,100,200,500,800,1200);
	
	public function index($total, $rp, $param){
		$rp = empty($rp) ? 20 : $rp;
		$Page       = new \Think\Page($total,$rp);// 实例化分页类 
		
		//foreach($param as $key=>$val) {    

			$Page->parameter  = $param;
		//}
		
		
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('first','首页');
		$Page->setConfig('last','尾页');
		$Page->setConfig('theme','<ul class="pagination-sm pagination" style="margin-top:0px;;margin-top:0px;"><li >%FIRST%</li> <li >%UP_PAGE%</li> %LINK_PAGE% <li >%DOWN_PAGE%</li> <li >%END%</li></ul>');

















		$param = array(
			'page' => $Page->show(),
			'total'	=> $total,
			'rpOptions' => $this->rpOptions,
			'rp' => $rp
		);
		$this->assign($param);
		$this->display('Widget/page');
	}	
}
?>