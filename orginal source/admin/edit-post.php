<?php require_once '../helpers.php';
require_once '../pdo.php';
require_once '../check-account.php';
require_once '../check-admin.php';

global $pdo;
if(!isset($_GET['post_id'])){
    redirect('admin/edit-post.php');
}
$query="SELECT * FROM posts WHERE id=?";
$result=$pdo->prepare($query);
$result->execute([$_GET['post_id']]);
$post=$result->fetch();
if($post === false){
    redirect('admin/edit-post.php');

}
if(
    isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_POST['price']) && !empty($_POST['price']) &&
    isset($_POST['cat_id']) && !empty($_POST['cat_id']) &&
    isset($_POST['body']) && !empty($_POST['body'])
){
    $query="SELECT * FROM categories WHERE id=?";
    $result=$pdo->prepare($query);
    $result->execute([$_POST['cat_id']]);
    $category=$result->fetch();
    if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
        $allow=['png', 'jpeg','jpg','gif','svg'];
        $imgMine=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
        if(!in_array($imgMine,$allow)){
            redirect('admin/products.php');
                
        }
        $basePath=dirname(dirname(__DIR__));
        if(file_exists($basePath . $category->image)){
            unlink($basePath . $category->image);
        }
        $image='/Arian Tune/image/'. date('y_m_d_H_i_s') .'.' . $imgMine;
        $img_uplode=move_uploaded_file($_FILES['image']['tmp_name'],$basePath .$image);
        if($category !==false && $img_uplode !== false){
            $code="UPDATE posts SET name=? , price=? , cat_id=? , body=? , image=? WHERE id =?";
            $statment=$pdo->prepare($code);
            $statment->execute([$_POST['name'],$_POST['price'],$_POST['cat_id'],$_POST['body'],$image,$_GET['post_id']]);

        }
    }else{
        if($category !== false){
            $code="UPDATE posts SET name=? , price=? , cat_id=? , body=?  WHERE id =?";
            $statment=$pdo->prepare($code);
            $statment->execute([$_POST['name'],$_POST['price'],$_POST['cat_id'],$_POST['body'],$_GET['post_id']]);
        }
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
        <form action="<?=url("admin/edit-post.php?post_id=").$_GET['post_id']?>" method="post" enctype="multipart/form-data">
            <span>create</span>
            <input type="text" name="name" placeholder="name..." value="<?=$post->name?>">
            <input type="number" name="price" placeholder="price..." value="<?=$post->price?>">
            <input type="file" name="image" >
            <img src="<?=asset($post->image)?>" alt="">
            <textarea name="body" id="" placeholder="body.." ><?=$post->body?></textarea>
            <select name="cat_id" id="">
            <?php
                global $pdo;
                $query="SELECT * FROM categories";
                $result=$pdo->prepare($query);
                $result->execute();
                $cate=$result->fetchAll();
                 foreach($cate as$item){
                ?>
                    <option value="<?=$item->id?>" <?php  if($item->id == $post->cat_id){ echo'selected';} ?> ><?=$item->name?></option>

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
    form>img{
        width: 100px;
        height: 100px;
        border: 2px black dotted;
    }
</style>