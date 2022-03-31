<?php
    require_once("../connection.php");
    if(isset($_POST['update'])){
        $categoryId = $_GET['id_category'];
        $categoryName = $_POST['category_name'];
        $categoryImage = $_POST['category_image'];
        $dateCrate = $_POST['date_create'];
        $query= "update tbl_category set category_name='".$categoryName."',category_image='".$categoryImage."',date_create='".$dateCrate."' where id_category='".$categoryId."'";
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