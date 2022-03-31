<?php
    require_once("../connection.php");
    if(isset($_GET['Del'])){
        $productId = $_GET['Del'];
        $query = "delete from tbl_product where id_product='".$productId."'";
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