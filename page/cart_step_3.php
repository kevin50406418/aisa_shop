<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<?php
$oreder = array(
	"user_login"=>$_SESSION['user_login'],
	"order_time"=>time(),
	"order_staus"=>0
);
$db->insert($oreder,"shop_order");
$order_id=$db->LastInsertID();
$total=0;
foreach ($_POST['item_id'] as $key => $item_id) {
	$order_detail=array(
		"order_id"=>$order_id,
		"item_id"=>$item_id,
		"item_name"=>$item[$item_id]["item_name"],
		"item_price"=>$item[$item_id]["item_price"],
		"item_num"=>$_POST['item_num'][$key],
		"item_discount"=>0
	);
	$total=$total+$item[$item_id]["item_price"]*$_POST['item_num'][$key];
	$db->insert($order_detail,"shop_order_detail");
}
$db->update("shop_order",array("order_price"=>$total),array("order_id"=>$order_id));
unset($_SESSION['store']);
header("HTTP/1.1 301 Moved Permanently"); 
header("Location: order.php?order_id=".$order_id."");

?>