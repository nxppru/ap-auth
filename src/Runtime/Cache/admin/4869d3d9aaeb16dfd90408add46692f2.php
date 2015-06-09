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
                
                <div><script type="text/javascript" charset="utf-8" src="/admin/dest/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/admin/dest/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/admin/dest/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var ret = 1;
		var old_router_mac = "<?php echo ($router_info['router_mac']); ?>";
		$.formValidator.initConfig({
			formid:"userForm1",
			onerror:function(msg){
			},
			onsuccess:function(){
				if (old_router_mac != '' && $("#router_mac").val() != old_router_mac && ret == 1){
					showdialog({
						'title':'警告',
						'message':'<font color="red">您修改了路由的MAC,系统将会把源MAC对应的用户转到新的MAC中<br/>并且该路由的在线用户将下线，您确定这么做吗？</font>',
						'okfunction':function(){
							ret = 0;
							$('#userForm1').submit();
						}
					});
					return false;
				}
				
			}
		}); 

		$("#router_mac").formValidator({empty:false,onshow:"请填写要绑定的路由mac",onfocus:"示例：04:8d:38:3a:32:f3",oncorrect:" "})
		.functionValidator({fun:function(val,elem){
			var EMAILS_REGEXP1 = /^([0-9A-Fa-f]{2})(([/\s:][0-9a-fA-F]{2}){5})$/i;
			if (!EMAILS_REGEXP1.test(val)){
				return '路由MAC格式不正确（04:8d:38:3a:32:f3）';
			}
			return true;
		}});
		



	

	});
</script>


<div class="page-content">
	<div class="row">
		<div class="col-xs-12"> 
			<form name="userForm1" id="userForm1" novalidate="" action="<?php echo U('Router/save_router_config');?>" method="post"> 
				<div class="form-horizontal">
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right " for="form-field-1"> 状态：</label>
						<div class="col-sm-9">
							<label>
								<?php echo router_status1($router_info['status']);?>
								
							</label>
						</div>
					</div>
		
					
					<div class="form-group" >
						<label class="col-sm-2 control-label no-padding-right margintop5" > 
							路由MAC： 
						</label>
						<div class="col-sm-4">
							<div class="input-group col-xs-10 col-sm-12 ">
								<input type="text" id="router_mac" name="router_mac"  class="form-control" value="<?php echo ($router_info['router_mac']); ?>"/>
							</div>
							
						</div>
						<div class="help-block col-sm-6" >
							<span id="router_macTip"></span>
						</div>
					</div>
			

					
					
					
					
					<div id="alert_box"></div>
					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9 col-sm-9">
							<button id="save" class="col-sm-2 btn btn-success" data-loading-text="正在提交,请稍候..." type="submit">
								<i class="icon-save bigger-110"></i>
							 	<span id="submitbutton">保存</span>
							</button>
							
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div></div>
                <br/>
            </div>
        </div>
    </div>

          

    <div class="footer center" style="z-index: 1000; position: fixed;">
        <p><?php echo ($copyright_cn); ?></p>
    </div>


</body>
</html>