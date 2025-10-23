<?php
require_once '../helpers.php';
require_once '../pdo.php';
include_once '../language/confing.php'; 
?>
<div class="collction-cont">
        <a class="collction All" href="<?=url('products page/products page(all).php')?>"><img src="<?=url('shop-img/products menu/all.png')?>" alt=""><span><?=$lang['all']?></span></a>


        <?php
            global $pdo;
            $query="SELECT * FROM `categories`";
            $result=$pdo->prepare($query);
            $result->execute();
            $cate=$result->fetchAll();
            foreach($cate as$item){
        ?>

        <a class="collction steering" href="<?=url("products page/products page.php?cat_id=$item->id")?>">
            <img src="<?=asset($item->image)?>" alt="">
            <span><?=translateText($item->name,$langCode)?></span>
        </a>

        <?php } ?>
        
    </div>

    <style>
         .collction-cont{
            width: 100%;
            height: 30vh;
            background-color: black;
            display: flex;
            overflow-x: scroll;
            overflow-y: hidden;
            align-items: center;
            justify-content: space-around;
            text-decoration: none;
            gap: 50px;
            overflow-x: scroll;
        }
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .collction{
            width: 120px;
            height: 150px;
            text-decoration: none;
            
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
       
        .collction>img{
            width: 100px;
            height: 100px;

        }
        .collction>span{
            justify-content: center;
            align-items: center;
            display: flex;
            color: white;
            text-decoration: none;
            font-size: 20px;
            font-family: 'digi';
            

        }
        .collction:hover span{
            color: darkcyan;
        }
    </style>