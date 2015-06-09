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
                
                <div><div class="page-content">
	<div class="row">
		<div class="col-xs-12"> 
	
			<div id="alert_box_table"></div>

			<div class="well well-sm">
				<div class="row">
					<div class="col-sm-3 padding0">
						<div class="input-group">
							<select name="search_device_type" id="search_device_type" class="form-control" style="height:34px;">
				    			<option value="">请选择设备类型</option>
				    			<option value="Phone" <?php if($param['device_type'] == 'Phone' ): ?>selected<?php endif; ?>>手机</option>
				    			<option value="computer" <?php if($param['device_type'] == 'computer' ): ?>selected<?php endif; ?>>电脑</option>
				    			<option value="Tablet" <?php if($param['device_type'] == 'Tablet' ): ?>selected<?php endif; ?>>平板电脑</option>
							</select>
							<span class="input-group-btn">
								
							</span>
						
							<select name="search_auth_type" id="search_auth_type" class="form-control" style="height:34px;">
				    			<option value="">请选择登录方式</option>
				    			<option value="akey_verify" <?php if($param['auth_type'] == 'akey_verify' ): ?>selected<?php endif; ?>>一键认证</option>
				    			<option value="weixin_verify" <?php if($param['auth_type'] == 'weixin_verify' ): ?>selected<?php endif; ?>>微信认证</option>
				    			<option value="mobile" <?php if($param['auth_type'] == 'mobile' ): ?>selected<?php endif; ?>>短信认证</option>
				    			<option value="virtualmobile" <?php if($param['auth_type'] == 'virtualmobile' ): ?>selected<?php endif; ?>>虚拟短信认证</option>
				    			<option value="qq" <?php if($param['auth_type'] == 'qq' ): ?>selected<?php endif; ?>>QQ认证</option>
				    			<option value="weibo" <?php if($param['auth_type'] == 'weibo' ): ?>selected<?php endif; ?>>微博认证</option>
							</select>
							
							
						</div>
						
					</div>
					<div class="col-sm-6 padding0">
						<div class="input-group">

							<select name="date_type" id="date_type" class="form-control" style="height:34px;">
				    	
				    			<option value="create_time" <?php if($param['date_type'] == 'create_time' ): ?>selected<?php endif; ?>>注册时间</option>
				    			<option value="lastvisit_time" <?php if($param['date_type'] == 'lastvisit_time' ): ?>selected<?php endif; ?>>最后登录时间</option>
							</select>
							<span class="input-group-btn">
								
							</span>
							<input  type="text" class="form-control Wdate" type="text" onFocus="WdatePicker({isShowClear:false})" name="time_start" id="time_start" placeholder="起始日期" value="<?php echo ($param['time_start']); ?>"/>
							<span class="input-group-btn">
								<button type="button" disabled style="border-radius:0px;" class="btn btn-default" ><i class="icon-long-arrow-right"></i></button>
							</span>
							<input type="text" class="form-control Wdate" onFocus="WdatePicker({isShowClear:false})" name="time_end" id="time_end" placeholder="结束日期" value="<?php echo ($param['time_end']); ?>"/>
							 
						</div>
					</div>
					
					
					<div class="col-sm-2 padding0">
						<button  class="btn btn-sm btn-white" style="height: 34px;" id="seach_btn">
						<i class="icon-search green bigger-130"></i>
						<span class="bigger-110 no-text-shadow">搜索</span>
						</button>
						<button  class="btn btn-sm btn-white" style="height: 34px;" id="download_execl">
						<i class="icon-download green bigger-130"></i>
						<span class="bigger-110 no-text-shadow">导出数据</span>
						</button>

					</div> 

				</div>
			</div>
			<div class="space-4"></div>
			<div class="table-responsive">

				<?php echo NW('Table',array( 'columns'=>array( array('name'=>'router_name','text'=>'路由名称','width'=>'12%'), array('name'=>'username','text'=>'用户名','width'=>'10%','sortable'=>false), array('name'=>'auth_type','text'=>'登录方式','width'=>'12%','sortable'=>true), array('name'=>'times','text'=>'认证次数','width'=>'12%','sortable'=>true), array('name'=>'create_time','text'=>'注册时间','width'=>'12%','sortable'=>true), array('name'=>'lastvisit_time','text'=>'最后登录时间','width'=>'12%','sortable'=>true), array('name'=>'device_type','text'=>'设备类型','width'=>'15%','sortable'=>true), ), 'default' => '空', 'rows' => !is_array($rows) ? array() : $rows , 'button_width' =>'15%', 'button' => array( 0 => array('class'=>'blue', 'icon'=>'search', 'name'=>'user_info', 'title'=>'用户详情', 'field'=>array('id')), ), ) ,'User' );?>
				
			</div>

			<?php echo W('Page/index', array('total'=>$count, 'rp'=>$pagelen, 'param'=>$param));?>
			
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("a[name='user_info']").click(function(){
			var field = $(this).attr('value');
			if (field == ''){
				$("#alert_box_table").jk_alert({msg: '没有获取到要查看的数据，请刷新后重试', type:'danger', show_time:12000});
				return false;
			}
	
			
			
			dialog({
				id: 'test-dialog',
				title: '用户详情',
				width:600,
				height:270,
				padding:0,
				url: "<?php echo U('Client/user_info');?>?id="+field
			}).show();
		});
		$('#search_device_type').change(function(){
			window.location.href = search();
		});
		$('#search_auth_type').change(function(){
			window.location.href = search();
		});
		$('#router_mac').change(function(){
			window.location.href = search();
		});
		$('#listRows').change(function(){
			window.location.href = search();
		})
		$("th[name='sort']").click(function(){

			window.location.href = search()+'&reverse='+$(this).attr('id')+'&sortkey='+$(this).attr('field');
		});
		$('#seach_btn').click(function(){
			window.location.href = search();
		});
		$('#download_execl').click(function(){
			var search_auth_type = $('#search_auth_type').val();
			var router_mac = $('#router_mac').val();
			
			var time_start = $('#time_start').val();
			var time_end = $('#time_end').val();
			window.location.href = "<?php echo U('Client/download_execl_for_userlist');?>?auth_type="+search_auth_type+'&router_mac='+router_mac+'&time_start='+time_start+'&time_end='+time_end;
		});
	});
	function search(){
		var search_device_type = $('#search_device_type').val();
		var search_auth_type = $('#search_auth_type').val();
		var router_mac = $('#router_mac').val();
		var date_type = $('#date_type').val();
		var time_start = $('#time_start').val();
		var time_end = $('#time_end').val();
		var listRows = $('#listRows').val();
		return "<?php echo U('Client/userlist');?>?pagelen="+listRows+'&auth_type='+search_auth_type+'&device_type='+search_device_type+'&router_mac='+router_mac+'&date_type='+date_type+'&time_start='+time_start+'&time_end='+time_end;
	}
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