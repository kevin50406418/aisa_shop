<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title><?php echo get_title($page_id);?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo asset_url?>semantic.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo asset_url?>style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="<?php echo asset_url?>semantic.min.js"></script>
	<script>
	$(function() {
		$('.dropdown').dropdown();
		$("#check_cart").click(function() {
	        $('#usercart').modal('show');
	        $.ajax({
	            type: "POST",
	            url: "ajax/cart.php",
	            success: function(e) {
	                $("#usercart_result").html(e)
	            },
	            error: function(e) {
	                $("#usercart_result").addClass("ui message red").text("發生錯誤")
	            }
	        });
	        return false
	    });
	});
	</script>
	<?php switch($page_id){ 
		case "order":
		case "reg":?>
			<script src="<?php echo asset_url?>jquery.twzipcode.js"></script>
			<script src="<?php echo asset_url?>reg.js"></script>
		<?php break;?>
	<?php }?>
</head>
<body>
<header id="top">
    <h1><a href="<?php echo site_url?>"><?php echo $site_name?></a></h1>
    <div class="ui inverted large menu">
		<a class="item" href="<?php echo site_url?>">首頁</a>
		<div class="right menu">
			<a class="item" href="#" id="check_cart">購物車</a>
    		<?php if(is_login()){?>
    		<?php if(is_sysop()){?><a class="item" href="sysop.php">管理中心</a><?php }?>
			<div class="ui dropdown item">
				<i class="user icon"></i> <?php echo $_SESSION['user_login']?> <i class="caret down icon"></i>
				<div class="menu">
					<a class="item">會員中心</a>
					<a href="order.php" class="item">訂單查詢</a>
					<a class="item" href="logout.php">登出</a>
				</div>
			</div>
			<?php }else{?>
			<div class="item">
				<a class="ui primary button" href="reg.php">註冊</a>
    			<a class="ui button" href="login.php">登入</a>
    		</div>
    		<?php }?>
		</div>
	</div>
</header>	
<div id="maincolumn">