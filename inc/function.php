<?php
if(!defined('IN_CCS')) {exit('Access Denied');}

function get_title($page_id){
	global $site_name;
	$title="";
	switch($page_id){
		case "index":
			$title="首頁";
		break;
		case "admin":
			$title="管理";
		break;
		case "member":
			$title="會員中心";
		break;
		case "order":
			$title="'訂單資訊'";
		break;
		case "sysop":
			$title="管理中心";
		break;
		case "login":
			$title="登入";
		break;
		case "reg":
			$title="註冊";
		break;
		case "logout":
			$title="登出";
		break;
	}
	return $title." - ".$site_name;
}
function is_login(){
	return isset($_SESSION['sysop']) && isset($_SESSION['user_login']);
}
function is_sysop(){
	return isset($_SESSION['sysop']) && isset($_SESSION['user_login']) && $_SESSION['sysop']==1;
}
function filterhtml($string){
	return htmlspecialchars($string,ENT_QUOTES);
}
function adduser($user){
	global $db;
	/*echo "<pre>";
	print_r($user);
	echo "</pre>";*/
	if( !isset($user['user_login']) || !isset($user['user_pwd']) || !isset($user['user_pwd2']) 
		|| !isset($user['user_lastname']) || !isset($user['user_firstname']) || !isset($user['user_email'])
		|| !isset($user['user_sex']) || !isset($user['user_cellphone']) || !isset($user['zipcode'])
		|| !isset($user['county']) || !isset($user['district']) || !isset($user['user_address'])){
		return false;
	}
	if($user['user_pwd'] != $user['user_pwd2']){
		return false;
	}
	$data=array(
		"user_login"  =>$user['user_login'],
		"user_passwd" =>md5($user['user_pwd']),
		"user_sysop"  =>0
	);
	$data_info=array(
		"user_login"           =>$user['user_login'],
		"user_lastname"        =>$user['user_lastname'],
		"user_firstname"       =>$user['user_firstname'],
		"user_email"           =>$user['user_email'],
		"user_regtime"         =>time(),
		"user_sex"             =>$user['user_sex'],
		"user_cellphone"       =>$user['user_cellphone'],
		"user_address_state"   =>$user['county'],
		"user_address_city"    =>$user['district'],
		"user_address_address" =>$user['user_address']
	);
	/*echo "<pre>";
	print_r($data);
	echo "</pre>";
	echo "<pre>";
	print_r($data_info);
	echo "</pre>";*/
	if( $db->Insert($data,"shop_member") && $db->Insert($data_info,"shop_member_info")){
		return true;
	}
}
function alert($type,$text,$url="S",$time=2){
	$class="";
	switch($type){
		case 's':
			$class="positive";
		break;
		case 'd':
			$class="negative";
		break;
		case 'w':
			$class="warning";
		break;
		case 'bk':
			$class="black";
		break;
		case 'y':
			$class="yellow";
		break;
		case 'g':
			$class="green";
		break;
		case 'b':
			$class="blue";
		break;
		case 'o':
			$class="orange";
		break;
		case 'pp':
			$class="purple";
		break;
		case 'pk':
			$class="pink";
		break;
		case 't':
			$class="teal";
		break;
		case 'r':
			$class="red";
		break;
		default:
			$class="info";
		break;
	}
	echo '<div class="ui message '.$class.'">';
	echo $text;
	echo "</div>";
	if($time>0){
		if($url!="S"){
			echo '<meta http-equiv="refresh" content="'.$time.'; url='.$url.'" />';
		}else{
			echo '<meta http-equiv="refresh" content="'.$time.'" />';
		}
	}
}
?>