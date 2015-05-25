<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<?php setlocale(LC_MONETARY, 'zh_TW');?>
<div class="ui cards">
	<?php foreach ($items as $key => $item) {?>
    <div class="card">
        <a class="image">
            <?php if(file_exists(ABSPATH."img/".$item["item_img"]) && !empty($item["item_img"])){?>
				<img class="ui tiny middle aligned bordered image" src="img/<?php echo $item["item_img"]?>">
			<?php }else{?>
				<i class="bordered big photo icon"></i>
			<?php }?>
        </a>
        <div class="content">
            <a class="header"><?php echo $item['item_name']?></a>
            <div class="meta">
                <a><?php echo $item['store_name']?></a>
            </div>
            <div class="description blue">
                <span class="right floated"><?php echo money_format('%(#10.0n', $item['item_price']) ?></span>
            </div>
        </div>
    </div>
    <?php }?>
</div>