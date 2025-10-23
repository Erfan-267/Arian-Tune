<?php
require_once '../pdo.php';
require_once '../check-account.php';
include_once '../language/confing.php';
require_once '../helpers.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$lang['arian-car']?> | <?=$lang['your-order']?></title>
    <link rel="shortcut icon" href="<?=url('shop-img/Arian Tune.webp')?>" type="image/x-icon">
</head>
<body>
    <?php require '../head & foot/header.php' ?>
    <div class="cont">
        <section class="order title-order">
            <span><?=$lang['order-id']?></span>
            <span><?=translateText('قیمت',$langCode)?></span>
            <span><?=$lang['product-id']?></span>
            <span><?=translateText('وضعیت',$langCode)?></span>
            <span><?=$lang['view-details']?></span>
        </section>
        <?php
        global $pdo;
        $code="SELECT * FROM orders WHERE user_email=?";
        $result=$pdo->prepare($code);
        $result->execute([$_SESSION['user']]);
        $orders=$result->fetchAll();
        foreach($orders as $order){?>
        <section class="order">
            <span><?=$order->id?></span>
            <span><?=$order->total_price?></span>
            <span><?=$order->post_id?></span>
            <?php if($order->delivery_status === 'pending'){ ?>
            <span style="color: blue;"><?=$lang['delivery-status1']?></span>
            <?php }else{ ?>
            <span style="color: green;"><?=$lang['delivery-status2']?></span>
            <?php } ?>

            <a href="<?=url('login_sign/order.php?order_id='.$order->id)?>">
                <img src="<?=url('shop-img/arrow.png')?>" alt="">
            </a>
        </section>
        <?php } ?>
        
    </div>
    <?php require '../head & foot/footer.php' ?>
</body>
</html>
<style>
    .cont{
        width: 100%;
        min-height: 500px;
        padding-top: 20px;
        padding-bottom: 20px;
        
    }
    .order{
        width: 90%;
            height: 100px;
            /* background-color: lightgray; */
            display: flex;
            justify-content: space-between;
            align-items: center;
            font: 20px 'digi';
            margin: auto;
            padding-left: 10px;
            padding-right: 10px;
    }
    .order:nth-child(even){
            background-color: lightgray;
            
        }
    .order:nth-child(odd){
            background-color: whitesmoke;
            
    }
    .title-order{
        background-color: white;
        border: 2px dashed black;
    }
    .order>span,.order>a{
        width: 20%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .order img{
        width: 30px;
        height: 30px;
    }
    @media screen and (min-width:360px) and (max-width:767px){
        .order{
            font-size: 13px;
        }
    }
</style>