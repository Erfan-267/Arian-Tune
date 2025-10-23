<?php require_once '../helpers.php';
require_once '../pdo.php';
session_start();
include_once '../language/confing.php'; ?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$lang['arian-car']?> | <?=$lang['regulations']?></title>
    <link rel="shortcut icon" href="<?=url('shop-img/Arian Tune.webp')?>" type="image/x-icon">
</head>
<body>
    <?php require '../head & foot/header.php' ?>
    <div class="cont">
        <p><?=$lang['regulation-p1']?></p>
        <span><?=$lang['regulation-s1']?></span>
        <p><?=$lang['regulation-p2']?></p>
        <span><?=$lang['regulation-s2']?></span>
        <p><?=$lang['regulation-p3']?></p>
        <span><?=$lang['regulation-s3']?></span>
        <p><?=$lang['regulation-p4']?></p>
        <span><?=$lang['regulation-s4']?></span>
        <p><?=$lang['regulation-p5']?></p>
        <span><?=$lang['regulation-s5']?></span>
        <p><?=$lang['regulation-p6']?></p>
    </div>
    <?php require '../head & foot/footer.php' ?>
</body>
</html>
<?php if($langCode==='en'){
            $align='start';
        }else{
            $align='end';
        }
    ?>
<style>
    .cont{
        width: 100%;
        min-height: 85vh;
        padding: 20px;
        text-align: <?=$align?>;
    }
    .cont>p{
        font: 30px 'digi';
    }
    .cont>span{
        font: 40px 'digi';
    }
    @media screen and (max-width:448px) and (min-width:360px){
        .cont>p{
            font: 15px 'digi';
        }
        .cont>span{
            font: 20px 'digi';
        }
    }
</style>