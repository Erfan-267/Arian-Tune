<?php 
require_once '../helpers.php';
require_once '../pdo.php';?>
<?php include_once '../language/confing.php'; ?>
<header class="head-cont">
        <div class="head-link-cont-mobile">
            <a class="head-link-btn" href="<?= url('index/search page.php') ?>">
                <img src="<?= url('shop-img/three line.png') ?>" alt="">
            </a>
        </div>
        <div class="head-link-cont">
            
            <a class="hover-yellow" href="<?= url('products page/products page(all).php') ?>"><?=$lang['product']?></a>
            <a class="hover-yellow" href="<?= url('conncat/about us.php')?>"><?=$lang['about']?></a>
            <a class="hover-yellow" href="<?= url('conncat/regulations.php')?>"><?=$lang['regulations']?></a>
            <a class="hover-yellow" href="<?= url('conncat/conncat.php') ?>"><?=$lang['conncat']?></a>
            
        </div>
        <div class="logo-cont" >
            <div class="name-logo">
                <a href="<?= url('index/index.php') ?>" class="logo-link">
                    <span class="char-name">A</span>
                    <span class="char-name">R</span>
                    <span class="char-name">I</span>
                    <span class="char-name">A</span>
                    <span class="char-name">N</span>
                    <span class="char-name">T</span>
                    <span class="char-name">U</span>
                    <span class="char-name">N</span>
                    <span class="char-name">E</span>
                    
                </a>
                
            </div>
            
        </div>
        <div class="login">
        
             
            <?php 
            global $pdo;
            if(isset($_SESSION['user'])){
                $session_email = $_SESSION['user'];
                $code="SELECT email FROM users WHERE email = ?";
                $stmt = $pdo->prepare($code);
                $stmt->execute([$session_email]);
                if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $email_from_db = $row['email'];
                $link = url("login_sign/account.php?user_email=") . urlencode($email_from_db);
                
                
                }}else{$link =url('login_sign/login.php');}?>
                <a class="your-accont" href="<?= $link?>">
                    <img src="<?= url('shop-img/login.png') ?>" alt="">
                </a>
            <form method="post">
            <select name="lang" onchange="this.form.submit()">
            <option value="fa" <?php if ($langCode == 'fa') echo 'selected'; ?>>فارسی</option>
            <option value="en" <?php if ($langCode == 'en') echo 'selected'; ?>>English</option>
            <option value="ar" <?php if ($langCode == 'ar') echo 'selected'; ?>>العربی</option>
            </select>
            </form>
            
        </div>
        
    </header>
    <div class="ezafi" ></div>

<style>

    .ezafi{
    width: 100%;
    height: 15vh;
    background-color: brown;
}
    .head-cont{
    width: 100%;
    height: 15vh;
    background-color: black;
    display: flex;
    justify-content: space-between;
    color: white;
    align-items: center;
    position: fixed;
    z-index: 1000;
    overflow: hidden;
}
.head-link-cont{
    margin-left: 20px;
    width: 30%;
    height: 100%;
    display: flex;
    justify-content: space-around;
    align-items: center;
    font-size: 20px;
    font-family: "digi";
    
}
.head-link-cont>a{
    text-decoration: none;
    color: white;
}
.logo-cont{
    width: 30%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 40px;
}
.logo{
    height: 60px;
    width: 60px;
}

.your-accont{
    width: 50px;
    height: 50px;
    margin-right: 10px;

}

.your-accont>img{
    width: 100%;
    height: 100%;
    background-color: white;
    border-radius: 50%;
    border: 1px black solid;
}
.login{
    width: 30%;
    height: 100%;
    display: flex;
    justify-content: end;
    align-items: center;
    gap: 10px;
    cursor: pointer;
}
.login>form>select{
width: 50px;
height: 25px;
margin-right: 10px;
background-color:black;
color: white;
font: 13px'digi';
border: 1px white solid;
border-radius: 2px;
}
@keyframes logo-ani{
    0%{
        transform: translateY(10px);
        
    }
    100%{
        transform: translateY(-10px);
    }
}
.char-name{
    display: inline-block;
    animation: logo-ani infinite 1s alternate;
    font-family: 'reza';

}
.char-name:nth-child(2){
    animation-delay: 0.2s;
}
.char-name:nth-child(3){
    animation-delay: 0.4s;
}
.char-name:nth-child(4){
    animation-delay: 0.6s;
}
.char-name:nth-child(5){
    animation-delay: 0.8s;
}

.char-name:nth-child(6){
    animation-delay: 1s;
}
.char-name:nth-child(7){
    animation-delay: 1.2s;
}
.char-name:nth-child(8){
    animation-delay: 1.4s;
}
@font-face {
    font-family: "reza";
    src: url("<?= url('font/Facon Font ( www.rezagraphic.ir )/Facon Font ( www.rezagraphic.ir )/Facon Font ( www.rezagraphic.ir ).ttf')?>");
    
    
}
.head-link-btn{
    
    width: 40px;
    height: 40px;
    background-color: black;
    color: white;
    /* font-size: 30px; */
    border:none;
    cursor: pointer;
}
.head-link-btn>img{
width: 40px;
height: 40px;
}
.logo-link{
    text-decoration: none;
    color: white;
}
.hover-yellow:hover{
color: yellow;
cursor: pointer;
}
.head-link-cont-mobile{
    display: none;
}

@media screen and (max-width:800px) and (min-width:360px){
    .head-link-cont-mobile{
        display: inline-block;
        width: 15%;
        
    }

    .head-link-cont{
        display: none;
    }
    .logo-cont{
        width: 40%;
        
    }
    .login{
        width: 20%;
        justify-content: space-around;
        align-items: center;
        flex-direction: column;
        gap: 0px;
    }
    .login>form>select{
        width: 43px;
        height: 20px;
        font-size: 10px;
    }
    .head-link-btn{
        width: 40px;
        height: 40px;
    }
    .char-name{
        font-size: 12px;
    }
    .your-accont{
        width: 40px;
        height: 40px;
    }
    
}
@media screen and (max-width:1000px) and (min-width:801px){
    .char-name{
        font-size: 25px;
    }
    .hover-yellow{
        font-size: 15px;
    }
}
@media screen and (max-width:448px) and (min-width:360px){
    .char-name{
        font-size: 12px;
    }
    .logo-cont{
        width: 45%;
    }
}
@media screen and (max-width:800px) and (min-width:449px){
    .char-name{
        font-size: 15px;
    }
}
</style>



