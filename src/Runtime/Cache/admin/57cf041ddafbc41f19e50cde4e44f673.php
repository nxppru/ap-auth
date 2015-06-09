<?php if (!defined('THINK_PATH')) exit();?>
<?php if(is_array($name)): $i = 0; $__LIST__ = $name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo['class']); ?>" >
    <a href="<?php echo U($vo['url']);?>"  class="dropdown-toggle"><i class="<?php echo ($vo["ico"]); ?>"></i> 
        <span class="menu-text"><?php echo ($vo['name']); ?></span>
        <?php if($vo['sub']): ?><b class="arrow icon-angle-down"></b><?php endif; ?>
    </a>
    <?php if($vo['sub']): ?><ul class="submenu">
        <?php if(is_array($vo['sub'])): $i = 0; $__LIST__ = $vo['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="<?php echo ($v['class']); ?>"> 
            <a href="<?php echo U($v['url']);?>"> <i class="icon-double-angle-right"></i><?php echo ($v['name']); ?></a> 
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul><?php endif; ?>
</li><?php endforeach; endif; else: echo "" ;endif; ?>