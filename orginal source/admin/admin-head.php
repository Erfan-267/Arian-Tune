<?php require_once '../helpers.php';
require_once '../check-account.php';?>
<div class="admin-head">
    <span class="admin-text">panel admin (arian tune)</span>
    <a href="<?= url('index/index.php')?>" class="go-to-shop">shop</a>
</div>


<style>
    .admin-head{
        width: 100%;
        height: 50%;
        background-color: yellow;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0px 20px;
        font-size: 30px;
        font-family: 'reza';

    }
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    .go-to-shop{
        text-decoration: none;
        background-color: white;
        color: yellow;
        height: 80%;
        width: 20%;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
    }
    @media screen and (min-width:360px) and (max-width:500px) {
        .admin-head{
            font-size: 15px;
        }
    }
    @media screen and (min-width:500px) and (max-width:1064px){
        .admin-head{
            font-size: 20px;
        }
    }
</style>