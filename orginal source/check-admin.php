<?php

if(isset($_SESSION['user'])){
    $query="SELECT * FROM users WHERE email=?";
    $result=$pdo->prepare($query);
    $result->execute([$_SESSION['user']]);
    $stat=$result->fetch();
    if($stat->admin !== 1){
        redirect('login_sign/login.php');
    }
}

?>