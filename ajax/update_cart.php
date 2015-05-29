<?php
include("../config.inc.php");
if(is_ajax()){
	if( isset($_POST['item_id']) && isset($_POST['item_num']) ){
		foreach ($_POST['item_id'] as $key => $item_id) {
			if(isset($_POST['item_num'][$key])){
				if($_POST['item_num'][$key] == 0 ){ // 當購物數量為0時清除
					unset($_SESSION['store'][$item_id]);
				}else{
					$_SESSION['store'][$item_id]=$_POST['item_num'][$key];
				}
			}
		}
		echo '<div class="ui message green">購物車更新成功</div>';	
	}
	
}?>