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
    <title>panel admin | users</title>
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
            min-height: 80vh;
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
        .title-pro-cont>section,.products>section{
            width: 30%;
            height: 100px;
            display: flex;
            justify-content: space-around;
            align-items: center;
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
        .products a{
            width: 20px;
            height: 20px;
            text-decoration: none;
        }
        @media screen and (min-width:360px) and (max-width:767px) {
            .title-pro-cont,.products{
                width: 90%;
                height: 200px;
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
            
            font-size: 15px;

            }
            .title-pro-cont>section:last-child,.products>section:last-child{
                width: 100%;
                height: 50%;
            }

        }
        @media screen and (min-width:768px) and (max-width:1024px) {
            .title-pro-cont,.products{
            
            font: 15px 'digi';
            

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
        <div class="title-cont"><span>مشتری ها</span></div>
        <div class="product-cont">

       
        <div class="title-pro-cont">
            <section>
            <span>user id</span>
            <span>username:</span>
            </section>
            <section><span>admin:</span></section>
            <section><span>email:</span></section>
            
            
            
            
        </div>




        <?php
        global $pdo;
        $code="SELECT * FROM users ORDER BY users.admin DESC";
        $result=$pdo->prepare($code);
        $result->execute();
        $users=$result->fetchAll();
        foreach($users as $item){
        ?>
        <div class="products">
            <section>
            <span><?= $item->id?></span>
            <span><?= $item->username?></span>
            </section>
            <section>
            <?php if($item->admin == 0){?>
            <a href="<?=url('admin/admin_change.php?user_id='.$item->id)?>" style="color: red;">notAdmin</a>
            <?php }else{?>
            <a href="<?=url('admin/admin_change.php?user_id='.$item->id)?>" style="color: green;">Admin</a>
            <?php } ?>
            </section>
            <section>
            <span><?= $item->email?></span>
            </section>
            
            
            
            
            
        </div>
        <?php } ?>




        </div>
    
    </div>
    
</body>
</html>