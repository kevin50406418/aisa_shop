<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<?php setlocale(LC_MONETARY, 'zh_TW');?>
<?php 
	
	$user=$db->select("shop_member_info",array("user_login"=>$_SESSION['user_login']));
	if(is_array($order)){
		$order_detail=$db->select("shop_order_detail",array("order_id"=>$_GET['order_id']));
		
		?>
		<div class="ui ordered steps">
			<div class="step<?php if($order[0]['order_staus']>0){?> completed<?php }?>">
				<div class="content">
					<div class="title">收到訂單</div>
				</div>
			</div>
			<div class="step<?php if($order[0]['order_staus']>1){?> completed<?php }?><?php if($order[0]['order_staus']==1){?> active<?php }?><?php if($order[0]['order_staus']<1){?> disabled<?php }?>">
				<div class="content">
					<div class="title">付款中</div>
				</div>
			</div>
			<div class="step<?php if($order[0]['order_staus']>2){?> completed<?php }?><?php if($order[0]['order_staus']==2){?> active<?php }?><?php if($order[0]['order_staus']<2){?> disabled<?php }?>">
				<div class="content">
					<div class="title">出貨準備中</div>
				</div>
			</div>
			<div class="step<?php if($order[0]['order_staus']>3){?> completed<?php }?><?php if($order[0]['order_staus']==3){?> active<?php }?><?php if($order[0]['order_staus']<3){?> disabled<?php }?>">
				<div class="content">
					<div class="title">已出貨</div>
				</div>
			</div>
			<div class="step<?php if($order[0]['order_staus']>4){?> completed<?php }?><?php if($order[0]['order_staus']==4){?> active<?php }?><?php if($order[0]['order_staus']<4){?> disabled<?php }?>">
				<div class="content">
					<div class="title">送貨中</div>
				</div>
			</div>
			<div class="step<?php if($order[0]['order_staus']>5){?> completed<?php }?><?php if($order[0]['order_staus']==5){?> active<?php }?><?php if($order[0]['order_staus']<5){?> disabled<?php }?>">
				<div class="content">
					<div class="title">已送達</div>
				</div>
			</div>
		</div>
		<table class="ui celled table">
			<thead>
				<tr>
					<th class="one wide center aligned">商品照片</th>
					<th class="ten wide center aligned">商品名稱</th>
					<th class="three wide center aligned">商品單價</th>
					<th class="two wide center aligned">數量</th>
				</tr>
			</thead>
			<tbody>
		<?php $discount=0?>
		<?php foreach ($order_detail as $key => $item_id) {?>
			<?php $discount = $item_id['item_discount'] + $discount;?>
			<tr>
				<td>
					<?php if(file_exists(ABSPATH."img/".$item[$item_id['item_id']]["item_img"]) && !empty($item[$item_id['item_id']]["item_img"])){?>
		                <img src="img/<?php echo $item[$item_id['item_id']]["item_img"]?>" class="ui tiny image">
		            <?php }else{?>
		                <i class="bordered huge photo icon"></i>
		            <?php }?>
				</td>
				<td>
					<?php echo $item_id['item_name']?>
				</td>
				<td class="center aligned">
					<?php echo $item_id['item_price']?>
				</td>
				<td class="center aligned">
					<?php echo $item_id['item_num']?>
				</td>
			</tr>
		<?php }?>
				<tr class="full-width">
					<td colspan="2"></td>
					<td class="right aligned">訂單總價</td>
					<td class="right aligned">
						<?php echo money_format('%(#10.0n', $order[0]['order_price']) ?>
					</td>
				</tr>
				<tr class="full-width">
					<td colspan="2"></td>
					<td class="right aligned">優惠折抵</td>
					<td class="right aligned">
						<span class="ui header orange"><?php echo money_format('%(#10.0n', $discount*-1) ?></span>
					</td>
				</tr>
				<tr class="full-width">
					<td colspan="2"></td>
					<td class="right aligned">
						總計 <span style="color: #d95c5c">(免運費)</span>
					</td>
					<td class="right aligned">
						<span class="ui header green"><?php echo money_format('%(#10.0n', $order[0]['order_price']+$discount*-1) ?></span>
					</td>
				</tr>
			</tbody>
		</table>
	<?php }?>
	<div class="ui horizontal header divider">
		<i class="shipping icon"></i> 收貨信息
	</div>
	<?php if($order[0]['order_staus']==0){?>
	<form class="ui form" method="post">
		
		<div class="ui attached segment">
			<div class="field">
				<label>收貨人姓名</label>
				<input type="text" name="receive_name" value="<?php echo $user[0]['user_lastname']?> <?php echo $user[0]['user_firstname']?>">
			</div>
			<div class="field">
				<label>收件地址</label>
				<div id="twzipcode" class="three fields">
					<div data-role="zipcode" class="field" data-readonly="true" data-value="<?php echo $user[0]['user_postcode']?>"></div>
				    <div data-role="county" class="field"></div>
				    <div data-role="district" class="field"></div>
				</div>
				<input type="text" name="receive_address" value="<?php echo $user[0]['user_address_state']?><?php echo $user[0]['user_address_city']?><?php echo $user[0]['user_address_address']?>">
			</div>
			<div class="field">
				<label>聯絡電話</label>
				<input type="text" name="receive_phone" value="<?php echo $user[0]['user_cellphone']?>">
			</div>
			<div class="field">
				<label>電子郵件</label>
				<input type="text" name="receive_email" value="<?php echo $user[0]['user_email']?>">
			</div>
			<button type="submit" name="submit" class="ui button blue">送出</button>
		</div>
	</form>
	<?php }else{?>
	<table class="ui celled table">
		<tr>
			<td class="right aligned">收貨人姓名</td>
			<td><?php echo $receive[0]['receive_name']?></td>
		</tr>
		<tr>
			<td class="right aligned">收件地址</td>
			<td><?php echo $receive[0]['receive_postcode']?> <?php echo $receive[0]['receive_address']?></td>
		</tr>
		<tr>
			<td class="right aligned">聯絡電話</td>
			<td><?php echo $receive[0]['receive_phone']?> <?php echo $receive[0]['receive_address']?></td>
		</tr>
		<tr>
			<td class="right aligned">電子郵件</td>
			<td><?php echo $receive[0]['receive_email']?></td>
		</tr>
	</table>
	<?php }?>
	<?php if($order[0]['order_staus']>1){?>
	<table class="ui celled table">
		<tr>
			<td>繳費方式</td>
			<td><?php echo code_payment($order[0]['order_paytype'])?></td>
		</tr>
		<tr>
			<td>取貨方式</td>
			<td><?php echo code_shipping($order[0]['order_shippingtype'])?></td>
		</tr>
	</table>
	<?php }?>