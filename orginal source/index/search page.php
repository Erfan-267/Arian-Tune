<?php require_once '../helpers.php';
session_start();
require_once '../pdo.php';
include_once '../language/confing.php'; 



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$lang['arian-car']?> | <?=$lang['search']?></title>
    <link rel="shortcut icon" href="<?=url('shop-img/Arian Tune.webp')?>" type="image/x-icon">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .mobile-cont{
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    width: 100%;
    height: 85vh;
}
.mobile-cont>form{
    width: 90%;
    display: flex;
    height: 45px;
    background-color: black;

}
.search-btn{
    width: 45px;
    height: 45px;
    border: none;
    background-color: black;
}
.search-btn>img{
    width: 90%;
    height: 90%;
}
.mobile-cont>form>input{
    width: 100%;
    height: 100%;
    background-color: black;
    color: white;
    border: none;
    text-align: center;
}
.link-mobile-cont{
    width: 100%;
    height: 70%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
}
.hover-glay{
    color: white;
    font-family: 'digi';
    font-size: 25px;
    background-color: black;
    text-decoration: none;
}
.login-singin{
    font-size: 20px;
    font-family: 'digi';
    text-decoration: none;
    color: black;

}
    </style>
</head>
<body>
<?php
    require('../head & foot/header.php')
    ?>
<div class="parent-cont hide"><div class="mobile-cont">
        <form action="<?=url('products page/search products.php')?>" method="get">
            <button class="search-btn"><img src="<?=url('shop-img/search-btn.svg')?>" alt=""></button>
            <input type="text" placeholder="search..." name="q">
        </form>
        <div class="link-mobile-cont">
            
                <a class="products hover-glay" href="<?=url('products page/products page(all).php')?>"><?=$lang['product']?></a>
                <!-- <a class="help hover-glay" href="">راهنمای</a> -->
                <a class="call hover-glay" href="<?=url('conncat/conncat.php')?>"><?=$lang['conncat']?></a>
                <!-- <a class="comnt hover-glay" href="">تجربه شما</a> -->
                <a class="fitments hover-glay" href="<?= url('conncat/about us.php')?>"><?=$lang['about']?></a>
                <a class="help hover-glay" href="<?= url('conncat/regulations.php')?>"><?=$lang['regulations']?></a>
               
            
        </div>
        <?php 
            global $pdo;
            if(isset($_SESSION['user'])){
                $session_email = $_SESSION['user'];
                $code="SELECT email FROM users WHERE email = ?";
                $stmt = $pdo->prepare($code);
                $stmt->execute([$session_email]);
                if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $email_from_db = $row['email'];
                $link = url("login_sign/account.php?user_email=") . urlencode($email_from_db);
                
                
                }}else{$link =url('login_sign/login.php');}?>
        <a href="<?=$link?>" class="login-singin"><?=$lang['login']?> | <?=$lang['register']?></a>
    </div></div>



</body>
</html>