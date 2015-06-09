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


<div class="page-content">
            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="error-container">
                  <div class="well">
                    <h1 class="grey lighter smaller">
                      <span class="green bigger-125">
                        <i class="icon-check-circle-o"></i>
                        提示
                      </span>
                      
                    </h1>

                    <hr />
                    <h3 class="lighter smaller"><?php echo ($message); ?></h3>

                    <div>
                

                      <div class="space"></div>
                      <h4 class="smaller"><span id='times'>5</span>秒后将跳转
      </h4>

                      
                    </div>

                    <hr />
                    <div class="space"></div>

                    <div class="center">
                
                      <a href="<?php echo ($jumpUrl); ?>" class="btn btn-success">
                        <i class="icon-reply bigger-110"></i>
                        立即跳转
                      </a>
                    </div>
                  </div>
                </div><!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->




<!--end content-->
<script>
var stay_time = 5;
function countDown(secs,surl){     
     var jumpTo = document.getElementById('times');
   jumpTo.innerHTML = secs;  
   if(--secs>0){     
     setTimeout("countDown("+secs+",'"+surl+"')",1000);     
   }else{       
     location.href=surl;     
   }     
}  
var locations = '<?php echo ($jumpUrl); ?>';  
countDown(stay_time,locations);

</script></div>
                <br/>
            </div>
        </div>
    </div>

          

    <div class="footer center" style="z-index: 1000; position: fixed;">
        <p><?php echo ($copyright_cn); ?></p>
    </div>


</body>
</html>