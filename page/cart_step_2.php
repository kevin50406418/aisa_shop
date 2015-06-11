<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
	<?php if(isset($_POST['item_id']) && isset($_POST['item_num'])){
		if(is_login()){?>
	<?php $total=0;?>
	<div class="ui segment rasied">
	<h1 class="ui header">結帳</h1>
	<form method="post" action="cart.php?step=3">
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
			<?php $total=$total+$item[$item_id]["item_price"]*$_POST['item_num'][$key];?>
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
					<input type="hidden" value="<?php echo $_POST['item_num'][$key]?>" name="item_num[]" min="0" max="<?php echo $item[$item_id]["item_num"]?>">
					<?php echo $_POST['item_num'][$key]?>
				</td>
			</tr>
			<?php }?>
		</tbody>
		<tfoot class="full-width">
			<th colspan="4" style="text-align: right">
				<?php echo money_format('%(#10.0n', $total) ?>
			</th>
		</tfoot>
	</table>
	<button class="ui button blue" type="submit" name="submit">結帳</button>
	</form>
	</div>
	<?php }?>

<?php }else{?>
請先 <a href="login.php">登入</a>
<?php }?>