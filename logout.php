<?php 
session_start();



require_once 'helpers.php';
// global $pdo;
session_destroy();
redirect('login_sign/login.php');
?>