<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<?php setlocale(LC_MONETARY, 'zh_TW');?>
<?php
$all_item=$db->Select("shop_item");
$item=array();
foreach ($all_item as $key => $items) {
	$item[$items['item_id']]=array();
	$item[$items['item_id']]=$items;
}
$step=isset($_GET['step'])?$_GET['step']:1;?>
<div class="ui three steps">
	<div class="active step">
		<i class="payment icon"></i>
		<div class="content">
			<div class="title">Billing</div>
			<div class="description">Enter billing information</div>
		</div>
	</div>
	<div class="step">
		<i class="truck icon"></i>
		<div class="content">
			<div class="title">Shipping</div>
			<div class="description">Choose your shipping options</div>
		</div>
	</div>
	
	<div class="disabled step">
		<i class="info icon"></i>
		<div class="content">
			<div class="title">Confirm Order</div>
		</div>
	</div>
</div>
<?php 
switch($step){
	default:
	case 1:
		include "cart_step_1.php";
		break; // step =1/default
	case 2:
		include "cart_step_2.php";
		break; // step =1/default
	case 3:
		include "cart_step_3.php";
		break; // step =1/default

}?>