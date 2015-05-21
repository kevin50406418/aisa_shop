<?php
include("config.inc.php");
$page_id="sysop";
include("inc/header.inc.php");
if(is_login()){
	if(isset($_GET['act'])){
		include("page/page-sysop.php");
		switch($_GET['act']){
			case "item":
				include("page/page-admin_item.php");
			break;
			case "type":
				include("page/page-admin_type.php");
			break;
			case "store":
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