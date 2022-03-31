<?php 
    require_once("../connection.php");

    if(isset($_POST['update'])){
        $productId = $_GET['id_product'];
        $productName = $_POST['product_name'];
        $price = $_POST['price'];
        $images = $_POST['image'];
        $query= "update tbl_product set product_name='".$productName."', price='".$price."',image='".$images."' where id_product='".$productId."'";
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