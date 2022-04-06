<?php 
    require_once("../connection.php");

    if(isset($_POST['update'])){
        $categoryId = $_GET['id_category'];
        $categoryName = $_POST['category_name'];
        $categoryImage = 'no_images.jpg';
        if(isset($_FILES['category_image']) && $_FILES['category_image']['size'] > 0) {
            $categoryImage = $_FILES['category_image']['name'];
            move_uploaded_file($_FILES['category_image']['tmp_name'],'images/'. $categoryImage);
        }
        $dateCreate = $_POST['date_create'];
        $query= "update tbl_category set category_name='".$categoryName."', category_image='".$categoryImage."',date_create='".$dateCreate."' where id_category='".$categoryId."'";
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