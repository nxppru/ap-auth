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
                
                <div><div class="page-content" id="index_box" style="background:#EDF3F7; height: 100%; ">
	<div class="row" >

		<div class="col-xs-12 col-sm-12 col-md-12 padding0">
			
			<div class="col-xs-12 col-sm-12  padding0">
				<div class="jk_box">
				<div class="jk_box_title">用户及微站信息</div>
				<div class="clearfix">
					<table id="grid-table" class="table table-bordered table-hover">
						<tbody>
							
							<tr>
								<td width="140" style="background-color: #edf3f4;text-align: right;">在线已认证用户数</td>
								<td><?php echo ($router_info['online_user_count']); ?></td>
								<td width="140" style="background-color: #edf3f4;text-align: right;">已连接用户数</td>
								<td><?php echo ($router_info['clientcount']); ?></td>
							</tr>
							<tr>
								<td  width="140" style="background-color: #edf3f4;text-align: right;">历史最高认证人数</td>
								<td><?php echo ($max_log["user_total"]); ?>(<?php echo ($max_log["date"]); ?>)</td>
								<td width="140" style="background-color: #edf3f4;text-align: right;">历史累计用户数</td>
								<td><?php echo ($sum_log); ?></td>
							</tr>
							<tr>
								<td width="140" style="background-color: #edf3f4;text-align: right;">今日已认证用户数</td>
								<td><?php echo ($today); ?></td>
								<td width="140" style="background-color: #edf3f4;text-align: right;">昨日已认证用户数</td>
								<td><?php echo ($yesterday); ?></td>
							</tr>
							<tr>
								<td width="140" style="background-color: #edf3f4;text-align: right;">产品数</td>
								<td><?php echo ($station["product_num"]); ?></td>
								<td width="140" style="background-color: #edf3f4;text-align: right;">新闻数</td>
								<td><?php echo ($station["new_num"]); ?></td>
							</tr>
							<tr>
								<td width="140" style="background-color: #edf3f4;text-align: right;">幻灯片数</td>
								<td><?php echo ($station["slide_num"]); ?></td>
								<td width="140" style="background-color: #edf3f4;text-align: right;">活动数</td>
								<td><?php echo ($station["activity_num"]["status0"]); ?>/<?php echo ($station["activity_num"]["status1"]); ?>/<?php echo ($station["activity_num"]["status2"]); ?>(未开始/进行中/已结束)</td>
							</tr>
						</tbody>
					</table>

					
				
				</div>
			</div>
				
				
			</div>
			
			
			<div class="col-xs-12 col-sm-6 padding0" >
				<div class="jk_box">
					<div class="jk_box_title">今日新老访客分布</div>
					<div class="clearfix">
						<div style="height:275px; widht:100%;" id="container1"></div>
						
					</div>
				</div>
				
			</div>
			<div class="col-xs-12 col-sm-6 padding0" style="padding-left:15px;">
				<div class="jk_box">
					<div class="jk_box_title">今日终端类型分布</div>
					<div class="clearfix">
						<div style="height:275px; widht:100%;" id="container2"></div>
						
					</div>
				</div>
				
			</div>

			<div class="col-xs-12 col-sm-12 padding0">
				<div class="jk_box">
					<div class="jk_box_title">最近10天认证人数统计图</div>
					<div class="clearfix">
						<div style="height:240px; widht:100%;" id="container"></div>
						
					</div>
				</div>
				
			</div>
		</div>


</div>
<br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
	</div>

<SCRIPT TYPE="text/javascript">
	var top10 = <?php echo ($top10); ?>;
	var chart_data = [], xAxis=[];
	$.each(top10, function(){
		chart_data.push(parseInt(this.login_total));
        xAxis.push(this.date);
	});
   

    create_chart(chart_data, xAxis);
    create_chart1(<?php echo ($new_old_count['new']); ?>, <?php echo ($new_old_count['old']); ?>);
    create_chart2(<?php echo ($device_type_count['Phone']); ?>, <?php echo ($device_type_count['Tablet']); ?>, <?php echo ($device_type_count['computer']); ?>);
	function create_chart(data, xAxis){ 
        $('#container').highcharts({
            title: {
                text: '',
                x: 0 //center
            },
            subtitle: {
                text: '',
                x: 0
            },
            xAxis: {
                categories: xAxis
            },
            yAxis: {
                title: {
                    text: '最近10天认证图(人)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '人'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                borderWidth: 0
            },
            series: [{
                name: '认证人数',
                data: data
            }]
        });
    }
    function create_chart1(new1, old){
    	$('#container1').highcharts({
	        chart: {
	            plotBackgroundColor: null,
	            plotBorderWidth: null,
	            plotShadow: false,
	            type: 'pie'
	        },
	        title: {
	            text: ''
	        },
	        tooltip: {
	    	    formatter: function() {
	            	return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'% ('+
	                         Highcharts.numberFormat(this.y, 0, ',') +' 个)';
	         	}
	        },
	        legend:{
            	layout:'vertical',
            	align:'right',
            	verticalAlign:'middle'
            },
	        plotOptions: {
	            pie: {
	                allowPointSelect: true,
	                cursor: 'pointer',
	                colors:[
	                	'#DF661A',
	                	'#2889B3'

	                ],
	                
	                showInLegend: true,
	                size:'100%',
	               
	                innerSize:'40%',
	                dataLabels: {
	                    enabled: false
	                    
	                }
	            }
	        },
	        series: [{
	           
	            name: '',
	            data: [
	                ['新访客',   new1],
	                ['老访客',   old]
	            ]
	        }]
	    });
    }
    function create_chart2(Phone, Tablet, computer){
    	$('#container2').highcharts({
	        chart: {
	            plotBackgroundColor: null,
	            plotBorderWidth: null,
	            plotShadow: false,
	            type: 'pie',
           		
	        },
	        title: {
	            text: ''
	        },
	        tooltip: {
	    	    formatter: function() {
	            	return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 1) +'% ('+
	                         Highcharts.numberFormat(this.y, 0, ',') +' 个)';
	         	}
	        },
	        legend:{
            	layout:'vertical',
            	align:'right',
            	verticalAlign:'middle'
            },
	         plotOptions: {
	            pie: {
	            	colors:[
	                	'#2789B3',
	                	'#53C94E',
	                	'#DE661A'

	                ],
	                allowPointSelect: true,
	                showInLegend: true,
	                cursor: 'pointer',
	                size:'100%',
	               
	                innerSize:'40%',
	                dataLabels: {
	                    enabled: false
	                   
	                }
	            }
	        },
	        series: [{
	        
	            name: '',
	            data: [
	                ['手机',   Phone],
	                ['平板',   Tablet],
	                ['电脑',   computer],
	            ]
	        }]
	    });
    }
	setInterval(function(){
		var w = $(window).height();
		var b = $('#index_box').css('height')
		if (w > parseInt(b)){
			$('#index_box').css('height', (w-100)+'px');
		}
	}, 500)
</SCRIPT></div>
                <br/>
            </div>
        </div>
    </div>

          

    <div class="footer center" style="z-index: 1000; position: fixed;">
        <p><?php echo ($copyright_cn); ?></p>
    </div>


</body>
</html>