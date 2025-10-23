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
    <title>panel admin | products</title>
    <link rel="shortcut icon" href="<?= url('shop-img/Arian Tune.webp')?>" type="image/x-icon">
    <style>
        .require{
            width: 100%;
            height: 20vh;
        }
        .title-cont{
            width: 100%;
            height: 100px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            font: 50px 'digi';
           
        }
        .cont{
            width: 100%;
            height: 80vh;
        }
        .product-cont{
            width: 100%;
            height: 100%;
            /* display: flex; */
            /* padding: auto; */

        }
        .title-pro-cont,.products{
            width: 90%;
            height: 100px;
            /* background-color: lightgray; */
            display: flex;
            justify-content: space-between;
            align-items: center;
            font: 20px 'digi';
            margin: auto;
            

        }
        .title-pro-cont>section:nth-child(1){
            width: 100px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;

        }
        .title-pro-cont>section,.products>section{
            width: 40%;
            height: 100px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        .title-pro-cont>section:nth-child(4){
            width: 200px;
        }
        
        .profile-img{
            width: 100px;
            height: 100px;
        }
        .profile-img>img{
            width: 100px;
            height: 100px;
        }
        .products:nth-child(even){
            background-color: lightgray;
            
        }
        .products:nth-child(odd){
            background-color: whitesmoke;
            
        }
        .title-pro-cont{
            border: 1px solid black;
        }
        .edit-cont{
            width: 50px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-direction: column;
        }
        .status{
            width: 50px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .edit-cont img{
            width: 30px;
            height: 30px;
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
        #body{
            font-size: 15px;
            width: 200px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .order-cont{
        width: 100%;
        height: 100px;
        display: flex;justify-content:space-around;align-items: center;
    }
    .order-cont>label{
        font:30px 'digi';
    }
    .order-cont>select{
        width: 100px;
        height: 50px;
        background-color:yellow;
        font: 20px 'digi';
        border-radius: 10px;
        text-align: center;
        border:3px solid black ;
        
    }
        @media screen and (min-width:360px) and (max-width:900px) {
            
        .title-pro-cont,.products{
            width: 300px;
            height: 300px;
            font-size: 15px;
            display: flex;
            flex-wrap: wrap;
            
            

            
        }
        .title-pro-cont>section,.products>section{
            width: 50%;
            height: 50%;
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-direction: column;
            padding: 5px;

        }
        .products>a{
            width: 50%;
            height: 50%;
        }
        .products>a>img{
            width: 100%;
            height: 100%;
        }
        .title-pro-cont>section:nth-child(4){
            width: 50%;
            height: 50%;
        }
        #body{
            width: 50%;
            height: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px;
        }
        .edit-cont{
            flex-direction:row;
        }
        
        }
        @media screen and (min-width:901px) and (max-width:1064px){
            .title-pro-cont,.products{
                width: 90%;
                height: 200px;
                font-size: 15px;
            }
            .profile-img,.title-pro-cont>section:first-child{
                width: 200px;
                height: 200px;
            }
            .profile-img>img{
            width: 200px;
            height: 200px;
            }
            .products>section{
                width: 20%;
                height: 100%;
            }
            .title-pro-cont>section:nth-child(3),.products>section:nth-child(3){
                width: 50%;
                height: 100%;
            }
            #body{
                width: 200px;
                height: 100%;
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
        <div class="title-cont"><span>محصولات</span>
        <a href="<?=url('admin/create-post.php')?>" class="create-btn">+</a></div>
        <form method="GET" id="sortForm" class="order-cont">
    <label>مرتب سازی</label>
    <select name="order" onchange="document.getElementById('sortForm').submit()">
        <option value="new" <?=($_GET['order'] ?? '') == 'new' ? 'selected' : ''?>>جدیدترین</option>
        <option value="old" <?=($_GET['order'] ?? '') == 'old' ? 'selected' : ''?>>قدیمی‌ترین</option>
        <option value="amzing" <?=($_GET['order'] ?? '') == 'amzing' ? 'selected' : ''?>>ویژه‌ها</option>
    </select>
    </form>

        <div class="product-cont">

       
        <div class="title-pro-cont">
            <section>
                <span>عکس</span>
            </section>
            <section>
                <span>status</span>
                <span>edit</span>
                <span>id</span>
            </section>
            <section>
                <span>اسم</span>
                <span>قیمت</span>
                <span>دسته بندی</span>
            </section>
            <section>
                <span>نوضیحات</span>
            </section>
            
            
            
        </div>


        <?php
        global $pdo;

        $order = $_GET['order'] ?? 'new';
        
        switch ($order) {
            case 'old':
                $orderBy = "posts.created_at ASC";
                break;
            case 'amzing':
                $orderBy = "posts.special DESC";
                break;
            
            default:
                $orderBy = "posts.created_at DESC";
                break;
        }
        
        $query = "SELECT posts.*, categories.name AS cat_name 
                  FROM posts 
                  LEFT JOIN categories ON posts.cat_id = categories.id 
                  ORDER BY $orderBy";
        
        $result = $pdo->prepare($query);
        $result->execute();
        $posts = $result->fetchAll();
            foreach($posts as$item){
        ?>


        <div class="products">
            <a href="<?=url('products page/product page.php?post_id='.$item->id)?>" class="profile-img">
            <img src="<?=asset($item->image)?>" alt="">
            </a>
            
            <section>
            <section class="status">
            <?php if($item->status !== 10){ ?>
            <a href="<?=url("admin/change-status.php?post_id=$item->id")?>" style="color:red;">disble</a>
            <?php }else{ ?>
            <a href="<?=url("admin/change-status.php?post_id=$item->id")?>" style="color:green;">enible</a>
            <?php } ?>
            </section>
            
            <section class="edit-cont">
                <a href="<?=url("admin/edit-post.php?post_id=$item->id")?>">
                    <img src="<?=url("shop-img/edit.png")?>" alt="">
                </a>
                <a href="<?=url("admin/delete-post.php?post_id=$item->id")?>">
                    <img src="<?=url("shop-img/trash.svg")?>" alt="">
                </a>
                <?php if($item->special === 0){?>
                <a href="<?=url("admin/special-change.php?post_id=$item->id")?>">
                    <img src="<?=url("shop-img/special.svg")?>" alt="">
                </a>
                <?php }else{?>
                <a href="<?=url("admin/special-change.php?post_id=$item->id")?>">
                    <img src="<?=url("shop-img/special-active.svg")?>" alt="">
                </a>
                <?php } ?>

                
            </section>
            <span><?=$item->id?></span>
            </section>
            
            <section>
            <span><?=$item->name?></span>
            <span><?=$item->price?></span>
            <span><?=$item->cat_name?></span>
            </section>
            
            
            <span id="body"><?=substr($item->body,0,100). '...'?></span>
            
            
            
            

        </div>
        <?php } ?>




        </div>
    
    </div>
    
</body>
</html>