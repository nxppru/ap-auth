<?php if (!defined('THINK_PATH')) exit();?><div class="col-xs-12">
	<div class="table-responsive">
		<table id="sample-table-1"
			class="table table-striped table-bordered table-hover dataTable" style='text-align:center'>
			<thead>
				<tr>
					<?php if($checkbox!=''){ ?>
					<th class="center" width="50"><label><input type="checkbox" class="ace" id="<?php echo $checkbox['id']?>"> <span class="lbl"></span></label></th>
					<?php } ?>
					<?php if(is_array($columns)): foreach($columns as $key=>$col): $sortkey = $_GET['sortkey']; $reverse = $_GET['reverse']; ?>
		
					<th width="<?php echo ($col["width"]); ?>"  class="center <?php if ($col['sortable']==true && $col['name']==$sortkey && $reverse=='desc'){echo 'sorting_desc';}else if($col['sortable']==true && $col['name']==$sortkey && $reverse=='asc'){echo 'sorting_asc';}else if ($col['sortable']==true){echo 'sorting';}?>" name="<?php if ($col['sortable']==true ){echo 'sort';}?>"" field="<?php echo $col['name'];?>" id="<?php if ($col['sortable']==true && $col['name']==$sortkey && $reverse=='desc'){echo 'asc';}else if($col['sortable']==true && $col['name']==$sortkey && $reverse=='asc'){echo 'desc';}else if ($col['sortable']==true){echo 'asc';}?>">
						<?php echo ($col["text"]); ?>
						 
						
					
						
						</th><?php endforeach; endif; ?>
					<?php  if(!empty($button)){ ?>
							
					<th class="center" width="<?php echo ($button_width); ?>"><label> <span class="lbl">操作</span></label></th>
					<?php }?>
				</tr>
			</thead>

			<tbody>
				<?php foreach($rows as $rowsk=>$row){?>
				<tr>
					<?php if($checkbox!=''){ ?>
					<td class="center" ><label> <input type="checkbox" class="ace" name="<?php echo $checkbox['name'];?>" value="<?php echo $row[$checkbox['field']];?>" /><span class="lbl"></span></label></td>
					<?php } ?>
					<?php  foreach($columns as $col){?>
						<?php  $c = $obj->onAddCell($rowsk,$row,$col); if($c){ echo $c; }else{ $wrodwrap = 'style="word-break:break-all; "'; if($row[$col['name']] ==''){ echo '<td '.$wrodwrap.'>'.$default.'</td>'; }else{ echo '<td '.$wrodwrap.'>'.$row[$col['name']].'</td>'; } } } ?>
				
					
					<?php if(!empty($button)){ ?>
					<td>
				
						<div class="action-buttons">
							<?php  foreach($button as $btn){ $o = $obj->onAddOperation($rowsk,$row,$btn); if(!empty($o)){ echo $o; }else{ $btn_value = ''; foreach ($btn['field'] as $f) { $btn_value .= $row[$f] . '__'; } $btn_value = rtrim($btn_value, '__'); ?>
					
								

								
					<a class="<?php echo $btn['class'];?>" name="<?php echo $btn['name'];?>"  href="javascript:void(0);" title="<?php echo $btn['title'];?>" value='<?php echo $btn_value;?>' >
										<i class="icon-<?php echo $btn['icon'];?> bigger-130"></i>
									</a>
				
					
				<?php }}?>




					

						</div>
					</td>
		<?php } ?>
					
				</tr>
				<?php } ?>

			</tbody>
		</table>
	</div>
	<!-- /.table-responsive -->

</div>