<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<div class="ui horizontal header divider">
	<i class="payment icon"></i> 繳費訊息
</div>
<script type="text/javascript">
$(function() {
	$('.ui.radio.checkbox').checkbox();
});
</script>
<form class="ui form" action="order.php?order_id=<?php echo $_GET['order_id']?>" method="post">
	<h4 class="ui top attached header">繳費方式</h4>
	<div class="ui bottom attached segment">
		<div class="inline fields">
			<div class="field">
				<div class="ui radio checkbox checked">
					<input type="radio" name="payment" value="1" checked>
					<label>超商繳費：7-11繳費</label>
				</div>
			</div>
			<div class="field">
				<div class="ui radio checkbox">
					<input type="radio" name="payment" value="2">
					<label>超商繳費：全家繳費</label>
				</div>
			</div>
			<div class="field">
				<div class="ui radio checkbox">
					<input type="radio" name="payment" value="3">
					<label>ATM</label>
				</div>
			</div>
			<div class="field">
				<div class="ui radio checkbox">
					<input type="radio" name="payment" value="4">
					<label>信用卡</label>
				</div>
			</div>
		</div>
	</div>
	
	<h4 class="ui top attached header">取貨方式</h4>
	<div class="ui bottom attached segment">
		<div class="inline fields">
			<div class="field">
				<div class="ui radio checkbox checked">
					<input type="radio" name="shipping" value="1" checked>
					<label>宅配</label>
				</div>
			</div>
			<div class="field">
				<div class="ui radio checkbox">
					<input type="radio" name="shipping" value="2">
					<label>超商取貨：7-11</label>
				</div>
			</div>
			<div class="field">
				<div class="ui radio checkbox">
					<input type="radio" name="shipping" value="3">
					<label>超商取貨：全家</label>
				</div>
			</div>
		</div>
	</div>
	<button type="submit" name="submit" class="ui button blue">付款</button>
</form>