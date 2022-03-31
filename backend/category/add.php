<?php
    include '../layout/header.php';
    require_once("../connection.php");
    if(isset($_POST['submit'])){
        if(empty($_POST['category_name']) || empty($_POST['category_image']) || empty($_POST['date_create'])){
            echo 'Please Fill in the Blank';
        }else{
            $categoryName = $_POST['category_name'];
            $categoryImage = $_POST['category_image'];
            $dateCrate = $_POST['date_create'];
            $query = "insert into tbl_category (category_name, category_image, date_create) values('$categoryName','$categoryImage','$dateCrate')";
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
    <form action="" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
        </div>
        <div class="form-group ">
            <label for="exampleInputPassword1" class="form-label">Images</label>
            <input class="form-control" name="category_image" type="text" id="formFile">
            </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Date_Create</label>
            <input type="text" name="date_create" class="form-control" id="exampleInputPassword1">
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Address</button>
    </form>
</div>
<?php include '../layout/footer.php'; ?>