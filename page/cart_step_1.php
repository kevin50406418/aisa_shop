<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<?php if(isset($_POST['item_id']) && isset($_POST['item_num'])){?>
<div class="ui segment rasied">
<h1 class="ui header">結帳</h1>
<table class="ui celled table">
	<thead>
		<tr>
			<th class="one wide center aligned">商品照片</th>
			<th class="ten wide center aligned">商品名稱</th>
			<th class="three wide center aligned">商品單價</th>
			<th class="two wide center aligned">數量</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($_POST['item_id'] as $key => $item_id ){?>
			<tr>
			<td>
				<?php if(file_exists(ABSPATH."img/".$item[$item_id]["item_img"]) && !empty($item[$item_id]["item_img"])){?>
	                <img src="img/<?php echo $item[$item_id]["item_img"]?>" class="ui tiny image">
	            <?php }else{?>
	                <i class="bordered huge photo icon"></i>
	            <?php }?>
			</td>
			<td>
				<?php echo $item[$item_id]["item_name"]?>
			</td>
			<td class="center aligned">
				<?php echo money_format('%(#10.0n', $item[$item_id]["item_price"]) ?>
			</td>
			<td class="center aligned">
				<input type="hidden" value="<?php echo $item_id?>" name="item_id[]">
				<div class="ui input"><input type="number" value="<?php echo $_POST['item_num'][$key]?>" name="item_num[]" min="0" max="<?php echo $item[$item_id]["item_num"]?>"></div>
			</td>
		</tr>
		<?php }?>
	</tbody>
</table>
<button class="ui button blue">結帳</button>
</div>
<?php }?>