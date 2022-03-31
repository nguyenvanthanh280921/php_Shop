<?php 
    require_once("../connection.php");

    if(isset($_POST['update'])){
        $userId = $_GET['id_user'];
        $userName = $_POST['user_name'];
        $userPassword = $_POST['user_password'];
        $userEmail = $_POST['email'];
        $query= "update tbl_users set user_name='".$userName."', user_password='".$userPassword."',email='".$userEmail."' where id_user='".$userId."'";
        $result = mysqli_query($con,$query);
        
        if($result){
            header("location: index.php");
        }else{
            echo 'Please check ';
        }
    }else{
        header("location: index.php");
    }
?>