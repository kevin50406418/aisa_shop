<?php
include("config.inc.php");
$page_id="index";
include("inc/header.inc.php");
$items=$db->ExecuteSQL("select * from shop_store join shop_item on shop_store.store_id=shop_item.store_id join shop_item_type on shop_item.item_type=shop_item_type.type_id order by rand()");
include("page/page-index.php");
include("inc/sidebar.inc.php");
include("inc/footer.inc.php");
?>