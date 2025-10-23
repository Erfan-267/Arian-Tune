<?php require_once '../helpers.php';
require_once '../check-account.php';?>

<section class="slidebar-cont">
    <a href="<?=url('admin/products.php')?>" class="slide-link">محصولات</a>
    <a href="<?=url('admin/users.php')?>" class="slide-link">مشتریان</a>
    <a href="<?=url('admin/orders.php')?>" class="slide-link">سفارشات</a>
    <a href="<?=url('admin/comment.php')?>" class="slide-link">تجربه مشتریان</a>
    <a href="<?=url('admin/category.php')?>" class="slide-link">دسته بندی ها</a>
</section>


<style>
    .slidebar-cont{
        width: 100%;
        height: 50%;
        background-color: lightgray;
        display: flex;
        justify-content: space-around;
        align-items: center;

    }
    .slide-link{
        text-decoration: none;
        color:black ;
        font: 30px 'digi';

    }
    @media screen and (min-width:360px) and (max-width:500px) {
        .slide-link{
            font-size: 15px;
        }
    }
    @media screen and (min-width:500px) and (max-width:1064px){
        .slide-link{
            font-size: 20px;
        }
    }

</style>