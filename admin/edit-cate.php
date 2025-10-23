<?php
require_once '../helpers.php';
require_once '../pdo.php';
require_once '../check-account.php';
require_once '../check-admin.php';



global $pdo;
if(!isset($_GET['cat_id'])){
    redirect('admin/category.php');
}
$code="SELECT * FROM categories WHERE id=?";
$result=$pdo->prepare($code);
$result->execute([$_GET['cat_id']]);
$category=$result->fetch();
if($category === false){
    redirect('admin/category.php');

}
if(isset($_POST['name']) && !empty($_POST['name'])){
    if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
        $allow=['png', 'jpeg','jpg','gif','svg'];
        $imgMine=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
        if(!in_array($imgMine,$allow)){
            redirect('admin/category.php');
                
        }
        $basePath=dirname(dirname(__DIR__));
        if(file_exists($basePath . $category->image)){
            unlink($basePath . $category->image);
        }
        $image='/Arian Tune/image/'. date('y_m_d_H_i_s') .'.' . $imgMine;
        $img_uplode=move_uploaded_file($_FILES['image']['tmp_name'],$basePath .$image);
        if($img_uplode !== false){
            $query="UPDATE categories SET `name`=? , `image`=? WHERE id=?";
            $statment=$pdo->prepare($query);
            $statment->execute([$_POST['name'],$image,$_GET['cat_id']]);
        }
    }else{
        $query="UPDATE categories SET name=?  WHERE id=?";
        $statment=$pdo->prepare($query);
        $statment->execute([$_POST['name'],$_GET['cat_id']]);
    }
    redirect('admin/category.php');

}

$basePath=dirname(dirname(__DIR__));
echo $basePath;


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
        <form action="<?=url("admin/edit-cate.php?cat_id=").$_GET['cat_id']?>" method="post"  enctype="multipart/form-data">
            <span>edit</span>
            <input type="text" value="<?=$category->name?>" name="name">
            <input type="file" name="image">
            <img src="<?=asset($category->image)?>" alt="">
            <button type="submit">edit</button>
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
        height: 80vh;
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
        height: 50px;
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
    form>img{
        width: 100px;
        height: 100px;
        border: 2px black dotted;
    }
</style>