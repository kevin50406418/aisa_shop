<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<?php setlocale(LC_MONETARY, 'zh_TW');?>
<h1 class="ui header blue">我的訂單</h1>
<table class="ui table celled">
	<thead>
		<tr>
			<th class="center aligned">訂單號碼</th>
			<th class="center aligned">使用者</th>
			<th class="center aligned">訂購日期</th>
			<th class="center aligned">訂單狀態</th>
			<th class="center aligned">金額</th>
			<th class="center aligned">出貨日期</th>
		</tr>
	</thead>
<?php foreach ($orders as $key => $order) {?>
	<tr>
		<td class="center aligned">
			<a href="order.php?order_id=<?php echo $order['order_id']?>"><?php echo $order['order_id']?></a>
		</td>
		<td class="center aligned">
			<?php echo $order['user_login'];?>
		</td>
		<td class="center aligned">
			<?php echo date("Y-m-d",$order['order_time']);?>
		</td>
		<td class="center aligned">
			<?php switch($order['order_staus']-1){
				case 0:
					echo "收到訂單";
				break;
				case 1:
					echo "付款中";
				break;
				case 2:
					echo "出貨準備中";
				break;
				case 3:
					echo "已出貨";
				break;
				case 4:
					echo "送貨中";
				break;
				case 5:
					echo "已送達";
				break;
				default:
					echo "-";
			}?>
		</td>
		<td class="center aligned">
			<?php echo money_format('%(#10.0n', $order['order_price']) ?>
		</td>
		<td class="center aligned">
			<?php if($order['order_shipping'] !=0){echo date("Y-m-d H:i",$order['order_shipping']); }?>
		</td>
	</tr>
<?php }?>
</table>