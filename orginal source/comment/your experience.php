<?php
// session_start();
require_once '../helpers.php';
require_once '../pdo.php';
require_once '../check-account.php';
include_once '../language/confing.php'; 

if(!isset($_SESSION['user']) ){
    redirect('login_sign/account.php');
}
$error= '';
$done='';
if(isset($_POST['star']) && !empty($_POST['star'])){
    if($_POST['star'] >=1 && $_POST['star'] <= 5){
        global $pdo;
        $code="INSERT INTO stars SET user_email=? , img_num=?";
        $result=$pdo->prepare($code);
        $result->execute([$_SESSION['user'],$_POST['star']]);
        $done=translateText("انجام شد",$langCode);
    }else{
        $error=translateText('عدد باید بین یک الی پنج باشد',$langCode);
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$lang['arian-car']?> | <?=$lang['experience']?></title>
    <link rel="shortcut icon" href="../shop-img/Arian Tune.webp" type="image/x-icon">
</head>
<body>
    <?php require '../head & foot/header.php' ?>
    <div class="cont">
        <div class="give-experience">
            <form action="<?=url('comment/your experience.php?user_email='.$_SESSION['user'])?>" method="post">
                <span><?=$lang['please']?></span>
                <label for=""><?=$lang['1-5']?></label>
                <small><?php if($error !== '') echo $error ;?></small>
                <h6 style="color: green;"><?php if($done !== '') echo $done;?></h6>
                <input type="number" name="star" id="" placeholder="your score...">
                <button type="submit"><?=$lang['send']?></button>
            </form>
        </div>
        <div class="read-experience">
            <?php
            global $pdo;
            $query="SELECT stars.* , users.username AS userName FROM stars JOIN users ON stars.user_email=users.email";
            $statment=$pdo->prepare($query);
            $statment->execute();
            $scores=$statment->fetchAll();
            foreach($scores as $item){
            ?>
            <section class="comment">
            <span class="span"><?=$item->userName?></span>
            <img src="<?=url("shop-img/stars/star-$item->img_num.svg")?>" alt="" class="stars">
            </section>
            <?php } ?>
            
        </div>
    </div>
    <?php require '../head & foot/footer.php' ?>
</body>
</html>
<style>
    .comment{
        width: 300px;
        height: 150px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-direction: column;
        background-color: black;
        border-radius: 10px;
        font: 30px 'digi';
        color: yellow;
        flex-shrink: 0;
    }
    .stars{
        width: 90%;
        height: 90%;
    }
    .give-experience{
        width: 100%;
        height: 70vh;
    }
    .give-experience>form{
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 30px;
        border-bottom: 2px solid gray;
    }
    form>span{
        font: 35px 'digi';
        background-color: black;
        color: white;
    }
    form>label{
        font: 27px 'digi';
        background-color: gray;
        color: white;
    }
    form>input{
        width: 200px;
        height: 50px;
        background-color: yellow;
        border: 5px solid black;
        border-radius: 20px;
        text-align: center;
    }
    .read-experience{
        width: 100%;
        min-height: 85vh;
        display: flex;
        justify-content: space-around;
        padding: 30px;
        gap: 30px;
        flex-wrap: wrap;
        /* overflow: scroll; */

    }
    form>small{
        color: red;
    }
    form>button{
        width: 100px;
        height: 50px;
        background-color: yellow;
        border: 5px solid black;
        font: 27px 'digi';
        border-radius: 20px;
    }
    form>button:active{
        background-color: black;
        border: 5px solid yellow;
        color: yellow;
    }
</style>