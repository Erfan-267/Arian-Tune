<?php require_once '../helpers.php';
require_once '../check-account.php';
require_once '../pdo.php';
require_once '../check-admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>panel admin | experience</title>
    <link rel="shortcut icon" href="<?= url('shop-img/Arian Tune.webp')?>" type="image/x-icon">
    <style>
        .require{
            width: 100%;
            height: 20vh;
        }
        .title-cont{
            width: 100%;
            height: 100px;
            display: grid;
            place-items: center;
            font: 50px 'digi';
           
        }
        .cont{
            width: 100%;
            height: 80vh;
        }
        .product-cont{
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            /* padding: auto; */
        }
        .comment{
        width: 300px;
        height: 150px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-direction: column;
        background-color: black;
        border-radius: 10px;
        font: 30px 'digi';
        color: yellow;
        flex-shrink: 0;
    }
    .stars{
        width: 90%;
        height: 90%;
    }
    </style>
</head>
<body>
    <div class="require">
        <?php include_once 'admin-head.php'?>
        <?php require_once 'admin-slide.php'?>
    </div>
    <div class="cont">
        <div class="title-cont"><span>تجربه مشتریان</span></div>
        <div class="product-cont">

        <?php
            global $pdo;
            $query="SELECT stars.* , users.username AS userName FROM stars JOIN users ON stars.user_email=users.email";
            $statment=$pdo->prepare($query);
            $statment->execute();
            $scores=$statment->fetchAll();
            foreach($scores as $item){
            ?>
            <section class="comment">
            <span class="span"><?=$item->userName?></span>
            <img src="<?=url("shop-img/stars/star-$item->img_num.svg")?>" alt="" class="stars">
            </section>
        <?php } ?>
        
        
        




        </div>
    
    </div>
    
</body>
</html>