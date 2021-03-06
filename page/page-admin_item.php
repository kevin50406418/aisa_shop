<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<h2 class="ui dividing header">
	<i class="building icon"></i> <?php echo $store[0]['store_name'];?> 商品管理
</h2>
<div class="ui raised segment">
<form class="ui form" method="post" action="sysop.php?act=item&store_id=<?php echo $store[0]['store_id'];?>">
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
			<th class="eight wide">商品名稱</th>
			<th class="two wide">商品售價</th>
			<th class="two wide">商品數量</th>
			<th class="three wide">商品分類</th>
			<th class="one wide"></th>
		</tr>
	</thead>
	<?php foreach ($items as $key => $item) {?>
		<tr>
			<td><?php echo $item['item_id']?></td>
			<td>
				<?php if(file_exists(ABSPATH."img/".$item["item_img"]) && !empty($item["item_img"])){?>
					<img class="ui tiny middle aligned bordered image" src="img/<?php echo $item["item_img"]?>">
				<?php }else{?>
					<i class="bordered big photo icon"></i>
				<?php }?>
				<?php echo $item['item_name']?>
				<?php if($item['item_num']==0){?>
				<div class="ui red horizontal label">缺貨中</div>
				<?php }else if($item['item_num']<5){?>
				<div class="ui green horizontal label">庫存過低</div>
				<?php }?>
			</td>
			<td><?php echo $item['item_price']?></td>
			<td><?php echo $item['item_num']?></td>
			<td><?php echo $item['type_name']?></td>
			<td>
				<a href="sysop.php?act=edititem&store_id=<?php echo $store[0]['store_id']?>&item_id=<?php echo $item['item_id']?>"><i class="circular edit icon"></i></a>
			</td>
		</tr>
	<?php }?>
</table>
</div>
<?php }else{?>
<div class="ui message blue">
	目前無商品
</div>
<?php }?>