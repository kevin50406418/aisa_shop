<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<?php if(is_login()){?>
<div class="ui positive message">
	<div class="header">
		你已登入
	</div>
</div>
<?php }else{?>
<?php
	if( isset($_POST['user_login']) && isset($_POST['user_pwd']) &&  isset($_POST['user_pwd2']) ){
		adduser($_POST);
	}
?>
<form action="reg.php" method="post">
<div class="ui form segment">
	<div class="ui error message"></div>
	<div class="field">
		<label>帳號</label>
		<input type="text" name="user_login">
	</div>
	<div class="field">
		<label>密碼</label>
		<input type="password" name="user_pwd">
	</div>
	<div class="field">
		<label>確認密碼</label>
		<input type="password" name="user_pwd2">
	</div>
	<div class="field">
		<label>姓</label>
		<input type="text" name="user_lastname">
	</div>
	<div class="field">
		<label>名</label>
		<input type="text" name="user_firstname">
	</div>
	<div class="field">
		<label>電子郵件</label>
		<input type="email" name="user_email">
	</div>
	<div class="field">
		<label>性別</label>
		<input type="radio" name="user_sex" value="1" checked> 男
		<input type="radio" name="user_sex" value="0"> 女
	</div>
	<div class="field">
		<label>手機</label>
		<input type="text" name="user_cellphone">
	</div>
	<div class="field">
		<label>地址</label>
		<div id="twzipcode" class="three fields">
			<div data-role="zipcode" class="field" data-readonly="true"></div>
		    <div data-role="county" class="field"></div>
		    <div data-role="district" class="field"></div>
		</div>
		<input type="text" name="user_address">
	</div>
	<button class="ui submit button" type="submit">註冊</button>
</div>
</form>
<?php }?>