<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>

<div class="ui raised segment">
<form class="ui form" method="post" action="sysop.php?act=edittype&store_id=<?php echo $type[0]['store_id'];?>&type_id=<?php echo $type[0]['type_id'];?>">
	<div class="field">
		<label>商品分類名稱</label>
		<input type="text" name="type_name" value="<?php echo $type[0]['type_name'];?>">
	</div>
	<button class="ui button pink">更新商品分類</button>
</form>
</div>