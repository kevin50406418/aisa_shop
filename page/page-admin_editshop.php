<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>

<div class="ui raised segment">
<form class="ui form" action="sysop.php?act=editshop&store_id=<?php echo $store[0]['store_id'];?>" method="post">
	<h2 class="ui dividing header">商店管理</h2>
	<div class="field">
		<label>商店名稱</label>
		<input type="text" name="store_name" value="<?php echo $store[0]['store_name'];?>">
	</div>
	<button class="ui pink button">更新商店</button>
</form>
</div>