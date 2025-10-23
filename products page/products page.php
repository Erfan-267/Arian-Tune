<?php 
session_start();
require_once '../helpers.php';
require_once '../pdo.php';
include_once '../language/confing.php'; 
$notFound=false;
        if(isset($_GET['cat_id']) && !empty($_GET['cat_id'])){
        global $pdo;
        $code="SELECT * FROM `categories` WHERE `id`=?";
        $result=$pdo->prepare($code);
        $result->execute([$_GET['cat_id']]);
        $category=$result->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$lang['arian-car']?> | <?=$category->name?></title>
    <link rel="stylesheet" href="<?=url('asset/style3.css')?>">
    <!-- <link rel="stylesheet" href="products page.css"> -->
    <link rel="shortcut icon" href="../shop-img/Arian Tune.webp" type="image/x-icon">
    <style>
      
      .collction:nth-child(<?=$_GET['cat_id']+1?>)>span{
    color: darkcyan;
   }
    </style>
</head>
<body>
    <!-- header -->
    <?php
    require("../head & foot/header.php");
    ?>
    <!-- header end -->
    <?php require('products collction.php'); ?>
    <div class="order-div">
    <form method="GET" id="sortForm" class="order-cont">
    <input type="hidden" name="cat_id" value="<?= $_GET['cat_id'] ?? '' ?>">
    <label><?=$lang['sort']?></label>
    <select name="order" onchange="document.getElementById('sortForm').submit()">
        <option value="new" <?=($_GET['order'] ?? '') == 'new' ? 'selected' : ''?>><?=$lang['new']?></option>
        <option value="old" <?=($_GET['order'] ?? '') == 'old' ? 'selected' : ''?>><?=$lang['old']?></option>
        <option value="amzing" <?=($_GET['order'] ?? '') == 'amzing' ? 'selected' : ''?>><?=$lang['special']?></option>
        
    </select>
</form>
    </div>
    
    <div class="all_cont">
        <?php
         
         global $pdo;
         
         $catId = $_GET['cat_id'] ?? null;
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
         
         // ساخت کوئری
         $query = "SELECT posts.*, categories.name AS cat_name 
                   FROM posts 
                   LEFT JOIN categories ON posts.cat_id = categories.id ";
         
         if ($catId) {
             $query .= "WHERE posts.cat_id = :cat_id ";
         }
         
         $query .= "ORDER BY $orderBy";
         
         // اجرا
         $result = $pdo->prepare($query);
         
         if ($catId) {
            $result->bindParam(':cat_id', $catId, PDO::PARAM_INT);
         }
         
         $result->execute();
         $posts = $result->fetchAll();
         
         
        foreach($posts as$item){?>
        <section class="post">
        <div class="post-img">
        <img src="<?=asset($item->image)?>" alt="">
        <?php if($item->special === 10){?>
        <img src="<?=url('shop-img/special-icon.png')?>" alt="" id="special-img">
        <?php } ?>
        </div>
        <div class="post-data">
        <span class="post-text"><?=translateText($item->name,$langCode)?></span>
        <span class="post-price"><?=$item->price?></span>
        <a href="<?=url('products page/product page.php?post_id='.$item->id)?>" class="post-btn"><?=$lang['view']?></a>       
        </section>
        <?php }} ?>
    </div>

    
    
    <?php
        require ('../head & foot/footer.php');
    ?>

    
</body>
</html>