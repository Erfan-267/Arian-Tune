<?php require_once ('../helpers.php');
session_start();?>
<?php include_once '../language/confing.php'; ?>


<!DOCTYPE html>
<html lang="<?php echo $langCode; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$lang['arian-car']?> | <?=translateText('محصولات و لوازم جانبی ماشین',$langCode)?></title>
    <link rel="stylesheet" href="<?=url('asset/style.css')?>">
    <link rel="shortcut icon" href="<?= url('shop-img/Arian Tune.webp')?>" type="image/x-icon">
</head>
<body>
    <!-- header: -->
    <?php
    require_once('../head & foot/header.php')
    ?>
    
    <!-- end header. -->
    
        
        <div class="leader-sun-cont " id="asdfgh">
            <div class="show-video-cont">
                <video src="<?=url('shop-img/background.mp4')?>" class="video-background" loop autoplay muted poster="<?= url('shop-img/sep09.jpg')?>"></video>
                <div class="text-cont">
                    <h1 class="head-text" ><?=$lang['title-index']?></h1>
                    <div class="join">
                        <h2><?=$lang['arian product']?></h2>
                        <a href="<?= url('products page/products page(all).php') ?>" class="join-products"><?=$lang['view']?></a>
                    </div>
                </div>
            </div>
            <div class="white-black-bar"></div>
            <div class="bar-animtion">
                <div class="bar-img">
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-01.webp')?>" alt=""></div>
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-02.webp')?>" alt=""></div>
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-03.webp')?>" alt=""></div>
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-04.webp')?>" alt=""></div>
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-06.webp')?>" alt=""></div>
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-07.webp')?>" alt=""></div>
                </div>
                <div class="bar-img">
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-01.webp')?>" alt=""></div>
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-02.webp')?>" alt=""></div>
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-03.webp')?>" alt=""></div>
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-04.webp')?>" alt=""></div>
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-06.webp')?>" alt=""></div>
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-07.webp')?>" alt=""></div>
                </div>
                <div class="bar-img">
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-01.webp')?>" alt=""></div>
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-02.webp')?>" alt=""></div>
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-03.webp')?>" alt=""></div>
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-04.webp')?>" alt=""></div>
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-06.webp')?>" alt=""></div>
                    <div class="ani-img-cont"><img src="<?= url('shop-img/bar ani/Icons_Fast_Lime-07.webp')?>" alt=""></div>
                </div>
            </div>
            <div class="slide-cont">
                <div class="slider">
                    
                    <div class="slide">
                        <img src="<?= url('shop-img/banilogo2.svg')?>" alt="" class="slide-img">
                        <div class="text-slide">
                            <img src="<?= url('shop-img/banilogo3.svg')?>" alt="" class="banilogo-img">
                            <span class="banilogo-text"><?=translateText('یک تیپ عالی',$langCode)?></span>
                            <span class="banilogo-text"><?=translateText('برای راننده عالی',$langCode)?></span>
                            <a href="https://www.banimode.com" class="banilogo-link" target="_blank"><?=$lang['view']?></a>
                        </div>
                        <div class="next-slide"><button class="next-btn"><?=$lang['next']?></button></div>
                    </div>
                    <div class="slide">
                        <img src="<?= url('shop-img/Arian Tune.webp')?>" alt="" class="slide-img">
                        <div class="text-slide">
                            <span class="app-text">Arian Tune</span>
                            <p class="app-text2"><?=translateText('آیا می خواهید ما را همیشه داشته باشید',$langCode)?></p>
                            <a href="" class="down-app"><?=translateText('به زودی...',$langCode)?></a>
                        </div>
                        <div class="next-slide"><button class="next-btn"><?=$lang['next']?></button></div>
                    </div>
                    <div class="slide">
                        <img src="<?= url('shop-img/products menu/misc.png')?>" alt="" class="slide-img">
                        <div class="text-slide">
                            <p id="text_slide"><?=translateText('لطفا برای یک خرید خوب و راحت بخش قوانین و مقررات را مطالعه نمایید',$langCode)?></p>
                            
                            <a href="<?=url('conncat?regulations.php')?>" class="banilogo-link"><?=translateText('مطالعه',$langCode)?></a>
                        </div>
                        <div class="next-slide"><button class="next-btn"><?=$lang['next']?></button></div>
                    </div>
                    <div class="slide">
                        <img src="<?= url('shop-img/—Pngtree—vector car icon_4292572.png')?>" alt="" class="slide-img">
                        <div class="text-slide">4</div>
                        <div class="next-slide"><button class="next-btn"><?=$lang['next']?></button></div>
                    </div>
                </div>
            </div>
            <div class="collections">
                <div class="title">
                    <span><?=$lang['collections']?></span>
                    <span><?=$lang['arian-car']?></span>
                </div>
                <div class="collec-products">
                    <div class="collec-opt"><img src="<?= url('shop-img/steering_collc.webp')?>" alt="steering"><a href="<?= url('products page/products page.php?cat_id=1')?>" class="link-opt"><span><?=$lang['steering']?></span></a></div>
                    <div class="collec-opt"><img src="<?= url('shop-img/gear_lever.jpg')?>" alt="gear lever"><a href="<?= url('products page/products page.php?cat_id=2')?>" class="link-opt"><span><?=$lang['gear-lever']?></span></a></div>
                    <div class="collec-opt"><img src="<?= url('shop-img/light car 2.jpg')?>" alt="light"><a href="<?= url('products page/products page.php?cat_id=4')?>" class="link-opt"><span><?=$lang['light']?></span></a></div>
                    <div class="collec-opt"><img src="<?=url('shop-img/car accessories.webp')?>" alt=""><a href="<?= url('products page/products page.php?cat_id=5')?>" class="link-opt"><span><?=$lang['accessory']?></span></a></div>
                    <div class="collec-opt"><img src="<?=url('shop-img/car Detergent.jpg')?>" alt=""><a href="<?= url('products page/products page.php?cat_id=6')?>" class="link-opt"><span><?=$lang['detergent']?></span></a></div>
                    <div class="collec-opt"><img src="<?=url('shop-img/rim bolt.webp')?>" alt=""><a href="<?= url('products page/products page.php?cat_id=3')?>" class="link-opt"><span><?=$lang['rim-bolt']?></span></a></div>
                </div>
            </div>
            <div class="white-black-bar"></div>
            <div class="comment-view" id="comment-view">
                <div class="title"><span><?=$lang['customers-experience']?></span></div>
                <div class="comment-cont">
                    <div class="show-comment">
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
            </div>
            <?php
            require_once ('../head & foot/footer.php');
            ?>
        </div>
    

    <script>
        let nextSlide=document.querySelectorAll('.next-btn');
let slideMove=document.querySelector('.slider');
nextSlide[0].addEventListener('click',()=>{
    slideMove.style.translate ="-25%"
})
nextSlide[1].addEventListener('click',()=>{
    slideMove.style.translate= "-50%";
})
nextSlide[2].addEventListener('click',()=>{
    slideMove.style.translate= "-0%";
})
// nextSlide[3].addEventListener('click',()=>{
//     slideMove.style.translate= "-0%";
// })

function language(){
    var r= confirm("(this language is persian)Do you want to change the language?");
    if(r==true){
     window.location="http://localhost/shop/Arian%20Car/language.php"
    }
}

    </script>
    
</body>
<style>

</style>

</html>