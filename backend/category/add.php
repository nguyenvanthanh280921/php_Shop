<?php
    include '../layout/header.php';
    require_once("../connection.php");
    if(isset($_POST['submit'])){
        if(empty($_POST['category_name']) || empty($_POST['date_create'])){
            echo 'Please Fill in the Blank';
        }else{
            $categoryName = $_POST['category_name'];
            $dateCrate = $_POST['date_create'];
            $categoryImage = 'no_image.jpg';
            if($_FILES['image']['size'] > 0) {
                $categoryImage = basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$categoryImage);
            }
            $query = "INSERT INTO tbl_category (category_name, date_create, category_image) VALUES ('$categoryName','$dateCrate','$categoryImage')";
            $result = mysqli_query($con,$query);
            if($result){
                header("Location: index.php");
            }else{
                echo 'Please check your query';
            }
        }
    }
?>
<div class="container">
    <form action="add.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Date_Create</label>
            <input type="date" name="date_create" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Imgaes</label>
            <input type="file" name="image" class="form-control" id="exampleInputPassword1">
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Address</button>
    </form>
</div>
<?php include '../layout/footer.php'; ?>