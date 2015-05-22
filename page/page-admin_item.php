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
				<select>
					<option value="">Gender</option>
					<option value="1">Male</option>
					<option value="0">Female</option>
				</select>
			</td>
		</tr>
	</table>
</form>
</div>