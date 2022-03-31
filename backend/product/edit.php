<?php
    include '../layout/header.php';
    require_once("../connection.php");
    $productId = $_GET['getId'];
    $query = "select * from tbl_product where id_product='".$productId."'";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result)){
        $productId = $row['id_product'];
        $productName = $row['product_name'];
        $price = $row['price'];
        $images = $row['image'];

    }
    ?>
<div class="container">
    <form action="update.php?id_product=<?php echo $productId ?>" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            <input type="text" class="form-control" name="product_name" value="<?php echo $productName ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" class="form-control" name="price" value="<?php echo $price ?>" id="exampleInputPassword1" placeholder="50.000đ">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Images</label>
            <input type="text" class="form-control" name="image" value="<?php echo $images ?>" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary" name="update">Update</button>
    </form>
</div>
<?php include '../layout/footer.php' ?>