<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<h2 class="ui dividing header"><i class="building icon"></i> <?php echo $store[0]['store_name'];?> 商品分類管理</h2>
<div class="ui raised segment">
<form class="ui form" method="post" action="sysop.php?act=type&store_id=<?php echo $store[0]['store_id'];?>">
	<div class="field">
		<label>商品分類名稱</label>
		<input type="text" name="type_name">
	</div>
	<button class="ui button blue">新增商品分類</button>
</form>
</div>
<?php if(is_array($item_type)){?>
<table class="ui table">
	<thead>
		<tr>
			<th class="one wide">#</th>
			<th>分類名稱</th>
		</tr>
	</thead>
	<?php foreach ($item_type as $key => $type) {?>
		<tr>
			<td><?php echo $type['type_id']?></td>
			<td>
				<a href="sysop.php?act=edittype&store_id=<?php echo $store['store_id']?>"><i class="circular edit icon"></i></a>
				<?php echo $type['type_name']?>
			</td>
		</tr>
	<?php }?>
</table>
<?php }?>