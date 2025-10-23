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
    if($post !== false){
        $special=($post->special ==10) ? 0:10;
        $code="UPDATE posts SET `special`=? WHERE id=?";
        $statement=$pdo->prepare($code);
        $statement->execute([$special,$_GET['post_id']]);

    }
}
redirect('admin/products.php');



?>