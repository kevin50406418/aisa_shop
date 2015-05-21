<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<form class="ui form" action="sysop.php?act=store" method="post">
	<h2 class="ui dividing header">商店管理</h2>
	<div class="field">
		<label>商店名稱</label>
		<input type="text" name="store_name">
	</div>
	<button class="ui primary button">新增商店</button>
</form>

<?php if(is_array($shop_store)){?>
<table class="ui table">
	<thead>
		<th>#</th>
		<th>商店名稱</th>
		<th>操作</th>
	</thead>
	<?php foreach ($shop_store as $key => $store) {?>
	<tr>
		<td><?php echo $store['store_id']?></td>
		<td><?php echo $store['store_name']?></td>
		<td>
			<a href="#" class="ui button blue">編輯</a>
		</td>
	</tr>
	<?php }?>
</table>
<?php }?>