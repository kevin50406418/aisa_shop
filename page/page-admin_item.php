<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<h2 class="ui dividing header">
	<i class="building icon"></i> <?php echo $store[0]['store_name'];?> 商品管理
</h2>
<div class="ui raised segment">
<form class="ui form">
	<table class="ui table">
		<thead>
			<tr>
				<th class="nine wide">商品名稱</th>
				<th class="two wide">商品售價</th>
				<th class="two wide">商品數量</th>
				<th class="three wide">商品分類</th>
			</tr>
		</thead>
		<tr>
			<td>
				<input type="text" name="item_name">
			</td>
			<td>
				<input type="text" name="item_price">
			</td>
			<td>
				<input type="text" name="item_num">
			</td>
			<td>
				<select name="item_type">
					<option value="">商品分類</option>
					<?php if(is_array($item_type)){?>
					<?php foreach ($item_type as $key => $type) {?>
					<option value="<?php echo $type['type_id']?>"><?php echo $type['type_name']?></option>
					<?php }?>
					<?php }?>
				</select>
			</td>
		</tr>
	</table>
	<button class="ui button blue">新增商品</button>
</form>
</div>
<?php if(is_array($items)){?>
<div class="ui raised segment">
<table class="ui table">
	<thead>
		<tr>
			<th class="one wide">#</th>
			<th>分類名稱</th>
		</tr>
	</thead>
	<?php foreach ($items as $key => $item) {?>
		<tr>
			<td><?php echo $item['item_id']?></td>
			<td>
				<a href="sysop.php?act=edititem&store_id=<?php echo $store['store_id']?>&item=<?php echo $item['item_id']?>"><i class="circular edit icon"></i></a>
				<?php echo $item['item_name']?>
			</td>
			<td><?php echo $item['item_price']?></td>
			<td><?php echo $item['item_num']?></td>
			<td><?php echo $item['item_type']?></td>
		</tr>
	<?php }?>
</table>
</div>
<?php }else{?>
<div class="ui message blue">
	目前無商品
</div>
<?php }?>