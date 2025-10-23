<?php
// session_start();
require_once '../helpers.php';
require_once '../pdo.php';
require_once '../check-account.php';
include_once '../language/confing.php';

// چک می‌کنیم user_email توی session باشه
if (!isset($_SESSION['user'])) {
    header("Location: " . url("login_sign/login.php"));
    exit;
}

global $pdo;
$code = "SELECT * FROM users WHERE email = ?";
$result = $pdo->prepare($code);
$result->execute([$_SESSION['user']]);
$userData = $result->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $lang['arian-car'] ?> | <?= $lang['your-account'] ?></title>
    <link rel="shortcut icon" href="<?= url('shop-img/Arian Tune.webp') ?>" type="image/x-icon">
</head>
<body>
    <?php require '../head & foot/header.php' ?>

    <div class="cont">
        <section>

        <div class="user-option">
            <a href="<?= url('login_sign/your order.php?user_email='.$_SESSION['user']) ?>"><?= $lang['your-order'] ?></a>
            <a href="<?= url('comment/your experience.php?user_email='.$_SESSION['user']) ?>"><?= $lang['score-you'] ?></a>
            <a href="<?= url('logout.php') ?>"><?= $lang['logout'] ?></a>
            <?php if ($userData->admin !== 0) { ?>
            <a href="<?= url('admin/category.php') ?>" target="_blank"><?= $lang['panel-admin'] ?></a>
            <?php } ?>
        </div>

        <div class="user-data">
            <h1><?= $lang['my-account'] ?></h1>
            <h2><?= $lang['username'] ?></h2>
            <h3><?= $userData->username ?></h3>
            <h2><?= $lang['email'] ?></h2>
            <h3><?= $userData->email ?></h3>
        </div>

        </section>
    </div>

    <?php require '../head & foot/footer.php' ?>
</body>
</html>
<style>
    .cont{
        width: 100%;
        height: 85vh;
        display: flex;justify-content: center;
    }
    .cont>section{
        width: 80%;
        height: 100%;
        display: flex;
       
    }
    .user-option,.user-data{
        width: 50%;
        height: 100%;
    }
    .user-data{
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: end;
        padding: 50px 0px;
        font-family: 'digi';
    }
    .user-data>h1{
        font-size: 50px;
    }
    .user-data>h2{
        font-size: 30px;
    }
    .user-data>h3{
        font-size: 20px;
    }
    .user-option{
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;  
        
    }
    .user-option>a{
        text-decoration: none;
        font: 30px 'digi';
        color: black;
    }
    .user-option>a:hover{
        text-shadow: 2px 2px black;
        color: yellow;
    }
    @media screen and (min-width:360px) and (max-width:550px){
        .cont>section{
            width: 95%;
            height: 100%;
            display: flex;
            flex-direction: column-reverse;

        }
        .cont{
            height: 170vh;
        }
        .user-option,.user-data{
            width: 100%;
            height: 50%;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;  
        }
        
    }
    @media screen and (min-width:550px) and (max-width:767px){
        .user-option>a{
            font-size: 25px;
        }
        .user-data>h1{
        font-size: 40px;
    }
    .user-data>h2{
        font-size: 25px;
    }
    .user-data>h3{
        font-size: 15px;
    }
    }
</style>