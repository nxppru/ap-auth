<?php if (!defined('THINK_PATH')) exit();?>
	
<div class="row">
	<div class="col-sm-12 col-xs-12"  style="text-align:right;">
		<div style="width:260px; float:left;">
			
			每页显示
	<select id="listRows">
	<?php foreach($rpOptions as $val){?>
		<?php if(intval($val) == intval($rp)){?>
			<option value="<?php echo $val;?>" selected="selected"><?php echo $val;?></option>
		<?php }else{?>
			<option value="<?php echo $val;?>"><?php echo $val;?></option>
		<?php }?>
	<?php }?>	
	</select>
	条，共<strong><?php echo ($total); ?></strong>条数据
		</div>
		<div class="current_page">
	<?php echo $page ?>
	
</div>
		
	</div>
</div>