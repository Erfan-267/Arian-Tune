<?php 
require_once '../helpers.php';
require_once '../pdo.php';
require_once '../check-account.php';
include_once '../language/confing.php'; 
$post_id = $_GET['post_id'] ?? null;
if (!$post_id) {
    redirect('indec/indec.php');
}

global $pdo;
$query = "SELECT * FROM posts WHERE status = 10 AND id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$post_id]);
$product = $stmt->fetch();

if (!$product) {
    die(translateText("محصول یافت نشد.",$langCode));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$lang['arian-car']?> | <?=translateText('فرایند خرید',$langCode)?> <?= htmlspecialchars($product->name) ?></title>
    <link rel="shortcut icon" href="<?=url('shop-img/Arian Tune.webp')?>" type="image/x-icon">
</head>
<body>
    <?php require("../head & foot/header.php"); ?>

    <div class="cont">
        <section>
        <h2><?= translateText(htmlspecialchars($product->name),$langCode) ?></h2>
        <p><?=translateText("قیمت: $product->price تومان",$langCode)?></p>
        </section>
    

    <form action="<?=url('products page/payment.php')?>" method="POST">
    <input type="hidden" name="post_id" value="<?= $product->id ?>">
    <input type="hidden" name="product_name" value="<?= htmlspecialchars($product->name) ?>">
    <input type="hidden" name="price" value="<?= $product->price ?>">

    <label for="quantity"><?=translateText('تعداد',$langCode)?></label>
    <input type="number" id="quantity" name="quantity" min="1" value="1" required>
    
    <label for="receiver_name"><?=translateText('نام گیرنده',$langCode)?></label>
    <input type="text" id="receiver_name" name="receiver_name" required placeholder="Customer name">

    <label for="phone"><?=translateText('شماره موبایل',$langCode)?></label>
    <input type="number" id="phone" name="phone" required placeholder="phone number">

    <label for="address"><?=translateText('آدرس',$langCode)?></label>
    <textarea id="address" name="address" required placeholder="address"></textarea>

    <label for="plaque"><?=translateText('پلاک',$langCode)?></label>
    <input type="text" id="plaque" name="plaque" placeholder="plaque" required>
    <label for="plaque"><?=translateText('طبقه و واحد',$langCode)?></label>
    <input type="text" id="floor_unit" name="floor_unit" placeholder="floor_unit" required>

    <button type="submit"><?=translateText('پرداخت',$langCode)?></button>
</form>

    </div>


    <?php require('../head & foot/footer.php'); ?>
</body>
</html>
<style>
    .cont{
        width: 100%;
        height: auto;
        
        
    }
    .cont>section{
        width: 100%;
        height: 200px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-direction: column;
        font: 30px 'digi';

    }
    .cont>form{
        width: 100%;
        min-height: 500px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-direction: column;
        font: 25px 'digi';
        gap: 20px;
    }
    .cont>form>input{
        width: 250px;
        height: 50px;
        text-align: center;
        background-color: yellow;
        border: 2px black solid;
        color: black;
        box-shadow: 2px 2px 20px 5px gray;
    }
    .cont>form>textarea{
        width: 300px;
        height: 100px;
        text-align: center;
        background-color: yellow;
        border: 2px black solid;
        color: black;
        box-shadow: 2px 2px 20px 5px gray;
    }
    .cont>form>button{
        width: 100px;
        height: 50px;
        font: 20px 'digi';
        cursor: pointer;
        background-color: yellow;
        color: black;
        border: 3px black solid;
        border-radius: 5px;
    }
    .cont>form>button:active{
        background-color: black;
        color: yellow;
        border: 3px yellow solid;
    }

</style>