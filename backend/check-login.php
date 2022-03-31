<?php 
    session_start();
    if(!isset($_SESSION['user_login']) || $_SESSION['user_login'] == false){
        if(!empty($_COOKIE['user_name']) && (!empty($_COOKIE['user_name']))){
            if($_COOKIE['user_name'] == 'Thanhnv' && $_COOKIE['password'] == 'thanhnv2001'){
                $_SESSION['user_name'] = true;
                $_SESSION['name'] = $_COOKIE['name'];
            }
        }
        header("Location: $baseUrl/admin/login.php");
    }
?>
