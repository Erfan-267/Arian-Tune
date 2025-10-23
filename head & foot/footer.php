<?php include_once '../language/confing.php'; ?>
<footer class="end-cont">
                <div class="end-link-cont">
                    <a class="products hover-glay" href="<?= url('products page/products page(all).php') ?>"><?=$lang['product']?></a>
                    
                    <!-- <a class="help hover-glay" href="">راهنمای</a> -->
                    <a class="call hover-glay" href="<?= url('conncat/conncat.php') ?>"><?=$lang['conncat']?></a>
                    <!-- <a class="comnt hover-glay" >تجربه شما</a> -->
                    <a class="fitments hover-glay" href="<?= url('conncat/about us.php')?>"><?=$lang['about']?></a>
                    <a class="help hover-glay" href="<?= url('conncat/regulations.php')?>"><?=$lang['regulations']?></a>
                    
                </div>
                <h5 class="end-text"> </h5>
</footer>

<style>
.end-cont{
    width: 100%;
    height: 35vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.end-link-cont{
    width: 100%;
    height: 85%;
    display: flex;
    justify-content: space-around;
    align-items: center;
    font-size: 30px;
    font-family: 'digi';
}
.hover-glay{
    background-color: black;
    cursor: pointer;
    text-decoration: none;
    color: white;

}
.hover-glay:hover{
    color: darkcyan;
}
@media screen and (max-width:448px) and (min-width:360px){
    .end-cont{
        height: 85vh;
    }
    .end-link-cont{
        flex-direction: column;
    }
}
</style>
<script>
let sal=new Date();
let salll=sal.getFullYear();
document.querySelector('.end-text').innerHTML=`${salll},ArianTune-IR`
</script>