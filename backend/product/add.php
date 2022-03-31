<?php
    include '../layout/header.php';
    require_once("../connection.php");
    if(isset($_POST['submit'])){
        if(empty($_POST['product_name']) || empty($_POST['price']) || empty($_POST['image'])){
            echo 'Please Fill in the Blank';
        }else{
            $productName = $_POST['product_name'];
            $price = $_POST['price'];
            $images = $_POST['image'];
            $query = "insert into tbl_product (product_name, price, image) values('$productName','$price','$images')";
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
            <label for="exampleInputEmail1">Product Name</label>
            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="50.000đ">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Imgaes</label>
            <input type="text" name="image" class="form-control" id="exampleInputPassword1" placeholder="50.000đ">
        </div>
        <!-- <div class="mb-3 ">
            <label for="formFile" class="form-label">Images</label>
            <input class="form-control" name="image" type="file" id="formFile">
            </div> -->
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div
<?php include '../layout/footer.php' ?>