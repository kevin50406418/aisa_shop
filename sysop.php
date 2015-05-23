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
							alert("d","新增失敗");
						}
					}
					$item_type=$db->Select("shop_item_type",array('store_id' => $_GET['store_id'] ));
					$items=$db->ExecuteSQL("select * from shop_item join shop_item_type on shop_item.item_type = shop_item_type.type_id where shop_item.store_id=".$_GET['store_id']." ");

					include("page/page-admin_item.php");
				}
				
			break;
			case "edititem":
				$item_type=$db->Select("shop_item_type",array('store_id' => $_GET['store_id'] ));
				$item=$db->ExecuteSQL("select * from shop_item join shop_item_type on shop_item.item_type = shop_item_type.type_id where shop_item.store_id=".$_GET['store_id']." and shop_item.item_id=".$_GET['item_id']." ");

				if(is_array($item)){
					if( isset($_POST['item_name']) && isset($_POST['item_price']) && isset($_POST['item_num']) && isset($_POST['item_type'])){
						$update_item=array(
							'item_name'  => $_POST['item_name'],
							'item_price' => $_POST['item_price'],
							'item_num'   => $_POST['item_num'],
							'item_type'  => $_POST['item_type'],
							'store_id'   => $_GET['store_id']
						);
						if( $db->update("shop_item",$update_item,array('store_id'=>$_GET['store_id'],'item_id'=>$_GET['item_id'])) ){
							alert("s","更新成功");
						}else{
							alert("d","更新失敗");
						}
					}
					if(count($_FILES)>0) {
						$file_name = $_FILES['file']['name']; //取得檔名
						$fn_array=explode(".",$file_name);//分割檔名
						$mainName = $fn_array[0];//檔名
						$subName = $fn_array[1];//副檔名

						$is_img = array('png','jpg','gif');
						if(in_array($subName,$is_img)){
							$upFilePath = ABSPATH.'img/'.$_GET['store_id']."-".$_GET['item_id'].".".$subName;
							$temploadfile = $_FILES['file']['tmp_name'];
							if(file_exists($upFilePath)){
								unlink($upFilePath);
							}
							if(move_uploaded_file($temploadfile , $upFilePath)){
								if( $db->Update("shop_item",array('item_img' => $_GET['store_id']."-".$_GET['item_id'].".".$subName, ),array('store_id'=>$_GET['store_id'],'item_id'=>$_GET['item_id'])) ){
									alert("s","上傳成功");
								}else{
									alert("d","上傳失敗");
								}
							}else{
								alert("d","上傳失敗");
							}						
						}else{
							alert("d","上傳的檔案不是圖片檔");
						}
					}
					include("page/page-admin_edititem.php");
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
							alert("d","新增失敗");
						}
					}
					$item_type=$db->Select("shop_item_type",array('store_id' => $_GET['store_id'] ));
					include("page/page-admin_type.php");
				}
				
			break;
			case "edittype":
				$type=$db->ExecuteSQL("select * from shop_store as store join shop_item_type as type on store.store_id=type.store_id where store.store_id = ".$_GET['store_id']." and type.type_id=".$_GET['type_id']." ");
				if(is_array($type)){
					if(isset($_POST['type_name'])){
						if( $db->Update("shop_item_type",array('type_name'=>$_POST['type_name']),array('store_id' => $_GET['store_id'],'type_id'=>$_GET['type_id'])) ){
							alert("s","更新成功");
						}else{
							alert("d","更新失敗");
						}
					}
					include("page/page-admin_edittype.php");
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
						alert("d","新增失敗");
					}
				}
				$shop_store=$db->Select("shop_store");
				include("page/page-admin_store.php");
			break;
			case "editshop":
				$store=$db->Select("shop_store",array("store_id"=>$_GET['store_id']));
				if(is_array($store)){
					if(isset($_POST['store_name'])){
						if( $db->Update("shop_store",array('store_name'=>$_POST['store_name']),array('store_id'=>$_GET['store_id'])) ){
							alert("s","更新成功");
						}else{
							alert("d","更新失敗");
						}
					}
					include("page/page-admin_editshop.php");
				}
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