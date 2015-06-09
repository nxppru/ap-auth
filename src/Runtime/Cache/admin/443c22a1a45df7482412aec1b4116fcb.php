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
                
                <div>
<script type="text/javascript">
	$(document).ready(function(){
		var ret = false;
		$('#myButton').click(function(){
			$('#userForm').submit();
			if (!ret){
				return false;
			}
			var postdata = { 
                'passwd_old'    : hex_md5(hex_md5($('#oldpassword').val())), 
                'passwd_new1'   : hex_md5(hex_md5($('#new1password').val())),
                'passwd_new2'   : hex_md5(hex_md5($('#new2password').val()))
            };
           
			
			$.ajax({ 
	            url: "<?php echo U('Admin/save_password');?>",  
	            data: postdata,
	            dataType:'json',
	            type:'POST',
	            success: function(data){
	                if (data.ret == 1){
	                    $("#alert_box_admin").jk_alert({ msg: data.msg, type: 'success', show_time: 3500 });
	                   
	                    
	                }else{
	                    $("#alert_box_admin").jk_alert({ msg: data.msg, type: 'danger', show_time: 3500 });
	                }
	            }
	        });

		});
		
		$.formValidator.initConfig({
			formid:"userForm",
			onerror:function(msg){
				ret = false;
			},
			onsuccess:function(){
				ret = true;
				return false;
			}
		}); 
		$("#oldpassword").formValidator({empty:false, onshow:"请填写您当前正在使用的密码", onfocus:"请正确填写", oncorrect:" "})
		.functionValidator({fun:function(val,elem){
			if (val.length >=6 && val.length <= 20){
				return true;
			}else{
				return 	'密码输入错误，请重新输入';
			}
		}});
		$("#new1password").formValidator({empty:false, onshow:"请填写一个新密码",onfocus:"长度范围[6-20]",oncorrect:" "})
		.functionValidator({fun:function(val,elem){
			if (val.length >=6 && val.length <= 20){
				return true;
			}else{
				return 	'密码输入错误，请重新输入';
			}
		}});
		$("#new2password").formValidator({onshow:"再次输入密码",onfocus:"请重复输入一次密码",oncorrect:" "})
		.functionValidator({fun:function(val,elem){
			if (val.length >=6 && val.length <= 20 && val == $('#new1password').val()){
				return true;
			}else{
				return 	'两次密码输入不一致';
			}
		}});
	});
</script>

<div class="page-content" id="index_box" >
	<div class="row" >
		<div class="col-xs-12 col-sm-12 col-md-12 padding0">
			<form name="userForm" id="userForm" novalidate="" role="form"> 
				<div id="general_admin" class="form-horizontal">
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right margintop5" for="form-field-1">
							<i class="icon-asterisk light-red smaller-60 middle"></i>&nbsp;原密码：
						</label>
						<div class="col-sm-6">
							<div class="input-group col-xs-10 col-sm-12 ">
								<input type="password" id="oldpassword" name="oldpassword" class="form-control"/>
							</div>
						
						</div>
						<div class="help-block col-sm-4" >
							<span id="oldpasswordTip"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right margintop5" for="form-field-1">
							<i class="icon-asterisk light-red smaller-60 middle"></i>&nbsp;新密码：
						</label>
						<div class="col-sm-6">
							<div class="input-group col-xs-10 col-sm-12 ">
								<input type="password" id="new1password" name="new1password" class="form-control"/>
							</div>
						</div>
						<div class="help-block col-sm-4" >
							<span id="new1passwordTip"></span>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right margintop5" for="form-field-1">
							<i class="icon-asterisk light-red smaller-60 middle"></i>&nbsp;确认新密码：
						</label>
						<div class="col-sm-6">
							<div class="input-group col-xs-10 col-sm-12 ">
								<input type="password" id="new2password" name="new2password" class="form-control"/>
							</div>
						</div>
						<div class="help-block col-sm-4" >
							<span id="new2passwordTip"></span>
						</div>
					</div>
				</div>
				<div id="alert_box_admin"></div>
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<button type="button" id="myButton" data-loading-text="正在修改,请稍候..." class="btn btn-success" autocomplete="off"><i class="icon-save bigger-150 middle"></i>修改密码</button>
					</div>
				</div>
			</form>
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