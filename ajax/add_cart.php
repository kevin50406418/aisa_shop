<?php
include("../config.inc.php");
if(is_login() && is_ajax()){
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
<div class="ui message green">成功加入購物車</div>
<?php if(!isset($_SESSION['store'])){
	$_SESSION['store'] = array();
	if(!isset($_SESSION['store'][$_POST['item_id']])){
		$_SESSION['store'][$_POST['item_id']]=0;
		$_SESSION['store'][$_POST['item_id']]++;
	}else{
		$_SESSION['store'][$_POST['item_id']]++;
	}
}else{
	if(!isset($_SESSION['store'][$_POST['item_id']])){
		$_SESSION['store'][$_POST['item_id']]=0;
		$_SESSION['store'][$_POST['item_id']]++;
	}else{
		$_SESSION['store'][$_POST['item_id']]++;
	}
}
?>
<?php }?>