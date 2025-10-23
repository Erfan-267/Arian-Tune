<?php 
session_start();
require_once '../helpers.php';
require_once '../pdo.php';
include_once '../language/confing.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$lang['arian-car']?> | <?=translateText('نتیجه جست و جو',$langCode)?></title>
    <!-- <link rel="stylesheet" href="products page.css"> -->
    <link rel="shortcut icon" href="../shop-img/Arian Tune.webp" type="image/x-icon">
    <style>
       *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
       }
       .collction:nth-child(1)>span{
        color: darkcyan;
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
       
        
    .all_cont{
        width: 100%;
        min-height: 85vh;
        max-height: auto;
        display: flex;justify-content: center;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 20px;
        padding: 20px;
        
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
    #notFound{
        font: 30px 'digi';
    }
    .title-cont{
        width: 100%;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        font: 40px 'digi';
        color: white;
        
    }
    .title-cont>span{
        background-color: black;
    }
    </style>
</head>
<body>
    <!-- header -->
    <?php
    require("../head & foot/header.php");
    ?>
    <!-- header end -->
    
    <div class="title-cont">
        <span><?=translateText('نتیجه جست و جو',$langCode)?></span>
    </div>

    <form method="GET" id="sortForm" class="order-cont">
    <label><?=$lang['sort']?></label>
    <select name="order" onchange="document.getElementById('sortForm').submit()">
        <option value="new" <?=($_GET['order'] ?? '') == 'new' ? 'selected' : ''?>><?=$lang['new']?></option>
        <option value="old" <?=($_GET['order'] ?? '') == 'old' ? 'selected' : ''?>><?=$lang['old']?></option>
        <option value="amzing" <?=($_GET['order'] ?? '') == 'amzing' ? 'selected' : ''?>><?=$lang['special']?></option>
    </select>
    </form>
    <div class="all_cont">
    
    


    
<?php
        global $pdo;

        $order = $_GET['order'] ?? 'new';
        $search = $_GET['q'] ?? null;
        
        switch ($order) {
            case 'old':
                $orderBy = "posts.created_at ASC";
                break;
            case 'amzing':
                $orderBy = "posts.special DESC";
                break;
            case 'cheap':
                $orderBy = "posts.price DESC";
                break;
            case 'Expensive':
                $orderBy = "posts.price ASC";
                break;
            default:
                $orderBy = "posts.created_at DESC";
                break;
        }
        
        $params = [];
        $where = '';
        
        if ($search) {
            $where = "WHERE posts.name LIKE :search OR posts.body LIKE :search";
            $params['search'] = "%$search%";
        }
        
        $query = "SELECT posts.*, categories.name AS cat_name 
                  FROM posts 
                  LEFT JOIN categories ON posts.cat_id = categories.id 
                  $where
                  ORDER BY $orderBy";
        
        $result = $pdo->prepare($query);
        $result->execute($params);
        $posts = $result->fetchAll();
        
        foreach($posts as$item){
    ?>
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
    <?php }
    if (count($posts) === 0) { ?>
        <h2 id="notFound"><?=translateText('محصولی یافت نشد',$langCode)?></h2>
        <?php } ?>
    
     

    </div>
        


    <?php
        require ('../head & foot/footer.php');
    ?>

    
</body>
</html>