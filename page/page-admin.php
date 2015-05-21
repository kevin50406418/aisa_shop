<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<form action="admin.php" method="post">
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
