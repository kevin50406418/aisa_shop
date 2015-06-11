<?php
include("../config.inc.php");
if(is_login() && is_ajax()){?>
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
} ?>
<script>
$(function() {
	$("#mycart").submit();
});
</script>
<form id="mycart" action="cart.php" method="post">
	<input type="hidden" value="<?php echo $_POST['item_id']?>" name="item_id[]">
	<input type="hidden" value="1" name="item_num[]">
</form>
<?php }