<?php
include("config.inc.php");
$page_id="item";
include("inc/header.inc.php");
$item=$db->ExecuteSQL("select * from shop_item join shop_item_type on shop_item.item_type = shop_item_type.type_id where shop_item.store_id=".$_GET['store_id']." and shop_item.item_id=".$_GET['item_id']." ");

$rand_item=$db->ExecuteSQL("select * from shop_item join shop_item_type on shop_item.item_type = shop_item_type.type_id where shop_item.store_id=".$_GET['store_id']." ORDER BY RAND() LIMIT 4 ");

include("page/page-item.php");
include("inc/sidebar.inc.php");
include("inc/footer.inc.php");
?>