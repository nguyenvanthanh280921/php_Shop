<?php
    require_once("../connection.php");
    if(isset($_GET['Del'])){
        $userId = $_GET['Del'];
        $query = "delete from tbl_users where id_user='".$userId."'";
        $result = mysqli_query($con,$query);

        if($result){
            header("Location: index.php");
        }else{
            echo 'Please check';
        }
    }else{
        header("Location: index.php");
    }
?>