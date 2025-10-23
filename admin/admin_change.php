<?php

require_once '../helpers.php';
require_once '../pdo.php';
require_once '../check-account.php';
require_once '../check-admin.php';


global $pdo;
if(isset($_GET['user_id'])&& !empty($_GET['user_id'])){
    $query="SELECT * FROM users WHERE id=?";
    $result=$pdo->prepare($query);
    $result->execute([$_GET['user_id']]);
    $user=$result->fetch();
    if($user !== false){
        $status=($user->admin ==1) ? 0:1;
        $code="UPDATE users SET `admin`=? WHERE id=?";
        $statement=$pdo->prepare($code);
        $statement->execute([$status,$_GET['user_id']]);

    }
}
redirect('admin/users.php');

?>