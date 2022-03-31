<?php
    require_once("../connection.php");
    if(isset($_GET['Del'])){
        $categoryId = $_GET['Del'];
        $query = "delete from tbl_category where id_category='".$categoryId."'";
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