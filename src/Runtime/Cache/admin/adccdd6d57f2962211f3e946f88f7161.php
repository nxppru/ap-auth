<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
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


<!--[if lte IE 8]>
<link rel="stylesheet" href="/admin/css/ace-ie.min.css" />
<![endif]-->

<link href="/admin/css/square/blue.css" rel="stylesheet">
<script type="text/javascript" src="/admin/dest/jquery.all.js"></script>
<script type="text/javascript" src="/admin/dest/login.js"></script>

<body class="login-layout">
    <input type="hidden" id="app" value="/admin">
    <input type="hidden" id="is_reg" value="<?php echo ($is_reg); ?>">
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">


                        <div class="space-6"></div>

                        <div class="position-relative">
                            <div id="login-box" class="login-box widget-box visible no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h3 class="login_h2">
                                            <img src="/admin/upload/logo/<?php echo ($logo); ?>" style="height:27px">
                                            <span class=""><?php echo ($pname_cn); ?>&nbsp;<span style="font-size:14px;"><?php echo ($version_major); ?></span>
                                        </h3>

                                        <div class="space-6"></div>

                                        <form action="<?php echo U('Admin/check');?>" method="post" id="frm1">
                                            <fieldset>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" class="form-control input-lg" placeholder="用户名" autocomplete="off" style="border:1px solid #E5E5E5; border-width:1px;  " id="login_username" name="login_username" />
                                                        <i class="icon-user"></i>
                                                    </span>
                                                </label>

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="password" class="form-control input-lg" placeholder="登录密码" style="border:1px solid #E5E5E5; border-width:1px;" id="login_password" name="login_password" />
                                                        <i class="icon-lock"></i>
                                                    </span>
                                                </label>

                                                <div class="space"></div>
                                                <div id="alert_box_login"></div>
                                                <div class="space"></div>
                                                <div class="clearfix">
                                                    

                                                    <button type="button" id="submint_login" class="btn btn-primary btn-block btn-lg" style="font-size:16px;">
                                                        <i class="icon-key"></i>
                                                        登  陆
                                                    </button>
                                                </div>

                                                <div class="space-4"></div>
                                            </fieldset>
                                        </form>

                                

                                
                                    </div><!-- /widget-main -->
                                    <div class="toolbar clearfix">
                                        <div>
                                            <!-- <a href="#" ng-click="type='forgot-box'" class="forgot-password-link">
                                                <i class="icon-arrow-left"></i>
                                                忘记密码?
                                            </a> -->
                                        </div>
                                       
                                        <?php if(($is_reg == true)): ?><div>
                                            <a href="javascript:void(0)" id="go_reg"  class="user-signup-link">
                                                立即注册
                                                <i class="icon-arrow-right"></i>
                                            </a>
                                        </div><?php endif; ?>
                                    </div>
                                
                                </div><!-- /widget-body -->
                            </div><!-- /login-box -->
                            <div id="forgot-box" class="forgot-box  widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header red lighter bigger">
                                            <i class="icon-key"></i>
                                            Retrieve Password
                                        </h4>

                                        <div class="space-6"></div>
                                        <p>
                                            Enter your email and to receive instructions
                                        </p>

                                        <form>
                                            <fieldset>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="email" class="form-control" placeholder="Email" />
                                                        <i class="icon-envelope"></i>
                                                    </span>
                                                </label>

                                                <div class="clearfix">
                                                    <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                                                        <i class="icon-lightbulb"></i>
                                                        Send Me!
                                                    </button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div><!-- /widget-main -->

                                    <div class="toolbar center">
                                        <a href="#" ng-click="type='login-box'" class="back-to-login-link">
                                            Back to login
                                            <i class="icon-arrow-right"></i>
                                        </a>
                                    </div>
                                </div><!-- /widget-body -->
                            </div><!-- /forgot-box -->
                            <?php if(($is_reg == true)): ?><div id="signup-box" class="signup-box widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header green lighter bigger">
                                            <i class="icon-group blue"></i>
                                            新用户注册
                                        </h4>

                                      
                                        <form>
                                            <fieldset>
                                            

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" class="form-control input-lg" id="reg_username" placeholder="登录账号" />
                                                        <i class="icon-user"></i>
                                                    </span>
                                                </label>

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="password" class="form-control input-lg" id="reg_password" placeholder="登录密码" />
                                                        <i class="icon-lock"></i>
                                                    </span>
                                                </label>

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="password" class="form-control input-lg" id="reg_cfpassword" placeholder="重复密码" />
                                                        <i class="icon-retweet"></i>
                                                    </span>
                                                </label>
                                                
                                                
                                                <div class="input-group">
                                                    <input type="number" class="form-control input-lg" id="reg_phone" placeholder="请输入手机号码">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary " id="getCode" style="height:46px;" type="button">获取验证码</button>
                                                    </span>
                                                </div>
                                                <label class="block clearfix" ng-show="iscode==true">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="number" class="form-control input-lg" id="reg_code" placeholder="请输入短信验证码" />
                                                        <i class="icon-mobile-phone"></i>
                                                    </span>
                                                </label>
                                                <!-- <label class="block">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl">
                                                        我同意
                                                        <a href="#">使用协议</a>
                                                    </span>
                                                </label> -->
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" class="form-control input-lg" id="reg_manager" placeholder="公司名称或者个人姓名" />
                                                        <i class="icon-male"></i>
                                                    </span>
                                                </label>
                                               	<label class="block clearfix">
                                                    <div class="input-group col-sm-12">
														<select name="province" id="province" style="height:46px;" class="form-control"></select>
														<span class="input-group-btn"></span>
														<select name="city" id="city" style="height:46px;" class="form-control"></select>
														<span class="input-group-btn"></span>
														<select name="area" id="area" style="height:46px;" class="form-control"></select>
													</div>
                                                </label>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <select id="industry" name="industry" class="form-control" style="height:46px;">
											    			<option value="">请选择行业</option>
											    			<?php if(is_array($industry)): $k = 0; $__LIST__ = $industry;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><option  value="<?php echo ($k); ?>" <?php if($k == $merchant_info['industry'] ): ?>selected<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
														</select>
                                                    </span>
                                                </label>
                                                <div id="alert_box_reg"></div>
                                                <div class="space-4"></div>
                                                <div class="clearfix">
                                                    <button type="reset" class="width-30 pull-left btn  ">
                                                        <i class="icon-refresh"></i>
                                                        重置
                                                    </button>

                                                    <button type="button" class="width-65 pull-right btn  btn-success" id="register">
                                                        注册
                                                        <i class="icon-arrow-right icon-on-right"></i>
                                                    </button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>

                                    <div class="toolbar center">
                                        <a href="javascript:void(0);" id="back_login" class="back-to-login-link">
                                            <i class="icon-arrow-left"></i>
                                            返回登录
                                        </a>
                                    </div>
                                </div><!-- /widget-body -->
                            </div><!-- /signup-box --><?php endif; ?>

                            
                        </div><!-- /position-relative -->
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div><!-- /.main-container -->


</body>
<script type="text/javascript">
$(document).ready(function(){

if( $.browser.msie && ( $.browser.version == '6.0' || $.browser.version == '7.0' || $.browser.version == '8.0') ){
alert("您的浏览器版本过低，使用IE9+、Google Chrome、Firefox获取最佳体验\n系统采用最新的流动布局，可以同时支持PC,平板,手机");
return;
}
$(document).on('touchstart mousedown', '.main-content', function(){
$('#menu-toggler').removeClass('display');
$('#sidebar').removeClass('display');
})
})
</script>
</html>