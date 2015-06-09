<?php
/**
 * 表单控件
 * 
 * @author flan 20140903
 */
class FormWidget extends Widget{
	
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
	 * 文本
	 * 
	 * // 普通
	 * {:W('Form',
			array(
				'formType' => 'input',
				'data' => array(
					'title' => '输入框测试',
					'name' => 'test_name',
					'value' => '值',
					'jsValidator' => array(
						'min' => 2,
						'max' => 20,
						'empty' => true,
					)
				),
			)
		)}
		
		// int 
		{:W('Form',
			array(
				'formType' => 'input',
				'data' => array(
					'type' => 'int',
					'title' => '输入框测试 int',
					'name' => 'test_name1',
					'value' => '12222',
					'jsValidator' => array(
						'min' => 1,
						'max' => 6,
					)
				),
			)
		)}
	 * 
	 */
	private function show_input($aData){
		
		$sType = $aData['type'];
		$aJsValidator = $aData['jsValidator'];
		
		// js  为空
		$aJsValidator['empty'] = empty($aJsValidator['empty']) ? false : true;
		
		$aViewText = array(
			'sType' => $sType,
			'sTitle' => $aData['title'],
			'sName' => $aData['name'],
			'sValue' => $aData['value'],
			'sJsId' => $aData['id'],
			'aJsValidator' => $aJsValidator,
		);
		
		
		
		// id/class 值 用于js调用
		if (empty($aViewText['sJsId'])){
			$sJsId = 'js_thisform_'.$aViewText['sName'];
			$sJsId = str_replace('[', '_', $sJsId);
			$sJsId = str_replace(']', '', $sJsId);
			$aViewText['sJsId'] = $sJsId;
		}
		
		return $this->renderFile('input', $aViewText);
	}
	
	
	/**
	 * 单选框
	 * 
	 * 
	 * // 通用
	 * {:W('Form',
			array(
				'formType' => 'radio',
				'data' => array(
					'type' => 'com_status',
					'name' => 'status',
					'value' => 1, 
				),
			)
		)}
		
		// 普通
		{:W('Form',
			array(
				'formType' => 'radio',
				'data' => array(
					'title' => '单选框测试',
					'list' => array(
						array('id' => 1, 'name' => 1),
						array('id' => 2, 'name' => 2),
						array('id' => 3, 'name' => 3),
					),
					'name' => 'list_status',
					'value' => 2, 
				),
			)
		)}
	 * 
	 */
	private function show_radio($aData){
		
		$sType = $aData['type'];
		$sName = $aData['name'];
		
		// 通用状态按钮
		if ($sType == 'com_status'){
			if (empty($sName)){
				$sName = 'formdata[status]';
			}
			$aViewRadio = array(
				'sTitle' => '状态',
				'sName' => $sName,
				'aRadio' => array(
					array('id' => 1,'name' => '启用'),
					array('id' => 0,'name' => '停用'),
				),
				'nCheck' => $aData['value']
			);
		} else {
			$aViewRadio = array(
				'sTitle' => $aData['title'],
				'sName' => $sName,
				'aRadio' => array_values($aData['list']),
				'nCheck' => $aData['value']
			);
		}
		
		// 默认值
		if (empty($aViewRadio['nCheck']) && $aViewRadio['nCheck'] !== 0){
			$aViewRadio['nCheck'] = $aViewRadio['aRadio'][0]['id'];
		}
		// id/class 值 用于js调用 
		$sJsClass = 'js_thisform_'.$aViewRadio['sName'];
		$sJsClass = str_replace('[', '_', $sJsClass);
		$sJsClass = str_replace(']', '', $sJsClass);
		$aViewRadio['sJsClass'] = $sJsClass;

		
		return $this->renderFile('radio', $aViewRadio);
	}
	
	
	/**
	 * 下拉框
	 * 
	 * 
	 * {:W('Form',
			array(
				'formType' => 'select',
				'data' => array(
					'is_must' => false, // 默认为true
					'title' => '下拉框测试',
					'list' => array(
						array('id' => 1, 'name' => 1),
						array('id' => 2, 'name' => 2),
						array('id' => 3, 'name' => 3),
					),
					'id' => 'watermark_where',
					'name' => 'list_status',
					'value' => 2,
					''
				),
			)
		)}
	 */
	private function show_select($aData){
	
		$sType = $aData['type'];
		$sName = $aData['name'];
	
		$aViewSelect = array(
			'sTitle' => $aData['title'],
			'sJsId' => $aData['id'],
			'sName' => $sName,
			'aSelect' => array_values($aData['list']),
			'nSelect' => $aData['value']
		);
	
		// 默认值
		if (empty($aViewSelect['nSelect']) && $aViewSelect['nSelect'] !== 0){
			$aViewSelect['nSelect'] = $aViewSelect['aSelect'][0]['id'];
		}
		
		// 非必须
		if (!$aData['is_must']){
			$aViewSelect['aSelect'] = array_merge(array(array('id' => -1, 'name' => '--请选择--')), $aViewSelect['aSelect']);
		}
	
		// id/class 值 用于js调用
		if (empty($aViewSelect['sJsId'])){
			$sJsId = 'js_thisform_'.$aViewSelect['sName'];
			$sJsId = str_replace('[', '_', $sJsId);
			$sJsId = str_replace(']', '', $sJsId);
			$aViewSelect['sJsId'] = $sJsId;
		}
	
		return $this->renderFile('select', $aViewSelect);
	}
	
	/**
	 * 多选框
	 * 
	 * {:W('Form',
			array(
				'formType' => 'checkbox',
				'data' => array(
					'is_all' => true, // 默认为false
					'title' => '多选框测试',
					'list' => array(
						array('id' => 1, 'name' => 1),
						array('id' => 2, 'name' => 2),
						array('id' => 3, 'name' => 3),
					),
					'id' => 'watermark_where',
					'name' => 'list_status',
					'value' => array(1,2),
					''
				),
			)
		)}
	 */
	private function show_checkbox($aData){
	
		$sType = $aData['type'];
		$sName = $aData['name'];
		$aCheck = $aData['value'];
		
		$aCheckbox = array_values($aData['list']);
		
		if (is_array($aCheck)){
			foreach ($aCheckbox as $k => $aD){
				if (in_array($aD['id'], $aCheck)){
					$aCheckbox[$k]['checked'] = 'checked="checked"';
				}
			}
		}
	
		$aViewCheckbox = array(
			'sTitle' => $aData['title'],
			'sName' => $sName,
			'aCheckbox' => $aCheckbox,
		);
	
// 		// 全选
// 		if (!$aData['is_must']){
// 			$aViewSelect['aSelect'] = array_merge(array(array('id' => -1, 'name' => '--请选择--')), $aViewSelect['aSelect']);
// 		}
	
		// id/class 值 用于js调用
		$sJsClass = 'js_thisform_'.$aViewCheckbox['sName'];
		$sJsClass = str_replace('[', '_', $sJsClass);
		$sJsClass = str_replace(']', '', $sJsClass);
		$aViewCheckbox['sJsClass'] = $sJsClass;
		$aViewCheckbox['sJsId'] = $sJsClass.'_i';
	
		return $this->renderFile('checkbox', $aViewCheckbox);
	}

	/**
	 * 文本域
	 *
	 *
	 */
	private function show_textarea($aData){
	
		$sType = $aData['type'];
	
		$aViewText = array(
			'sType' => $sType,
			'sTitle' => $aData['title'],
			'sName' => $aData['name'],
			'sValue' => $aData['value'],
			'sJsId' => $aData['id'],
			'aJsValidator' => $aData['jsValidator'],
		);
	
		// id/class 值 用于js调用
		if (empty($aViewText['sJsId'])){
			$sJsId = 'js_thisform_'.$aViewText['sName'];
			$sJsId = str_replace('[', '_', $sJsId);
			$sJsId = str_replace(']', '', $sJsId);
			$aViewText['sJsId'] = $sJsId;
		}
		return $this->renderFile('textarea', $aViewText);
	}
	
	/**
	 *  编辑器
	 *
	 *
	 */
	 private function show_editor($aData){
	 
	 	$aViewText = array(
			'sTitle' => $aData['title'],
			'sValue' => $aData['value'],
			'sName'	 =>$aData['name'],
			'sWidth' => $aData['width']  ? $aData['width']  : 790,
			'sHeight'=> $aData['height'] ? $aData['height'] : 500 ,
			'sJsId' => $aData['id'],
		);
		if(empty($aData['id'])){
			$sJsId = 'js_thisform_'.$aViewText['sName'];
			$sJsId = str_replace('[', '_', $sJsId);
			$sJsId = str_replace(']', '', $sJsId);
			$aViewText['sJsId'] = $sJsId;
		}
		return $this->renderFile('editor', $aViewText);
	 }
	 
	 
	 /**
	  *  编辑器
	  *
	  *{:W('Form', 
			array(
				'formType' => 'editor_ue',
				'data' => array(
					'name' => 'formdata[content]',
					'value'	=> $aFormdata['content'],
					'title' => '帮助内容'
				)
		 	)
		)}
	  */
	 private function show_editor_ue($aData){
	 	
	 	$sValue = $aData['value'];
	 	
	 	$sValue = str_replace(PHP_EOL, '', addslashes(htmlspecialchars_decode($sValue)));
	 
	 	$aViewText = array(
	 		'bIsMore' => $aData['is_more'],
	 		'sTitle' => $aData['title'],
	 		'sValue' => $sValue,
	 		'sName'	 => $aData['name'],
	 		'sWidth' => $aData['width']  ? $aData['width']  : 700,
	 		'sHeight'=> $aData['height'] ? $aData['height'] : 500 ,
	 		'sJsId' => $aData['id'],
	 	);
	 	if(empty($aData['id'])){
	 		$sJsId = 'js_thisform_'.$aViewText['sName'];
	 		$sJsId = str_replace('[', '_', $sJsId);
	 		$sJsId = str_replace(']', '', $sJsId);
	 		$aViewText['sJsId'] = $sJsId;
	 	}
	 	return $this->renderFile('editor_ue', $aViewText);
	 }
	 
	 /**
	  * 图片上传
	  * 
	  * {:W('Form', 
			array(
				'formType' => 'image',
				'data' => array(
					'name' => 'formdata[logo]',
					'value'	=> $aFormdata['logo'],
					'title' => '公司logo',
					'width' => 100,
					'height' => 200,
				)
		 	)
		)}
	  */
	 private function show_image($aData){
	 	$sValue = $aData['value'];
	 	
	 	$aViewImage = array(
 			'bIsMore' => $aData['is_more'],
 			'sTitle' => $aData['title'],
 			'sValue' => $sValue,
 			'sName'	 => $aData['name'],
 			'sWidth' => $aData['width']  ? $aData['width']  : 700,
 			'sHeight'=> $aData['height'] ? $aData['height'] : 500,
	 		'sJsId' => $aData['id'],
	 	);
	 	
	 	if(empty($aData['id'])){
	 		$sJsId = 'js_thisform_'.$aViewImage['sName'];
	 		$sJsId = str_replace('[', '_', $sJsId);
	 		$sJsId = str_replace(']', '', $sJsId);
	 		$aViewImage['sJsId'] = $sJsId;
	 	}
	 	
	 	return $this->renderFile('image', $aViewImage);
	 }
}