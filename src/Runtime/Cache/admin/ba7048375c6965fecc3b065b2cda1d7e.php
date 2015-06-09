<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Expires" CONTENT="0">
<meta http-equiv="Cache-Control" CONTENT="no-cache">
<meta http-equiv="Pragma" CONTENT="no-cache">
<meta http-equiv="Expires" content="-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php echo ($title); ?></title>
</head>
<link href="/admin/css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" href="/admin/css/font-awesome.min.css" />
<link rel="stylesheet" href="/admin/css/chosen.css" />
<link rel="stylesheet" href="/admin/css/ace.min.css" />
<link rel="stylesheet" href="/admin/css/ui-dialog.css" />
<link rel="stylesheet" href="/admin/css/bootstrap-switch.css" />
<link rel="stylesheet" href="/admin/css/jquery-ui-1.8.17.custom.css" />
<link rel="stylesheet" href="/admin/css/jquery-ui-timepicker-addon.css" />
<link rel="stylesheet" href="/admin/css/validator.css"  type="text/css" />
<link rel="stylesheet" href="/admin/css/bootstrap-switch.css"  type="text/css" />


<!--[if lte IE 8]>
<link rel="stylesheet" href="/admin/css/ace-ie.min.css" />
<![endif]-->

<link href="/admin/css/skins/all.css?v=1.0.2" rel="stylesheet">
<script type="text/javascript" src="/admin/dest/jquery.all.js"></script>
<script type="text/javascript" src="/admin/dest/bootstrap-switch.js"></script>
<script type="text/javascript" src="/admin/dest/formValidator.js"></script>
<script type="text/javascript" src="/admin/dest/formValidatorRegex.js"></script>
<script type="text/javascript" src="/admin/dest/jquery.html5uploader.js"></script>
<script type="text/javascript" src="/admin/dest/common.js"></script>
<script language="javascript" type="text/javascript" src="/admin/dest/My97DatePicker/WdatePicker.js"></script>

<style type="text/css">
.ui-dialog .ui-dialog-content{overflow-x:hidden;}
</style>
<body>
    <input type="hidden" id="app" value="/admin">
    <div id="navbar" class="navbar navbar-default">
        <div id="navbar-container" class="navbar-container">
            <div class="navbar-header pull-left">
                <div class="navbar-brand">
                    <small> <?php if(($logo != '')): ?><img src="/admin/upload/logo/<?php echo ($logo); ?>" style="height:27px;"/><?php endif; ?>&nbsp;&nbsp;<?php echo ($pname_cn); ?>&nbsp;<span style="font-size:14px;"><?php echo ($version_major); ?></span></small>
                </div><!-- /.brand --> 

            </div>
            <!-- /.navbar-header -->
            <div role="navigation" class="navbar-header pull-right col-xs-12 col-sm-6 col-md-5 padding0">
                <ul class="nav ace-nav col-xs-12 padding0">
                	<li class="purple col-xs-12 col-sm-3 col-md-3" >
                        <a   href="http://cnrouter.taobao.com/" target="_blank">
                            <i class="icon-shopping-cart"></i>集客商城
                    
                        </a>

                        
                    </li>

                    <li class="green col-xs-12 col-sm-3 col-md-3" >
                        <a   href="<?php echo ($web_site); ?>/Merchant/index" target="_blank">
                            <i class="icon-home"></i>微站预览
                    
                        </a>

                        
                    </li>
                   
                    <li class="blue col-xs-12 col-sm-3 col-md-3">
                        <a  href="<?php echo U('Admin/update_password');?>">
                            <i class="icon-key"></i>修改密码
                    
                        </a>

                        
                    </li>
                    <li class="grey col-xs-12 col-sm-3 col-md-3" style="float: right!important;">
                        <a  href="<?php echo U('Admin/logout');?>">
                            <i class="icon-sign-out"></i>退出
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <div class="main-container" id="main-container">
        <div class="main-container-inner">
            <a class="menu-toggler" id="menu-toggler" href="#"> 
                <span class="menu-text"></span>
            </a>
            <div class="sidebar" id="sidebar">
                <ul class="nav nav-list"><?php echo W('Sidebar/menu');?></ul>
                
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="icon-arrow-left" data-icon1="icon-arrow-left" data-icon2="icon-arrow-right"></i>
                </div>
            </div>
            <div class="main-content">
                <div class="breadcrumbs" id="breadcrumbs"> 
                    <script type="text/javascript">
                        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                    </script>
                    <!-- 导航开始 -->
                    <ul class="breadcrumb">
                        <li> <i class="icon-home home-icon"></i><a href="<?php echo U('Index/index');?>">首页</a><?php echo ($breadcrumb); ?> </li>
                        
                    </ul>
                    <!-- 导航结束-->
                </div>
                
                <div><script type="text/javascript">
	$(document).ready(function(){
		var ssid = '<?php echo ($info["ssid"]); ?>';
		$.formValidator.initConfig({
			formid:"userForm",
			onerror:function(msg){
			},
			onsuccess:function(){
				
			}
		}); 
		$("#ssid").formValidator({empty:false, onshow:"无线名称的长度范围为[2-22]个字符", onfocus:"无线名称修改后，连接该路由的用户将会下线", oncorrect:" "})
		.functionValidator({fun:function(val,elem){
			if (val.length >= 2 && val.length <= 22){
				return true;
			}else{
				return 	'输入错误';
			}
		}});
		$("#checktime").formValidator({empty:false,onshow:"检查周期表示路由会在指定周期时间访问平台",onfocus:"检查周期范围[6-3600]",oncorrect:" "})
		.functionValidator({fun:function(val,elem){
			if (val >= 6 && val <= 3600){
				return true;
			}else{
				return 	'输入错误';
			}
		}});
		$("#timeout").formValidator({onshow:"用户设备在规定的时间内依然没有响应路由器，路由将认为该用户离线",onfocus:"超时时间范围[120~21600]",oncorrect:" "})
		.functionValidator({fun:function(val,elem){
			if (val >= 120 && val <= 21600){
				return true;
			}else{
				return 	'输入错误';
			}
		}});
		$("#whiteurl").formValidator({onshow:"集客盒子的域名白名单是泛域名，多个域名请用逗号隔开，请正确填写",onfocus:"示例：cnrouter.com",oncorrect:" "})
		.functionValidator({fun:function(val,elem){
			var EMAILS_REGEXP = /^((http:\/\/\[A-Za-z]+|[A-Za-z]+)\.([A-Za-z0-9]+(-)[A-Za-z0-9]+|[A-Za-z0-9]+)\.([A-Za-z]+))|(([A-Za-z0-9]+(-)[A-Za-z0-9]+|[A-Za-z0-9]+)\.([A-Za-z]+))$/i;
			if (val == ''){
				return true;
			}

			var temp = val.split(',');
			for (var i = 0; i < temp.length; i++) {
				
				if (!EMAILS_REGEXP.test(temp[i])){
					return '域名格式错误('+temp[i]+')';
				}
			}
			return true;
		}});
		$("#whitemac").formValidator({onshow:"多个mac用逗号隔开",onfocus:"示例：04:8d:38:3a:32:f3",oncorrect:" "})
		.functionValidator({fun:function(val,elem){
			var EMAILS_REGEXP = /^([0-9A-Fa-f]{2})(([/\s:][0-9a-fA-F]{2}){5})$/i;
			if (val == ''){
				return true;
			}

			var temp = val.split(',');
			for (var i = 0; i < temp.length; i++) {
				
				if (!EMAILS_REGEXP.test(temp[i])){
					return 'MAC格式错误('+temp[i]+')';
				}
			}
			return true;
		}});

		var status = "<?php echo ($info['apple']); ?>";
      	if (status == ''){
      		status = 1;
      		$('#apple').attr('checked', true);
      	}
      	var nav_image = "<?php echo ($nav_info['nav_image']); ?>";
		$('#apple').bootstrapSwitch({'onText':'启用', 'offText':'禁用', 'state': status==0 ? false : true, 'onSwitchChange':function(e, data){
		    $('#apple').attr('checked', data);
		}});
		var nopop = "<?php echo ($info['nopop']); ?>";
      	if (nopop == ''){
      		nopop = 1;
      		$('#nopop').attr('checked', true);
      	}
      	var nav_image = "<?php echo ($nav_info['nav_image']); ?>";
		$('#nopop').bootstrapSwitch({'onText':'启用', 'offText':'禁用', 'state': nopop==0 ? false : true, 'onSwitchChange':function(e, data){
		    $('#nopop').attr('checked', data);
		}});

		$('#save').click(function(){
			if (ssid != $("#ssid").val()){
            	showdialog({
					'title':'提示',
					'message':'修改热点名称（SSID）后，用户将掉线，您确定要修改热点账号吗？',
					'okfunction':function(){
						$('#userForm').submit();
					}
				});
				return false;
        	}else{
        		$('#userForm').submit();
        	}
		});

	});
	function set_wifidog(s){
		var router_id = '<?php echo ($id); ?>';
		var id = '<?php echo ($info["id"]); ?>';
		if (s == 0){
			showdialog({
				'title':'提示',
				'message':'<p>认证关闭后，路由将不会再向平台上报用户数据，您将无法进行无线营销<p/><p>输入OK确定，其它放弃。</p><input class="col-xs-12 col-sm-12" id="property-returnValue-demo" value="" />',
				'okfunction':function(){
					var v = $('#property-returnValue-demo').val();
	                    if (v == 'OK'){
	                        $.ajax({ 
					            url: "<?php echo U('Router/wifidog_lock');?>",  
					            data:{'enable':s},
					            dataType:'json',
					            type:'POST',
					            success: function(data){
					            	
					                if (data.ret == 1){
					                	$("#alert_box_table").jk_alert({ msg: data.msg, type: 'success', show_time: 8500 });
					                }else{
					                    $("#alert_box_table").jk_alert({ msg: data.msg, type: 'danger', show_time: 8500 });
					                }
					            }
					        });
	                    }
					
				}
			});
		}else{
			$.ajax({ 
	            url: "<?php echo U('Router/wifidog_lock');?>",  
	            data:{'enable':s},
	            dataType:'json',
	            type:'POST',
	            success: function(data){
	            	
	                if (data.ret == 1){
	                	$("#alert_box_table").jk_alert({ msg: data.msg, type: 'success', show_time: 8500 });
	                }else{
	                    $("#alert_box_table").jk_alert({ msg: data.msg, type: 'danger', show_time: 8500 });
	                }
	            }
	        });
		}
		
	}
</script>
<div class="page-content" >
	<div class="row">
		<div class="col-xs-12"> 
			<div class="tabbable">
				<nav class="navbar navbar-default abc" role="navigation">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="active">
									<a href="#">
										<i class="blue icon-cog bigger-110"></i>
										基础设置
									</a>
								</li>
								
								
							
								<li>
									<a  href="<?php echo U('Router/router_task_list');?>" >
										<i class="red icon-list bigger-110"></i>
										任务日志列表
									</a>
								</li>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
				<div class="tab-content" id="index_box">
					<div class="tab-pane active">
						<div id="status-pane" class="form-horizontal">
							
							<div id="alert_box_table"></div>
							<div class="row">
								<form name="userForm" id="userForm" novalidate="" action="<?php echo U('Router/save_config');?>" method="post"> 
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1">最近一次修改配置时间：</label>
										<div class="col-sm-9">
											<label><?php echo ($info["last_datetime"]); ?></label>
										</div>
									</div>	
									<input type="hidden" id="id" name="id" value="<?php echo ($info['id']); ?>">
									<input type="hidden" id="router_id" name="router_id" value="<?php echo ($id); ?>">	
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right margintop5" for="form-field-1"> 
											<i class="icon-asterisk light-red smaller-60 middle"></i>&nbsp;无线名称（SSID）： 
										</label>
										<div class="col-sm-6">
											<div class="input-group col-xs-10 col-sm-12 ">
												<input type="text" id="ssid" name="ssid" class="form-control" value="<?php echo ($info["ssid"]); ?>"/>
											</div>

										</div>
										<div class="help-block col-sm-4" >
											<span id="ssidTip"></span>
										</div>
									</div>
									<div class="wifidog form-group">
										<label class="col-sm-2 control-label no-padding-right margintop5"><i class="icon-asterisk light-red smaller-60 middle"></i>&nbsp;检查周期：</label>
										
										<div class="col-sm-2">
											<label class="inline">
												<input type="number" min="6" max="3600" id="checktime" name="checktime" class="input-mini" style="height:34px; width:100px;" value="<?php echo ($info["checktime"]); ?>">
											</label>
											<label class="inline">
												<span class="lbl">秒</span>
											</label>

										</div>
										<div class="help-block col-sm-4" >
											<span id="checktimeTip"></span>
										</div>
									</div>
									<div class="wifidog form-group">
										<label class="col-sm-2 control-label no-padding-right margintop5"><i class="icon-asterisk light-red smaller-60 middle"></i>&nbsp;超时时间：</label>
										<div class="col-sm-2">
											<label class="inline">
												<input type="number" min="120" max="21600" id="timeout" name="timeout"  class="input-mini" style="height:34px; width:100px;" value="<?php echo ($info["timeout"]); ?>">
											</label>
											<label class="inline">
												<span class="lbl">秒</span>
											</label>

										</div>
										<div class="help-block col-sm-8" >
											<span id="timeoutTip"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1">外网域名白名单：</label>
										<div class="col-sm-4">
											<textarea rows="10" id="whiteurl" name="whiteurl" class="col-sm-12 col-xs-12"><?php echo ($info["whiteurl"]); ?></textarea>
			
										</div>
										<div class="help-block col-sm-6" >
											<span id="whiteurlTip"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1">外网域名白名单：</label>
										<div class="col-sm-4">
											<textarea rows="10" id="whitemac" name="whitemac"  class="col-sm-12 col-xs-12"><?php echo ($info["whitemac"]); ?></textarea>
			
										</div>
										<div class="help-block col-sm-6" >
											<span id="whitemacTip"></span>
										</div>
									</div>
					
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right margintop5" for="form-field-1">连接无线自动变完成：</label>
										<div class="col-sm-2">
											<input type="checkbox" id="apple" name="apple" <?php if($info['apple'] == 1 ): ?>checked<?php endif; ?>/>
										
											
										</div>
										<div class="help-block col-sm-7" >
											<p class="dp">仅对苹果手机有效,设备连接WIFI热点后，将弹出的窗口自动变成完成状态</p>
											
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right margintop5" for="form-field-1">连接无线不弹窗：</label>
										<div class="col-sm-2">
											<input type="checkbox" id="nopop" name="nopop" <?php if($info['nopop'] == 1 ): ?>checked<?php endif; ?>/>
										</div>
										<div class="help-block col-sm-7" >
											<p class="dp">仅对苹果手机有效,设备连接WIFI热点后，将不会自动弹出认证页面</p>
										</div>
									</div>
									<div id="alert_box_table"></div>
										<div class="clearfix form-actions">
											<div class="col-md-offset-3 col-md-9">
												<button id="save" type="button" class="btn btn-success" autocomplete="off"><i class="icon-save bigger-150 middle"></i>保存设置</button>
												<?php if(($info['enable'] == 1)): ?><button id="save1" type="button" data-loading-text="正在执行,请稍候..." onClick="set_wifidog(0)" class="btn btn-danger" autocomplete="off"><i class=" icon-unlock-alt bigger-150 middle"></i>关闭认证</button>
												<?php else: ?>
													<button id="save1" type="button"  data-loading-text="正在执行,请稍候..." onClick="set_wifidog(1)" class="btn btn-danger" autocomplete="off"><i class="  icon-unlock bigger-150 middle"></i>开启认证</button><?php endif; ?>
											</div>
										</div>
								</form>
							
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
</div>
                <br/>
            </div>
        </div>
    </div>

          

    <div class="footer center" style="z-index: 1000; position: fixed;">
        <p><?php echo ($copyright_cn); ?></p>
    </div>


</body>
</html>