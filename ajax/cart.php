<?php
include("../config.inc.php");
if(is_ajax()){
	setlocale(LC_MONETARY, 'zh_TW');
	$all_item=$db->Select("shop_item");
	$item=array();
	foreach ($all_item as $key => $items) {
		$item[$items['item_id']]=array();
		$item[$items['item_id']]=$items;
	}
	
?>
<script>
$(function() {
	$("#update_cart").click(function() {
        $.ajax({
            type: "POST",
            url: "ajax/update_cart.php",
            data: $("#mycart").serialize(),
            success: function(e) {
                $("#dcart_result").html(e)
            },
            error: function(e) {
                $("#dcart_result").addClass("ui message red").text("發生錯誤")
            }
        });
        return false
    });
});
</script>
<div id="dcart_result"></div>
<form class="ui form" action="cart.php" method="post" id="mycart">
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
<?php if(isset($_SESSION['store'])){?>

<?php foreach ($_SESSION['store'] as $item_id => $num) {?>
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
		<td>
			<input type="hidden" value="<?php echo $item_id?>" name="item_id[]">
			<div class="ui input"><input type="number" value="<?php echo $num?>" name="item_num[]" min="0" max="<?php echo $item[$item_id]["item_num"]?>"></div>
		</td>
	</tr>
	<?php }?>
<?php }?>
	</tbody>
</table>
<button class="ui button blue" type="submit">前往結帳</button>
<button class="ui button pink" id="update_cart" type="submit">更新購物車</button>
</form>

<?php }