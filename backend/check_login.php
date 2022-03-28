<?php 
    session_start();
    if($_SESSION['user_login'] == false or !isset($_SESSION['user_login'])){
        if(!empty($_COOKIE['user_name']) && (!empty($_COOKIE['user_name']))){
            if($_COOKIE['user_name'] == 'Thanhnv' && $_COOKIE['password'] == 'thanhnv2001'){
                $_SESSION['user_name'] = true;
                $_SESSION['name'] = $_COOKIE['name'];
            }
        }
        Location('./admin/login.php');
    }
?>
