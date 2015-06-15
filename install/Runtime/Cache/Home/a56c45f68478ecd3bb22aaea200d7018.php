<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>openWMS - 安装程序</title>

    <!-- Bootstrap Core CSS -->
    <link href="/install/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/install/Public/css/grayscale.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/install/Public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <img src="/install/Public/img/logo.png" width="50" style="float:left;"><span class="light" style="line-height: 30px !important;">集客</span> openWMS
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">环境检测</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#download">参数配置</a>
                    </li>
               
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="brand-heading">openWMS</h1>
                        <p class="intro-text">OpenWMS是集客科技开发的基于wifidog协议的认证营销平台。采用开源GPL许可证，任何个人和公司都可以免费下载、安装和使用本系统，没有限制，也没有许可费用。 OpenWMS使用PHP语言开发，可以运行在windows和linux系统上，也可以在阿里云等云服务器上部署。 OpenWMS支持与所有wifidog的路由器对接。 OpenWMS支持远程集中控制集客科技的系列路由系统（集客盒子和集客网关）。</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row about_class">
            <div class="col-lg-10 col-lg-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading" style="text-align: left;">服务器信息</div>
					<div class="panel-body">
						
							<table id="grid-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr >
										<th class="center1">参数</th>
										<th class="center1">值</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td width="50" >服务器域名</td>
										<td width="50"><?php echo ($sp_name); ?></td>
									</tr>
									<tr>
										<td width="50" >服务器操作系统</td>
										<td width="50"><?php echo ($sp_os); ?></td>
									</tr>
									<tr>
										<td width="50" >服务器解译引擎</td>
										<td width="50"><?php echo ($sp_server); ?></td>
									</tr>
									<tr>
										<td width="50" >PHP版本</td>
										<td width="50"><?php echo ($phpv); ?></td>
									</tr>
									<tr>
											<td><strong>系统安装目录</strong></td>
											<td><?php echo OPENWMSROOT; ?></td>
									</tr>
								</tbody>
							</table>
					
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" style="text-align: left;">系统环境检测</div>
					<div class="panel-body">
						<table id="grid-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr >
									<th class="center1">需开启的变量或函数</th>
									<th class="center1">要求</th>
									<th class="center1">实际状态及建议</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td width="50" >allow_url_fopen</td>
									<td width="50">On</td>
									<td width="50"><?php echo ($sp_allow_url_fopen); ?> (不符合要求将导致采集、远程资料本地化等功能无法应用)</td>
								</tr>
								<tr>
									<td width="50" >safe_mode</td>
									<td width="50">Off</td>
									<td width="50"><?php echo ($sp_safe_mode); ?> (本系统不支持在非win主机的安全模式下运行)</td>
								</tr>
								<tr>
									<td width="50" >mb_string</td>
									<td width="50">On</td>
									<td width="50"><?php echo ($sp_mb_string); ?> (不支持中文操作函数无法使用本系统)</td>
								</tr>
								<tr>
									<td width="50" >GD 支持</td>
									<td width="50">On</td>
									<td width="50"><?php echo ($sp_gd); ?> (不支持将导致与图片相关的大多数功能无法使用或引发警告)</td>
								</tr>
								<tr>
									<td width="50" >MySQL 支持</td>
									<td width="50">On</td>
									<td width="50"><?php echo ($sp_mysql); ?> (不支持无法使用本系统)</td>
								</tr>
								<tr>
									<td width="50" >[<font color="red">重要</font>]Redis 支持(开启)</td>
									<td width="50">On</td>
									<td width="50"><?php echo ($sp_redis); ?> (不支持无法使用本系统)</td>
								</tr>
								
								
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" style="text-align: left;">目录权限检测</div>
					<div class="panel-body">
						<table id="grid-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr >
									<th class="center1">目录名</th>
									<th class="center1">读取权限</th>
									<th class="center1">写入权限</th>
								</tr>
							</thead>
							<tbody>
									<?php
 foreach($sp_testdirs as $d) { ?>
			<tr>
					<td><?php echo $d; ?></td>
					<?php
 $fulld = OPENWMSROOT.str_replace('/*','',$d); $rsta = (is_readable($fulld) ? '<font color=green>[√]读</font>' : '<font color=red>[×]读</font>'); $wsta = (TestWrite($fulld) ? '<font color=green>[√]写</font>' : '<font color=red>[×]写</font>'); echo "<td>$rsta</td><td>$wsta</td>\r\n"; ?>
			</tr>
			<?php
 } ?>
								
							</tbody>
						</table>
					</div>
				</div>

                
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download" class="content-section text-center">
        <div class="download-section ">
            <div class="container about_class">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="panel panel-default">
						<div class="panel-heading" style="text-align: left;">数据库设定</div>
						<div class="panel-body">
							
								<table id="grid-table" class="table table-striped table-bordered table-hover">
									
									<tbody>
										<tr>
											<td width="150" >数据库主机：</td>
											<td width="550"><input type="text" class="form-control" id="host" value="localhost"></td>
											<td>一般为localhost</td>
										</tr>
										<tr>
											<td width="150" >数据库用户：</td>
											<td width="550"><input type="text" class="form-control" id="username" value="root"></td>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td width="150" >数据库密码：</td>
											<td width="550"><input type="text" class="form-control" id="password"></td>
											<td>&nbsp;</td>
										</tr>
										
										<tr>
											<td width="150" >数据库名称：</td>
											<td width="550"><input type="text" class="form-control" id="dbname" value="openWMs"></td>
											<td>&nbsp;</td>
										</tr>

									</tbody>
								</table>
						
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" style="text-align: left;">管理员初始密码</div>
						<div class="panel-body">
							
								<table id="grid-table" class="table table-striped table-bordered table-hover">
									
									<tbody>
										<tr>
											<td width="150" >用户名：</td>
											<td width="550"><input type="text" class="form-control" id="uname" value="admin"></td>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td width="150" >密　码：</td>
											<td width="550"><input type="text" class="form-control" id="pw" value=""></td>
											<td>&nbsp;</td>
										</tr>
										

									</tbody>
								</table>
						
						</div>
					</div>

					<ul class="list-inline banner-social-buttons">
                    <li>

                        <button type="button" class="btn btn-success btn-lg" id="sub_form">开始安装</button>
                    </li>
                  
                </ul>
                </div>
            </div>
        </div>
    </section>



   

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; 2014 WWW.CNROUTER.COM All Rights Reserved. 版权所有: 武汉集客科技有限公司 鄂ICP备14005752号</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="/install/Public/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/install/Public/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="/install/Public/js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
 
    <!-- Custom Theme JavaScript -->
    <script src="/install/Public/js/grayscale.js"></script>
    <script src="/install/Public/js/md5.js"></script>
    <script type="text/javascript">

						
		var sp_allow_url_fopen = '<?php echo ($sp_allow_url_fopen1); ?>';
		var sp_safe_mode = '<?php echo ($sp_safe_mode1); ?>';
		var sp_mb_string = '<?php echo ($sp_mb_string1); ?>';
		var sp_gd = '<?php echo ($sp_gd1); ?>';
		var sp_mysql = '<?php echo ($sp_mysql1); ?>';
		var sp_redis = '<?php echo ($sp_redis1); ?>';
    	$(document).ready(function(){
    		$('#sub_form').click(function(){
    			if (sp_allow_url_fopen==0 || sp_safe_mode==0 || sp_mb_string==0 || sp_gd==0 || sp_mysql==0 || sp_redis==0){
    				alert('系统环境检测关键模块未安装，请确认');
    				return false;
    			}
    			var host = $('#host').val();
    			var username = $('#username').val();
    			var password = $('#password').val();
    			var dbname = $('#dbname').val();
    			var uname = $('#uname').val();
    			var pw = $('#pw').val();
    			if (host == ''){
    				alert('请填写数据库主机');
    				return false;
    			}
    			if (username == ''){
    				alert('请填写数据库用户');
    				return false;
    			}
    			
    			if (dbname == ''){
    				alert('请填写数据库名称');
    				return false;
    			}
    			if (uname == ''){
    				alert('请填写后台登陆用户名');
    				return false;
    			}
    			if (pw == ''){
    				alert('请填写后台登陆密码');
    				return false;
    			}
    			$(this).attr('disabled', true);
    			$.ajax({ 
		            url: "<?php echo U('Index/install');?>",  
		            data:{
		            	'host': host, 
		            	'username': username, 
		            	'password': password, 
		            	'dbname': dbname, 
		            	'uname': uname, 
		            	'pw': hex_md5(hex_md5(pw))
		            },
		            dataType:'json',
		            type:'POST',
		            success: function(data){
		                $('#sub_form').attr('disabled', false);
		               
		               	alert(data.msg);

		               	if (data.ret == 1){
		               		window.location.href = 'http://<?php echo ($sp_name); ?>/admin/';
		               	}
		               
		            }
		        });
    		});
    	})

    </script>


</body>

</html>