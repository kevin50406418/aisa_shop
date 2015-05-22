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
					include("page/page-admin_item.php");
				}
				
			break;
			case "type":
				$store=$db->Select("shop_store",array('store_id' => $_GET['store_id'] ));
				//print_r($store);
				if(is_array($store)){
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