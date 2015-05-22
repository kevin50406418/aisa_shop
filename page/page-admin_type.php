<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<h2 class="ui dividing header"><i class="building icon"></i> <?php echo $store[0]['store_name'];?> 商品分類管理</h2>
<div class="ui raised segment">
<form class="ui form">
	<div class="field">
		<label>商品分類名稱</label>
		<input type="text" name="type_name">
	</div>
	<button class="ui button blue">新增商品分類</button>
</form>
</div>