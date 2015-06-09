<?php
/**
 * 信息显示控件
 * 
 * @author flan 20140925
 */
class FormShowWidget extends Widget{
	
	public function render($aData){
		//$sFormType = $aData['formType'];
		
		$sFuncName = 'show_'.$aData['formType'];
		return $this->$sFuncName($aData['data']);
	}
	
	/**
	 * 页头
	 */
	public function show_page_header($aData){
		$aViewPage = array(
			'sPageTitle' => $aData['title']
		);
		return $this->renderFile('a_header', $aViewPage);
	}
	
	/**
	 * 页尾
	 */
	public function show_page_footer(){
		return $this->renderFile('a_footer', '');
	}

	/**
	 * 信息显示
	 * 
	 * {:W('FormShow',
			array(
				'formType' => 'info',
				'data' => array(
					'type' => 2,  // 2为一半 1为全部
					'title' => '收件人信息',
					'list' => array(
						array('title' => 'title', 'value' => 'value'),
						array('title' => 'title', 'value' => 'value'),
						array('title' => 'title', 'value' => 'value'),
					),
				),
			)
		)}
	 * 
	 */
	private function show_info($aData){
		$nMaxlength = $aData['maxlength'];
		$aList = $aData['list'];
		$nAdd = $nMaxlength - count($aList);
		for ($i=0;$i<$nAdd;$i++){
			$aList[] = array('empty' => true);
		}
		$aViewText = array(
			'sType' => $aData['type'],
			'sTitle' => $aData['title'],
			'aList' => $aList,
		);
		
		return $this->renderFile('info', $aViewText);
	}
}