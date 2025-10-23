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
    <title>panel admin | category</title>
    <link rel="shortcut icon" href="<?= url('shop-img/Arian Tune.webp')?>" type="image/x-icon">
    <style>
        .require{
            width: 100%;
            height: 20vh;
        }
        .cont{
            width: 100%;
            height: 80vh;
        }
        .title-cont{
            width: 100%;
            height: 100px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            font: 50px 'digi';
           
        }
        .category-cont{
            width: 100%;
            height: 100%;
            /* display: flex; */
            /* padding: auto; */

        }
        .title-cate-cont,.categorys{
            width: 90%;
            height: 100px;
            /* background-color: lightgray; */
            display: flex;
            justify-content: space-between;
            align-items: center;
            font: 20px 'digi';
            margin: auto;

        }
        .categorys:nth-child(even){
            background-color: lightgray;
            
        }
        .categorys:nth-child(odd){
            background-color: whitesmoke;
            
        }
        .title-cate-cont{
            border: 1px solid black;
        }
        .edit-cont{
            width: 25%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-direction: column;
        }
        .edit-cont img{
            width: 30px;
            height: 30px;
        }
        .categorys>section>img{
            width: 100px;
            height: 100%;
        }
        .create-btn{
            width: 70px;
            height: 50px;
            background-color: lime;
            border-radius: 5px;
            
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        section{
            width: 25%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        @media screen and (min-width:360px) and (max-width:500px) {
            .title-cate-cont,.categorys{
                width: 300px;
                height: 300px;
                flex-wrap: wrap;
            }
            section{
                width: 50%;
                height: 50%;
            }
            section:first-child>img{
                width: 100%;
                height: 100%;
            }
            .edit-cont{
                width: 50%;
                height: 50%;
                flex-direction: row;
            }
        }
        @media screen and (min-width:501px) and (max-width:800px){
            .title-cate-cont,.categorys{
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="require">
        <?php include_once 'admin-head.php'?>
        <?php require_once 'admin-slide.php'?>
    </div>
    <div class="cont">
        <div class="title-cont"><span>دسته بندی</span>
        <a href="<?=url('admin/create-cate.php')?>" class="create-btn">+</a>
    </div>
        <div class="category-cont">

       
        <div class="title-cate-cont">
            <section><span>عکس</span></section>
            <section><span>category id:</span></section>
            <section><span>اسم</span></section>
            <section><span>edit</span></section>
            
            
            
            
        </div>

        <?php
            global $pdo;
            $query="SELECT * FROM `categories`";
            $result=$pdo->prepare($query);
            $result->execute();
            $cate=$result->fetchAll();
            foreach($cate as$item){
        ?>



        <div class="categorys">
            <section>
            <img src="<?=asset($item->image)?>" alt="category img">
            </section>
            <section><span><?=$item->id?></span></section>
            <section><span><?=$item->name?></span></section>
            
            
            
            
            <section class="edit-cont">
                <a href="<?=url("admin/edit-cate.php?cat_id=$item->id")?>">
                    <img src="<?=url("shop-img/edit.png")?>" alt="">
                </a>
                <a href="<?=url("admin/delete-cate.php?cat_id=$item->id")?>">
                    <img src="<?=url("shop-img/trash.svg")?>" alt="">
                </a>
                
            </section>
        </div>

        <?php } ?>




        </div>
    </div>
</body>
</html>