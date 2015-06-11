<?php
include("config.inc.php");
$page_id="order";
include("inc/header.inc.php");
$all_item=$db->Select("shop_item");
$item=array();
foreach ($all_item as $key => $items) {
	$item[$items['item_id']]=array();
	$item[$items['item_id']]=$items;
}
if (isset($_GET['order_id'])){
	$order=$db->select("shop_order",array("order_id"=>$_GET['order_id'],"user_login"=>$_SESSION['user_login']));
	if(is_array($order)){

		if($order[0]['order_staus']==0){
			if(isset($_POST['submit'])){
				$receive=array(
					"order_id"=>$_GET['order_id'],
					"receive_name"=>$_POST['receive_name'],
					"receive_address"=>$_POST['receive_address'],
					"receive_postcode"=>$_POST['zipcode'],
					"receive_phone"=>$_POST['receive_phone'],
					"receive_email"=>$_POST['receive_email']
				);
				$db->update("shop_order",array("order_staus"=>1),array("order_id"=>$_GET['order_id']));
				$db->insert($receive,"shop_order_receive");
				echo '<meta http-equiv="refresh" content="2">';
			}
		}else{
			$receive=$db->select("shop_order_receive",array("order_id"=>$_GET['order_id'],));
		}

		include("page/page-order.php");
		if($order[0]['order_staus']==1){
			if(isset($_POST['payment']) && isset($_POST['shipping'])){
				$payment = htmlspecialchars($_POST['payment'],ENT_QUOTES);
				$shipping = htmlspecialchars($_POST['shipping'],ENT_QUOTES);
				$update_order = array(
					"order_staus"=>2,
					"order_paytype"=>intval($payment),
					"order_shippingtype"=>intval($shipping),
					"order_paytime"=>time()
				);
				$db->update("shop_order",$update_order,array("order_id"=>$_GET['order_id']));
				$detail=$db->Select("shop_order_detail",array("order_id"=>$_GET['order_id']));
				foreach ($detail as $key => $value) {
					$db->ExecuteSQL("update shop_item SET item_num = item_num-".$value['item_num']." WHERE item_id = '".$value['item_id']."' ");
					//echo "update shop_item SET item_num = item_num-".$value['item_num']." WHERE item_id = '".$_GET['order_id']."' ";
				}
				echo '<meta http-equiv="refresh" content="2">';
			}
			include("page/page-pay.php");
		}elseif($order[0]['order_staus']==2){ // 以下為模擬配送
			if(time() > $order[0]['order_paytime']+300){
				$db->update("shop_order",array("order_staus"=>3),array("order_id"=>$_GET['order_id']));
			}
		}elseif($order[0]['order_staus']==3){
			if(time() > $order[0]['order_paytime']+600){
				$db->update("shop_order",array("order_staus"=>4,"order_shipping"=>$order[0]['order_paytime']+600),array("order_id"=>$_GET['order_id']));
			}
		}elseif($order[0]['order_staus']==4){
			if(time() > $order[0]['order_paytime']+1200){
				$db->update("shop_order",array("order_staus"=>5),array("order_id"=>$_GET['order_id']));
			}
		}elseif($order[0]['order_staus']==5){
			if(time() > $order[0]['order_paytime']+2400){
				$db->update("shop_order",array("order_staus"=>6),array("order_id"=>$_GET['order_id']));
			}
		}
		
	}
}else{
	$orders=$db->select("shop_order",array("user_login"=>$_SESSION['user_login']));
	
	include("page/page-orderlist.php");
}
include("inc/sidebar.inc.php");
include("inc/footer.inc.php");
?>