<?php
include("../config.inc.php");
if(is_login() && is_ajax()){?>
<div class="ui header">We've auto-chosen a profile image for you.</div>
<?php
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
}
?>