<?php require_once '../helpers.php';
session_start();
include_once '../language/confing.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$lang['arian-car']?> | <?=$lang['conncat']?></title>
    <link rel="shortcut icon" href="<?= url('shop-img/Arian Tune.webp')?>" type="image/x-icon">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .cont{
            width: 100%;
            height: 120vh;
        }
        ::-webkit-scrollbar{
            width: 13px;
            height: 13px;
    
        }
        ::-webkit-scrollbar-track{
            background-color: black;
    
        }
        ::-webkit-scrollbar-thumb{
            background-color: white;
            border-radius: 7.5px;
    
        }
        .global-call{
            width: 100%;
            height: 100%;

        }
        .text-call{
            width: 100%;
            height: 20%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .text-call>span{
            color: white;
            font-size: 50px;
            font-family: 'digi';
            background-color: black;
        }
        .link-call{
            width: 100%;
            height: 50%;
            display: flex;
            

        }
        .link-call-text{
            width: 60%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 50px;
            font-family: 'digi';
        }
        .link-call-img{
            width: 40%;
            height: 100px ;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
        }
        .link-call-img>img:first-child{
            width: 150px;
            height: 150px;
            filter: drop-shadow(5px 5px 2px);
        }.link-call-img>img:last-child{
            width: 200px;
            height: 200px;
            filter: drop-shadow(5px 5px 2px);
        }
        
        .email-call{
            width: 100%;
            height: 30%;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-direction: column;
            font-size: 50px;
            font-family: 'digi';
        }
        .email-call>span:last-child{
            font-family: sans-serif;
        }
        @media screen and (min-width:360px) and (max-width:448px) {
            .link-call{
                flex-direction: column-reverse;
            }
            .link-call-text,.link-call-img{
                width: 100%;
                height: 50%;
            }
            .link-call-img{
               flex-direction: row;
            }
        }
    </style>

</head>
<body>
    <?php require '../head & foot/header.php'; ?>

    <article class="cont">
    <!-- <div class="local-call">
        
    </div> -->
    <div class="global-call">
        <div class="text-call">
        <span><?=$lang['conncat-us']?></span>

        </div>
        <div class="link-call">
            <div class="link-call-text">
                <span>09226443054</span>
            </div>
            <div class="link-call-img">
                <img src="<?=url('shop-img/telgram.png')?>" alt="">
                <img src="<?=url('shop-img/whatsapp.png')?>" alt="">
            </div>
            
           
           
        </div>
        <div class="email-call"><span><?=$lang['conncat-email']?></span><span>ariancar2025@gmail.com</span></div>
    </div>
    </article>

    <?php require '../head & foot/footer.php'; ?>
    
</body>
</html>