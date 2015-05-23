<?php
include("config.inc.php");
$page_id="sysop";
include("inc/header.inc.php");
if(is_login()){
	if(isset($_GET['act'])){
		include("page/page-sysop.php");
		switch($_GET['act']){
			case "item":
				$store=$db->Select("shop_store",array('store_id' => $_GET['store_id'] ));
				//print_r($store);
				if(is_array($store)){
					if( isset($_POST['item_name']) && isset($_POST['item_price']) && isset($_POST['item_num']) && isset($_POST['item_type'])){
						$item=array(
							'item_name'  => $_POST['item_name'],
							'item_price' => $_POST['item_price'],
							'item_num'   => $_POST['item_num'],
							'item_type'  => $_POST['item_type'],
							'store_id'   => $_GET['store_id']
						);
						if( $db->insert($item,"shop_item") ){
							alert("s","新增成功");
						}else{
							alert("s","新增失敗");
						}
					}
					$item_type=$db->Select("shop_item_type",array('store_id' => $_GET['store_id'] ));
					$items=$db->ExecuteSQL("select * from shop_item join shop_item_type on shop_item.item_type = shop_item_type.item_type where store_id=".$_GET['store_id']." ");
					include("page/page-admin_item.php");
				}
				
			break;
			case "type":
				$store=$db->Select("shop_store",array('store_id' => $_GET['store_id'] ));
				//print_r($store);
				if(is_array($store)){
					if(isset($_POST['type_name'])){
						if( $db->insert(array("type_name"=>$_POST['type_name'],'store_id' => $_GET['store_id']),"shop_item_type") ){
							alert("s","新增成功");
						}else{
							alert("s","新增失敗");
						}
					}
					$item_type=$db->Select("shop_item_type",array('store_id' => $_GET['store_id'] ));
					include("page/page-admin_type.php");
				}
				
			break;
			case "store":
				if(isset($_POST['store_name'])){
					if(
						$db->insert(array("store_name"=>$_POST['store_name']),"shop_store") && 
						$db->insert(array("store_id"=>$db->LastInsertID(),"user_login"=>$_SESSION['user_login']),"shop_store_admin")
					){
						alert("s","新增成功");
					}else{
						alert("s","新增失敗");
					}
				}
				$shop_store=$db->Select("shop_store");
				include("page/page-admin_store.php");
			break;
			case "order":
				
			break;
			case "member":
				
			break;
		}
	}else{
		include("page/page-sysop.php");
	}
}else{

}

include("inc/sidebar.inc.php");
include("inc/footer.inc.php");
?>