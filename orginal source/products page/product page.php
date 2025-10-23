<?php 
session_start();
require_once '../helpers.php';
require_once '../pdo.php';
include_once '../language/confing.php'; 
$post_id = $_GET['post_id'] ?? null;
if (!$post_id) {
    redirect('index/index.php');
}

global $pdo;
$query = "SELECT * FROM posts WHERE status = 10 AND id = ?";
$result = $pdo->prepare($query);
$result->execute([$post_id]);
$post = $result->fetch();

if (!$post) {
    die(translateText("پست مورد نظر یافت نشد.",$langCode));
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$lang['arian-car']?> | <?= translateText(htmlspecialchars($post->name),$langCode) ?></title>
    <link rel="shortcut icon" href="<?=url('shop-img/Arian Tune.webp')?>" type="image/x-icon">
</head>
<body>

<?php require("../head & foot/header.php"); ?>

<div class="post-cont">
    <div class="name-img">
        <img src="<?= asset($post->image) ?>" alt="" class="post_img">
        <section>
            <span><?= translateText(htmlspecialchars($post->name),$langCode) ?></span>
        </section>
    </div>

    <div class="post-body">
        <section>
            <span><?=$lang['Description']?></span>
            <p><?= translateText(htmlspecialchars($post->body),$langCode) ?></p>
            <span><?= number_format($post->price) . translateText(" تومان",$langCode) ?></span>
        </section>
        <article>
            <a href="<?= url('products page/buy product.php?post_id=' . $post->id) ?>"><?=$lang['buy']?></a>
            <a href="<?= url('products page/product comment.php?post_id=' . $post->id) ?>"><?=translateText('مشاهده نظرها',$langCode)?></a>
        </article>
    </div>
</div>

<div class="white-black-bar"></div>

<div class="posts">
    <section><span><?=$lang['category-post']?></span></section>
    <section>
        <?php
        $cat_id = $post->cat_id;
        $query = "SELECT * FROM posts WHERE status = 10 AND cat_id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$cat_id]);
        $related_posts = $stmt->fetchAll();

        foreach ($related_posts as $item): ?>
            <section class="post">
                <div class="post-img">
                    <img src="<?= asset($item->image) ?>" alt="">
                    <?php if ($item->special === 10): ?>
                        <img src="<?= url('shop-img/special-icon.png') ?>" alt="" id="special-img">
                    <?php endif; ?>
                </div>
                <div class="post-data">
                    <span class="post-text"><?= translateText(htmlspecialchars($item->name),$langCode) ?></span>
                    <span class="post-price"><?= number_format($item->price) . translateText(" تومان",$langCode) ?> </span>
                    <a href="<?= url('products page/product page.php?post_id=' . $item->id) ?>" class="post-btn"><?=$lang['view']?></a>
                </div>
            </section>
        <?php endforeach; ?>
    </section>
</div>

<?php require('../head & foot/footer.php'); ?>

</body>
</html>

<?php if($langCode==='en'){
            $align='start';
        }else{
            $align='end';
        }
    ?>

<style>
    .white-black-bar{
    width: 100%;
    height: 70px;
    background: repeating-linear-gradient(-45deg, #212529, #000 10px, #fff 10px 20px);
    }
    .post-cont{
        width: 100%;
        height: 170vh;
    }
    .name-img{
        width: 100%;
        height: 50%;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .post_img{
        width: 100%;
        height: 100%;
        position: absolute;
    }
    .name-img>section{
        width: 100%;
        height: 100%;
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        font:40px 'digi';
        color: white;
    }
    .name-img span{
        background-color: #000;
    }
    .post-body{
        width: 100%;
        height: 50%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-direction: column;
        background-color: #000;
        padding: 30px 0px;
        color: white;
    }
    .post-body>section{
        width: 60%;
        height: 80%;
        border-top: 1px solid white;
        border-bottom: 1px solid white;
        overflow-y: scroll;
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        align-items: center;
        padding: 5px 0px;

    }
    .post-body>section>span{
        font: 23px 'digi';
        height: 10%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .post-body>section>span:last-child{
        border-top:1px solid white ;
    }
    .post-body>section>p{
        width: 100%;
        height: 70%;
        font: 15px 'digi';
        text-align: <?=$align?>;
    }
    .post-body>article>a{
        width: 130px;
        height: 50px;
        background-color: darkcyan;
        text-decoration: none;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font: 15px 'digi';
        border-radius: 5px;

    }
    .post-body>article{
        display: flex;
        width: 60%;
        justify-content: space-around;
    }
    .post-body a:hover{
        color: #000;
    }
    .posts{
        width: 100%;
        min-height: 100vh;

    }
    .posts>section:first-child{
        width: 100%;
        height: 10%;
        display: flex;
        justify-content: center;
        align-items: center;
        font:40px 'digi';
        color: white;
        margin-top: 30px;
    }
    .posts>section:first-child>span{
        background-color: #212529;
    }
    .posts>section:last-child{
        margin-top: 30px;
        width: 100%;
        display: flex;
        align-items: center;
        flex-direction: column;
        gap: 30px;
    }
    .post{
        width: 350px;
        height: 500px;
        flex-grow: 0;
        flex-shrink: 0;
        background-color: whitesmoke;
        border-radius: 10px;
        box-shadow: 3px 3px 8px lightgray,-3px -3px 5px lightgray;
        

    }
    .post-img{
        width: 100%;
        height: 350px;
        border-radius: 10px 10px 0px 0px;
        position: relative;
        display: flex;
        justify-content:start;
        align-items:start;


    }
    .post-img>img{
        width: 100%;
        height: 100%;
        position: absolute;
        border-radius: 10px 10px 0px 0px;
    }
    #special-img{
        width: 50px;
        height: 50px;
        z-index: 100;
        margin: 10px;
        position: absolute;
    }
    .post-data{
        width: 100%;
        height: 150px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;

    }
    .post-data>span{
        width: 90%;
        height: 20px;
        font-family: 'digi';
        display: flex;justify-content: center;align-items: center;
        font-size: 15px;
        overflow: hidden;

    }
    .post-btn{
        width: 90%;
        height: 40px;
        background-color: #0dcaf0;
        border-radius: 5px;
        font-family: 'digi';
        font-size: 25px;
        text-decoration: none;
        color: white;
        display: flex;justify-content: center;align-items: center;
        margin-bottom: 5px;

    }
    .post-btn:hover{
        color: black;
    }
    @media screen and (min-width:360px) and (max-width:800px){
        .post-body>section{
            width: 90%;
        }
        .post-body>article{
            width: 90%;
        }
    }
</style>