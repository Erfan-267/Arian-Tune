<?php require_once '../helpers.php';
require_once '../pdo.php';
require_once '../check-account.php';
require_once '../check-admin.php';


if(
    isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_POST['price']) && !empty($_POST['price']) &&
    isset($_POST['cat_id']) && !empty($_POST['cat_id']) &&
    isset($_POST['body']) && !empty($_POST['body']) &&
    isset($_FILES['image']) && !empty($_FILES['image']['name'])
){
global $pdo;
$code="SELECT * FROM categories WHERE id=?";
$statment=$pdo->prepare($code);
$statment->execute([$_POST['cat_id']]);
$category=$statment->fetch();
$allow=['png', 'jpeg','jpg','gif','svg'];
$imgMine=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
if(!in_array($imgMine,$allow)){
    redirect('admin/products.php');
}
$basePath=dirname(dirname(__DIR__));
$image='/Arian Tune/image/'. date('y_m_d_H_i_s') .'.' . $imgMine;
$img_uplode=move_uploaded_file($_FILES['image']['tmp_name'],$basePath .$image);
if($img_uplode !==false){
    $code="INSERT INTO posts SET name=?,price=?,image=?,body=?,cat_id=?,created_at=NOW()";
    $statment=$pdo->prepare($code);
    $statment->execute([$_POST['name'],$_POST['price'],$image,$_POST['body'],$_POST['cat_id']]);

}
redirect('admin/products.php');


}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="require">
        <?php include_once 'admin-head.php'?>
        <?php require_once 'admin-slide.php'?>
    </div>
    <div class="cont">
        <form action="<?=url('admin/create-post.php')?>" method="post" enctype="multipart/form-data">
            <span>create</span>
            <input type="text" name="name" placeholder="name...">
            <input type="number" name="price" placeholder="price...">
            <input type="file" name="image" >
            <textarea name="body" id="" placeholder="body.."></textarea>
            <select name="cat_id" id="">
            <?php
                global $pdo;
                $query="SELECT * FROM categories";
                $result=$pdo->prepare($query);
                $result->execute();
                $cate=$result->fetchAll();
                 foreach($cate as$item){
                ?>
                    <option value="<?=$item->id?>"><?=$item->name?></option>

                <?php } ?>
            </select>
            <button type="submit">create</button>
        </form>
    </div>
</body>
</html>
<style>
    .require{
            width: 100%;
            height: 20vh;
    }
    .cont{
            width: 100%;
            min-height: 80vh;
    }
    form{
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-direction: column;
        font: 30px 'digi';
    }
    form>input{
        width: 250px;
        height: 30px;
        text-align:center ;
        
    }
    form>button{
        width: 100px;
        height: 50px;
        font: 20px 'digi';
        color: yellow;
        background-color: black;
        border-radius: 5px ;
        border: 5px solid yellow;
        cursor: pointer;
    }
    form>textarea{
        width: 300px;
        height: 150px;
    }
</style>