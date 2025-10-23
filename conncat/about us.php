<?php require_once '../helpers.php';
require_once '../pdo.php';
session_start();
include_once '../language/confing.php'; 
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$lang['arian-car']?> | <?=$lang['about']?></title>
    <link rel="shortcut icon" href="<?=url('shop-img/Arian Tune.webp')?>" type="image/x-icon">
</head>
<body>
    <?php require '../head & foot/header.php' ?>
    <div class="cont">
        <p><?=$lang['about-p1']?></p>
        <p><?=$lang['about-p2']?></p>
        <p><?=$lang['about-p3']?></p>
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
        padding: 30px;
        
        align-items: end;
        display: flex;
        justify-content: space-around;
        flex-direction: column;
        
        text-align:<?=$align?> ;
        
        
    }
    .cont>p{
        font: 30px 'digi';
    }
    @media screen and (max-width:448px) and (min-width:360px){
        .cont>p{
            font: 20px 'digi';
        }
        
    }
</style>