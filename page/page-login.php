<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<?php if(is_login()){?>
<div class="ui positive message">
	<div class="header">
		你已登入
	</div>
	<meta http-equiv="refresh" content="3; url=/shop">
</div>
<?php }else{?>
	<?php
		if( isset($_POST['user_login']) && isset($_POST['user_pwd']) ){
			$user_login = htmlspecialchars($_POST['user_login'],ENT_QUOTES);
			$user_pwd   = htmlspecialchars($_POST['user_pwd'],ENT_QUOTES);
			$shop_member=$db->select("shop_member",array("user_login" =>$user_login,"user_passwd"=>md5($user_pwd)));
	?>
		<?php if(is_array($shop_member)){?>
			<?php
				$_SESSION['user_login'] = $user_login;
				$_SESSION['sysop']      = $shop_member[0]['user_sysop'];
			?>
			<div class="ui positive message">
				<div class="header">
					登入成功
					<meta http-equiv="refresh" content="3; url=/shop">
				</div>
			</div>
		<?php }else{?>
			<div class="ui negative message">
				<div class="header">
					登入失敗：帳密有誤
				</div>
			</div>
		<?php }?>
	<?php }?>
<form action="login.php" method="post">
<div class="ui form segment">
	<div class="field">
		<label>帳號</label>
		<input type="text" name="user_login">
	</div>
	<div class="field">
		<label>密碼</label>
		<input type="password" name="user_pwd">
	</div>
	<button class="ui submit button">登入</button>
</div>
</form>
<?php }?>