<?php
	$admin_store = array('item','store','type','edititem','edittype','editshop');
?>
<div class="ui inverted segment">
	<a href="sysop.php?act=store" class="ui button inverted orange<?php if( in_array($_GET['act'],$admin_store)){?> active<?php }?>">商店管理</a>
	<a href="sysop.php?act=order" class="ui button inverted teal<?php if($_GET['act']=="order"){?> active<?php }?>">訂單管理</a>
	<a href="sysop.php?act=member" class="ui button inverted purple<?php if($_GET['act']=="member"){?> active<?php }?>">會員管理</a>
</div>