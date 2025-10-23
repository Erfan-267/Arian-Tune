<?php require_once '../helpers.php';
require_once '../pdo.php';
require_once '../check-account.php';
require_once '../check-admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>panel admin | orders</title>
    <link rel="shortcut icon" href="<?= url('shop-img/Arian Tune.webp')?>" type="image/x-icon">
</head>
<body>
    <div class="require">
        <?php include_once 'admin-head.php'?>
        <?php require_once 'admin-slide.php'?>
    </div>
    <div class="title-name">
        <span>سفارشات</span>
    </div>
    <div class="cont">
        <section class="order title-order">
            <span>کد سفارش</span>
            <span>قیمت</span>
            <span>کد محصول</span>
            <span>وضعیت</span>
            <span>مشاهده جزئیات</span>
        </section>
        <?php
        global $pdo;
        $code="SELECT * FROM orders ORDER BY delivery_status = 'pending'";
        $result=$pdo->prepare($code);
        $result->execute();
        $orders=$result->fetchAll();
        foreach($orders as $order){?>
        <section class="order">
            <span><?=$order->id?></span>
            <span><?=$order->total_price?></span>
            <span><?=$order->post_id?></span>
            <?php if($order->delivery_status === 'pending'){ ?>
            <span style="color: blue;">در حال ارسال</span>
            <?php }else{ ?>
            <span style="color: green;">تکمیل</span>
            <?php } ?>
            <a href="<?=url('login_sign/order.php?order_id='.$order->id)?>">
                <img src="<?=url('shop-img/arrow.png')?>" alt="">
            </a>
        </section>
        <?php } ?>
    </div>
</body>
</html>
<style>
    .require{
            width: 100%;
            height: 20vh;
    }
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
        width: 30px;height: 30px;
    }
    .title-name{
        width: 100%;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        font: 50px 'digi';
    }
    @media screen and (min-width:360px) and (max-width:767px){
        .order{
            font-size: 13px;
        }
    }
</style>