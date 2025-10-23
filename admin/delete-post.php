<?php 
require_once '../helpers.php';
require_once '../pdo.php';
require_once '../check-account.php';
require_once '../check-admin.php';



global $pdo;
if(isset($_GET['post_id'])&& !empty($_GET['post_id'])){
    $query="SELECT * FROM posts WHERE id=?";
    $result=$pdo->prepare($query);
    $result->execute([$_GET['post_id']]);
    $post=$result->fetch();
    $basePath=dirname(dirname(__DIR__));
    if(file_exists($basePath . $post->image)){
        unlink($basePath . $post->image);
    }
    $code="DELETE FROM posts WHERE id=?";
    $result=$pdo->prepare($code);
    $result->execute([$_GET['post_id']]);
}


redirect('admin/products.php');


?>