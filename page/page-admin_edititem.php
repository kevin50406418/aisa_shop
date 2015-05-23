<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>

<div class="ui raised segment">
<form class="ui form" method="post" action="sysop.php?act=edititem&store_id=<?php echo $item[0]['store_id'];?>&item_id=<?php echo $item[0]['item_id'];?>">
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
				<input type="text" name="item_name" value="<?php echo $item[0]["item_name"];?>">
			</td>
			<td>
				<input type="text" name="item_price" value="<?php echo $item[0]["item_price"];?>">
			</td>
			<td>
				<input type="text" name="item_num" value="<?php echo $item[0]["item_num"];?>">
			</td>
			<td>
				<select name="item_type">
					<option value="">商品分類</option>
					<?php if(is_array($item_type)){?>
					<?php foreach ($item_type as $key => $type) {?>
					<option value="<?php echo $type['type_id']?>"<?php if($type['type_id']==$item[0]['item_type']){?> selected<?php }?>><?php echo $type['type_name']?></option>
					<?php }?>
					<?php }?>
				</select>
			</td>
		</tr>
	</table>
	<button class="ui button blue">新增商品</button>
</form>
</div>
<?php
	echo ABSPATH."img/".$item[0]['store_id']."-".$item[0]['item_id'];
		/*if(file_exists()){

		}*/
	?><!--<div class="ui vertical divider"></div>-->
<div class="ui raised segment">
<h2>商品照片</h2>
<div>
	<form class="ui form" enctype="multipart/form-data" method="post" action="sysop.php?act=edititem&store_id=<?php echo $item[0]['store_id'];?>&item_id=<?php echo $item[0]['item_id'];?>">
		<input name="file" type="file" required="required" id="file" accept="image/*">
	</form>
</div>
</div>