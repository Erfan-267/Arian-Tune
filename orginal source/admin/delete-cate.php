<?php
require_once '../helpers.php';
require_once '../pdo.php';
require_once '../check-account.php';
require_once '../check-admin.php';


global $pdo;
if(isset($_GET['cat_id'])&& !empty($_GET['cat_id'])){
    $query="SELECT * FROM categories WHERE id=?";
    $result=$pdo->prepare($query);
    $result->execute([$_GET['cat_id']]);
    $cat=$result->fetch();
    $basePath=dirname(dirname(__DIR__));
    if(file_exists($basePath . $cat->image)){
        unlink($basePath . $cat->image);
    }
    $code="DELETE FROM categories WHERE id=?";
    $result=$pdo->prepare($code);
    $result->execute([$_GET['cat_id']]);
}

redirect('admin/category.php');


?>