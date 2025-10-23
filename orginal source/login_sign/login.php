<?php
session_start();
require_once '../helpers.php';
require_once '../pdo.php';

include_once '../language/confing.php'; 

global $pdo;


if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
}
$error='';
if(
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['password']) && !empty($_POST['password'])
){
    $query="SELECT * FROM users WHERE email=?";
    $result=$pdo->prepare($query);
    $result->execute([$_POST['email']]);
    $user=$result->fetch();
    if($user !== false){
        if(password_verify($_POST['password'],$user->password)){
            $_SESSION['user']=$user->email;


           
            redirect("login_sign/account.php?user_email=".$user->email);
        }else{
            $error=translateText('گذزواژه نادرست است',$langCode);
        }
    }else{
        $error=translateText('ایمیل وارد شده یافت نشد',$langCode);
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
    <title><?=$lang['arian-car']?> | <?=$lang['login']?></title>
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
            color: white;
            font-size: 10px;
            background-color: darkcyan;
            display: flex;justify-content: center;align-items: center;

        }
        .form-cont button:hover{
            box-shadow: 2px 2px 10px 2px darkcyan;
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
     <div class="login-cont">
        <span><?=$lang['login']?></span>
        <form action="<?=url('login_sign/login.php')?>" method="post" class="login-form">
            <small><?php if(!empty($error)) echo($error) ?></small>
            <input type="email" name="email" id="email" placeholder='<?=$lang['email']?>'>
            
            <input type="password" name="password" id="password" placeholder='<?=$lang['password']?>'>
            
            <button class="send-login-btn" type="submit"><?=$lang['send']?></button>
            
        </form>
        <a href="<?=url('login_sign/register.php')?>" class="to-sign-btn"><?=$lang['create-account']?></a>

     </div>
     
    </div>
    </section>
    






    <?php require '../head & foot/footer.php' ?>


    
</body>
</html>