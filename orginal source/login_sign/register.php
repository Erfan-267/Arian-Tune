<?php
require_once '../helpers.php';
require_once '../pdo.php';
session_start();
include_once '../language/confing.php'; 
global $pdo;

$error='';
if(
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['username']) && !empty($_POST['username']) &&
    isset($_POST['password']) && !empty($_POST['password']) &&
    isset($_POST['rePassword']) && !empty($_POST['rePassword']) 
){
    if($_POST['password'] === $_POST['rePassword']){
        if(strlen($_POST['password']) >8){
            $query="SELECT * FROM users WHERE email=?";
            $result=$pdo->prepare($query);
            $result->execute([$_POST['email']]);
            $user=$result->fetch();
            if($user === false){
                $code="INSERT INTO users SET email=?,username=?,password=?,created_at=NOW()";
                $statment=$pdo->prepare($code);
                $pass=password_hash($_POST['password'],PASSWORD_DEFAULT);
                $statment->execute([$_POST['email'],$_POST['username'],$pass]);
                redirect('login_sign/login.php');

            }else{
                $error=translateText('این ایمیل قبلا ثبت شده است',$langCode);
            }
        }else{
            $error=translateText('گذزواژه باید حداقل 8 عدد باشد',$langCode);
        }
    }else{
        $error=translateText('گذزواژه با تکرار آن یکی نیست',$langCode);
    }
}else{
    if(!empty($_POST))
    $error=translateText("همه ورودی ها را پر کنید",$langCode);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$lang['arian-car']?> | <?=$lang['register']?></title>
    <link rel="shortcut icon" href="../shop-img/Arian Tune.webp" type="image/x-icon">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .cont{
        width: 100%;
        height: 500px;
        display: flex;
        justify-content: center;
        align-items: center;
        
         }   
        @font-face {
        font-family: "digi";
        src: url("font/Digi-Gafwww.digifonts.ir_/Digi\ Ghaf\ Bold.otf");
        src: url("font/Digi-Gafwww.digifonts.ir_/Digi\ Ghaf\ Bold.ttf");
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
        .form-cont{
            width: 340px;
            height: 450px;
            /* background-color: black; */
            position: relative;
            color: white;
            transition: 1s;
            box-shadow: 2px 2px 20px 2px yellow,-2px -2px 20px 2px yellow;
            border-radius: 20px;
        }
        .login-cont,.sign-in-cont{
            width: 100%;
            height: 100%;
            background-color: black;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border-radius: 20px;
            transition: 1s;

        }
        input{
            background-color: yellow;
            text-align: center;
            width: 80%;
            height: 40px;
            border: none;
            border-radius: 10px;

        }
        .form-cont>div>form>button{
            width: 50%;
            height: 40px;
            font-size: 25px;
            font-family: 'digi';
            
            border-radius: 10px;
            cursor: pointer;
        }
        button{
            color: white;
            background-color: darkcyan;
            border: none;
        }
        .form-cont span{
            width: 100%;
            height: 15%;
            font-size: 40px;
            font-family: 'digi';
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-cont form{
            width: 100%;
            height: 70%;
            display: flex;justify-content: space-evenly;align-items: center;flex-direction: column;
        }
        .to-login-btn,.to-sign-btn{
            height: 25px;
            width: 35%;
            border-radius: 2px;
            text-decoration: none;
            font-size: 10px;
            color: white;
            background-color: darkcyan;
            display: flex;justify-content: center;align-items: center;

        }
        .form-cont button:hover{
            box-shadow: 2px 2px 10px 2px darkcyan;
        }
        .hide{
            display: none;
        }
        form>small{
            color:red;
        }

    </style>
</head>
<body>
    <?php require '../head & foot/header.php' ?>



    <section class="cont">
    <div class="form-cont">
     <div class="sign-in-cont">
        <span><?=$lang['register']?></span>
        <form action="<?=url('login_sign/register.php')?>" method="post" class="sign-form ">
            <small><?php if($error !== '') echo$error ?></small>
            <input type="text" name="username" id="username" placeholder="<?=$lang['username']?>">
            <input type="email" name="email" id="" placeholder="<?=$lang['email']?>">
            <input type="password" name="password" id="password"placeholder="<?=$lang['password']?>">
            <input type="password" name="rePassword" id="rePassword" placeholder="<?=$lang['repassword']?>">
            <button class="send-sign-btn" type="submit"><?=$lang['send']?></button>
        </form>
        <a href="<?=url('login_sign/login.php')?>" class="to-login-btn"><?=$lang['login-account']?></a>

     </div>
    </div>
    </section>
    






    <?php require '../head & foot/footer.php' ?>


    
</body>
</html>