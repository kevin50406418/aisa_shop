<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<div class="ui raised segment">
<form class="ui form" action="sysop.php?act=store" method="post">
	<h2 class="ui dividing header">商店管理</h2>
	<div class="field">
		<label>商店名稱</label>
		<input type="text" name="store_name">
	</div>
	<button class="ui primary button">新增商店</button>
</form>
</div>

<?php if(is_array($shop_store)){?>
<table class="ui table">
	<thead>
		<th width="5%">#</th>
		<th width="50%">商店名稱</th>
		<th width="30%">操作</th>
	</thead>
	<?php foreach ($shop_store as $key => $store) {?>
	<tr>
		<td><?php echo $store['store_id']?></td>
		<td>
			<a href="sysop.php?act=editshop&store_id=<?php echo $store['store_id']?>"><i class="circular edit icon"></i></a>
			<?php echo $store['store_name']?>
		</td>
		<td>
			<a href="sysop.php?act=item&store_id=<?php echo $store['store_id']?>" class="ui button blue">商品管理</a>
			<a href="sysop.php?act=type&store_id=<?php echo $store['store_id']?>" class="ui button green">新增商品分類</a>
		</td>
	</tr>
	<?php }?>
</table>
<?php }?>