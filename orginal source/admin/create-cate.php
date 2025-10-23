<?php
require_once '../helpers.php';
require_once '../pdo.php';
require_once '../check-account.php';
require_once '../check-admin.php';







if (
    isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_FILES['image']) && !empty($_FILES['image']['name'])
) {
    
    $allow=['png', 'jpeg','jpg','gif','svg'];
    $imgMine=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
    if(!in_array($imgMine,$allow)){
        redirect('admin/category.php');
    }
    $basePath=dirname(dirname(__DIR__));
    $image='/Arian Tune/image/'. date('y_m_d_H_i_s') .'.' . $imgMine;
    $img_uplode=move_uploaded_file($_FILES['image']['tmp_name'],$basePath .$image);
    if($img_uplode !== false){
        global $pdo;
        $code="INSERT INTO `categories` SET name=? , image=? , created_at=NOW()";
        $result=$pdo->prepare($code);
        $result->execute([$_POST['name'],$image]);


    }
    redirect('admin/category.php');
}else{
    if(!empty($_GET)){
        echo 'error';
    }
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
        <form action="<?=url('admin/create-cate.php')?>" method="post" enctype="multipart/form-data">
            <span>create:</span>
            <input type="text" name="name" id="name" placeholder="name...">
            <input type="file" name="image" id="image">
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
</style>