<?php 
require_once '../helpers.php';
require_once '../pdo.php';
require_once '../check-account.php';
include_once '../language/confing.php'; 
// session_start();

if(!isset($_GET['post_id'])){
    redirect('products page/product page.php');
}
global $pdo;
        $query="SELECT * FROM posts WHERE status=10 AND id=?";

        $result=$pdo->prepare($query);
        $result->execute([$_GET['post_id']]);
        $post=$result->fetch();
        if($post !== false){
        
        $user=$_SESSION['user'];
        if(isset($_POST['comment'])&&!empty($_POST['comment'])){
            $code="INSERT INTO comments SET post_id=?,user_email=?,comment=?,created_at=NOW()";
            $statment=$pdo->prepare($code);
            $statment->execute([$_GET['post_id'],$user,$_POST['comment']]);
        }
        
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$lang['arian-car']?> | <?=$post->name?></title>
    <link rel="shortcut icon" href="../shop-img/Arian Tune.webp" type="image/x-icon">
    <style>
        /* Base Styles */
        body {
            font-family: 'digi', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .cont {
            width: 100%;
            display: flex;
            flex-direction: column;
            padding: 20px;
            box-sizing: border-box;
        }

        .add-comment-cont, .read-comment-cont {
            width: 100%;
            margin-bottom: 20px;
        }

        .add-comment-cont {
            background-color: #000;
            color: white;
            padding: 20px;
            border-radius: 10px;
        }

        .add-comment-cont>section {
            font: 40px 'digi';
            text-align: center;
            margin-bottom: 20px;
        }

        .add-comment-cont form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: center;
        }

        .add-comment-cont label {
            font-size: 30px;
            background-color: darkgray;
            padding: 5px;
        }

        .add-comment-cont textarea {
            width: 80%;
            height: 100px;
            font-size: 16px;
            text-align: center;
            background-color: yellow;
            border: 3px black solid;
            padding: 10px;
            resize: none;
        }

        .add-comment-cont button {
            width: 150px;
            height: 50px;
            background-color: yellow;
            border: 3px black solid;
            border-radius: 5px;
            font: 30px 'digi';
            cursor: pointer;
            color: black;
            transition: background-color 0.3s ease;
        }

        .add-comment-cont button:active {
            background-color: black;
            color: yellow;
        }

        .read-comment-cont {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .comment-box {
            background-color: lightgray;
            border-radius: 10px;
            border: 2px darkgray solid;
            width: 100%;
            max-width: 600px;
            padding: 20px;
            box-sizing: border-box;
        }

        .comment-box > section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 15px;
            margin-bottom: 15px;
        }

        .comment-box > p {
            font-size: 13px;
            line-height: 1.6;
            text-align: right;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .cont {
                padding: 10px;
            }

            .add-comment-cont {
                padding: 15px;
            }

            .add-comment-cont textarea {
                width: 90%;
                height: 80px;
            }

            .add-comment-cont button {
                width: 120px;
                height: 45px;
            }

            .read-comment-cont {
                gap: 15px;
            }

            .comment-box {
                padding: 15px;
            }
        }

        @media (max-width: 480px) {
            .add-comment-cont > section {
                font-size: 30px;
            }

            .add-comment-cont label {
                font-size: 24px;
            }

            .add-comment-cont textarea {
                width: 95%;
                height: 70px;
            }

            .add-comment-cont button {
                width: 100px;
                height: 40px;
                font-size: 18px;
            }

            .comment-box {
                padding: 10px;
            }

            .comment-box > section {
                font-size: 13px;
            }

            .comment-box > p {
                font-size: 12px;
            }
        }
        
    </style>
</head>
<body>
    <?php
    require("../head & foot/header.php");
    ?>
    <div class="cont">
        <div class="add-comment-cont">
            <section>
                <span><?=translateText($post->name,$langCode)?></span>
            </section>
            <form action="<?=url('products page/product comment.php?post_id='.$_GET['post_id'])?>" method="post">
                <input type="hidden" name="post_id" value="<?= $_GET['post_id'] ?>">
                <label for=""><?=translateText('نظر خود می توانید در کادر زیر بنویسید',$langCode)?></label>
                <textarea name="comment" id=""></textarea>
                <button type="submit"><?=$lang['send']?></button>
            </form>
        </div>

        <div class="read-comment-cont">
            <?php 
            $code="SELECT comments.*,users.username AS user_name FROM comments LEFT JOIN users ON comments.user_email = users.email WHERE comments.post_id = ?";
            $result=$pdo->prepare($code);
            $result->execute([$_GET['post_id']]);
            $comment=$result->fetchAll();
            foreach($comment as $item){
            ?>
            <section class="comment-box">
                <section><span><?=$item->created_at?></span><span><?=$item->user_name?></span></section>
                <p><?=translateText($item->comment,$langCode)?></p>
            </section>
            
            <?php } ?>
        </div>
    </div>

    <?php
    require ('../head & foot/footer.php');
    ?>
</body>
</html>
<?php } ?>
