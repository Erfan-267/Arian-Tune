<?php
require_once '../pdo.php';
require_once '../check-account.php';
require_once '../helpers.php';
include_once '../language/confing.php'; 
global $pdo;
if(!isset($_GET['order_id'])){
    redirect('index/index.php');
}
$code="SELECT * FROM orders WHERE id=?";
$result=$pdo->prepare($code);
$result->execute([$_GET['order_id']]);
$order=$result->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$lang['arian-car']?> | <?=translateText('سفارشات',$langCode)?></title>
    <link rel="shortcut icon" href="<?=url('shop-img/Arian Tune.webp')?>" type="image/x-icon">
</head>
<body>
    <?php require '../head & foot/header.php' ?>
    <div class="cont">
        <label for=""><?=$lang['order-id']?></label>
        <span><?=$order->id?></span>
        <label for=""><?=$lang['product-id']?></label>
        <span><?=$order->post_id?></span>
        <label for=""><?=translateText('نام گیرنده',$langCode)?></label>
        <span><?=$order->receiver_name?></span>
        <label for=""><?=translateText('نام محصول',$langCode)?></label>
        <span><?=translateText($order->product_name,$langCode)?></span>
        <label for=""><?=translateText('قیمت محصول',$langCode)?></label>
        <span><?=$order->price?></span>
        <label for=""><?=translateText('تعداد',$langCode)?></label>
        <span><?=$order->quantity?></span>
        <label for=""><?=translateText('قیمت کل',$langCode)?></label>
        <span><?=$order->total_price?></span>
        <label for=""><?=translateText('آدرس',$langCode)?></label>
        <p><?=translateText($order->address,$langCode)?></p>
        <label for=""><?=translateText('پلاک',$langCode)?></label>
        <span><?=translateText($order->plaque,$langCode)?></span>
        <label for=""><?=translateText('طبقه و واحد',$langCode)?></label>
        <span><?=translateText($order->floor_unit,$langCode)?></span>
        <label for=""><?=translateText('تاریخ سفارش',$langCode)?></label>
        <span><?=$order->created_at?></span>
        <label for=""><?=translateText('شماره تلفن',$langCode)?></label>
        <span><?=$order->phone?></span>
        <label for=""><?=translateText('وضیعت',$langCode)?></label>
        <?php if($order->delivery_status === 'pending'){ ?>
            <span style="color: blue;"><?=$lang['delivery-status1']?></span>
            <?php }else{ ?>
            <span style="color: green;"><?=$lang['delivery-status2']?></span>
            <?php } ?>
    </div>

    <?php require '../head & foot/footer.php' ?>
</body>
</html>
<style>
    .cont{
        width: 100%;min-height: 500px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 20px;
        padding-top: 30px;
        
    }
    .cont>label{
        font: 40px 'digi';
        background-color: black;
        color: white;
    }
    .cont>span,.cont>p{
        font: 30px 'digi';
    }
    @media screen and (min-width:360px) and (max-width:767px){
        .cont>span,.cont>p{
            font-size: 15px;
        }
        .cont>label{
            font-size: 20px;
        }
    }
</style>



