<?php if(!defined('IN_CCS')) {exit('Access Denied');}?>
<?php setlocale(LC_MONETARY, 'zh_TW');?>
<script type="text/javascript">
$(function() {
    $('.rating').rating({
        initialRating: <?php echo rand(1,4)?>,
        maxRating: 5
    });
    $('.modal').modal();
    $('#addfav').click(function(event) {
        $('#modal_fav').modal('show');
    });
    $("#cart_buy").submit(function() {
        $('#modal_cartbuy').modal('show');
        $.ajax({
            type: "POST",
            url: "ajax/buy_cart.php",
            data: $("#cart_buy").serialize(),
            success: function(e) {
                $("#result_buy").html(e)
            },
            error: function(e) {
                $("#result_buy").addClass("ui message red").text("發生錯誤")
            }
        });
        return false
    });
    $("#cart_add").submit(function() {
        $('#modal_cartadd').modal('show');
        $.ajax({
            type: "POST",
            url: "ajax/add_cart.php",
            data: $("#cart_add").serialize(),
            success: function(e) {
                $("#result_add").html(e)
            },
            error: function(e) {
                $("#result_add").addClass("ui message red").text("發生錯誤")
            }
        });
        return false
    });
});
   
</script>
<div class="ui raised segment">
<div class="ui items">
    <div class="item">
        <div class="ui large image">
            <?php if(file_exists(ABSPATH."img/".$item[0]["item_img"]) && !empty($item[0]["item_img"])){?>
                <img src="img/<?php echo $item[0]["item_img"]?>">
            <?php }else{?>
                <i class="bordered huge photo icon"></i>
            <?php }?>
        </div>
        <div class="content">
            <h1 class="ui header huge"><?php echo $item[0]["item_name"];?></h1>
            <div class="meta">
                <span class="price"><?php echo money_format('%(#10.0n', $item[0]['item_price']) ?></span>
            </div>
            <div class="description">
                <p>庫    存 :  <?php if($item[0]['item_num']==0){echo "補貨中";}else{echo "有";}?></p>
                <p>評    價 :<div class="ui star rating huge"></div></p>
                <div class="ui divider"></div>
                <div class="ui form">
                    <form method="post" id="cart_buy" class="inline field">
                        <input type="hidden" name="item_id" value="<?php echo $item[0]["item_id"];?>">
                        <input type="hidden" name="store_id" value="<?php echo $item[0]["store_id"];?>">
                        <button type="submit" class="ui button huge red" value="buy" name="act">立即購買</button>
                    </form>
                    <form method="post" id="cart_add" class="inline field">
                        <input type="hidden" name="item_id" value="<?php echo $item[0]["item_id"];?>">
                        <input type="hidden" name="store_id" value="<?php echo $item[0]["store_id"];?>">
                        <button type="submit" class="ui button huge green" value="add" name="act"><i class="add to cart icon"></i> 加到購物車</button>
                    </form>
                </div>
                <div class="ui divider"></div>
                <p>分    享 :
                    <a href="#" class="ui facebook button icon"><i class="facebook icon"></i></a>
                    <a href="#" class="ui google plus button icon"><i class="google plus icon"></i></a>
                    <a href="#" class="ui twitter button icon"><i class="twitter icon"></i></a>
                    <a href="#" class="ui red button icon"><i class="weibo icon"></i></a>
                    <a href="#" class="ui basic button icon" id="addfav"><i class="heart icon red"></i> 加入追蹤</a>
                </p>
            </div>
        </div>
    </div>
</div>
</div>
<?php if(is_array($item)){?>
<h2>更多商品</h2>
<div class="ui four doubling cards">
    <?php foreach ($rand_item as $key => $rand) {?>
    <div class="card">
        <a class="image" href="item.php?store_id=<?php echo $rand['store_id']?>&item_id=<?php echo $rand['item_id']?>">
            <?php if(file_exists(ABSPATH."img/".$rand["item_img"]) && !empty($rand["item_img"])){?>
                <img class="ui tiny middle aligned bordered image" src="img/<?php echo $rand["item_img"]?>">
            <?php }else{?>
                <i class="bordered photo icon"></i>
            <?php }?>
        </a>
        <div class="content">
            <a class="header" href="item.php?store_id=<?php echo $rand['store_id']?>&item_id=<?php echo $rand['item_id']?>"><?php echo $rand['item_name']?></a>
            <div class="description blue">
                <span class="right floated"><?php echo money_format('%(#10.0n', $rand['item_price']) ?></span>
            </div>
        </div>
    </div>
    <?php }?>
</div>
<?php }?>
<div class="ui modal basic" id="modal_cartadd">
    <i class="close icon"></i>
    <div class="content">
        <div class="description">
            <div id="result_add"></div>
        </div>
    </div>
</div>
<div class="ui modal" id="modal_cartbuy">
    <i class="close icon"></i>
    <div class="header">
        立即購買
    </div>
    <div class="content">
        <div class="description">
            <div id="result_buy"></div>
        </div>
    </div>
</div>
<?php if(is_login()){?>
<div class="ui modal small" id="modal_fav">
    <i class="close icon"></i>
    <div class="header">
        提示訊息
    </div>
    <div class="content">
        <div class="description">
            <div class="ui header">請<a href="login.php">登入</a>或<a href="reg.php">註冊</a>HTC帳戶以加入追蹤</div>
        </div>
    </div>
    <div class="actions">
        <div class="ui green button">
            確定
        </div>
    </div>
</div>
<?php }?>