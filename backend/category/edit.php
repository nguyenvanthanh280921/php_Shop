<?php
    include '../layout/header.php';
    require_once("../connection.php");
    $categoryId = $_GET['getId'];
    $query = "select * from tbl_category where id_category='".$categoryId."'";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result)){
        $categoryId = $row['id_category'] ?? '';
        $categoryName = $row['category_name'] ?? '';
        $categoryImage = $row['category_image'] ?? '';
        $dateCreate = $row['date_create'] ?? '';
    }
    if(isset($_POST['update'])){
        if(empty($_POST['category_name']) || empty($_POST['date_create'])){
            echo 'Please Fill in the Blank';
        }else{
            $productName = $_POST['category_name'];
            $price = $_POST['date_create'] ?? '';
            $images = 'no_image.jpg';
            if($_FILES['category_image']['size'] > 0) {
                $images = basename($_FILES['category_image']['name']);
                move_uploaded_file($_FILES['category_image']['tmp_name'],'images/'.$images);
            }
            $query= "update tbl_product set product_name='".$productName."', price='".$price."',category_image='".$categoryImage."',id_category='".$categoryId."', product_detail='$productDetail' where id_product='".$productId."'";
            //var_dump($query);die; // query dau, query dau, query dau???? chem nhu dung roi!!!!!
            $result = mysqli_query($con,$query);    
                if($result){
                    header("Location: index.php");
                }else{
                    header("Location: edit.php?getId=$categoryId");
                }
        }
    }
?>
<div class="container">
    <form action="update.php?id_category=<?php echo $categoryId ?>" method="POST"enctype="multipart/form-data" >
        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" name="category_name" value="<?php echo $categoryName ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Images</label>
            <input type="file" class="form-control" name="category_image" value="<?php echo $categoryImage ?>" id="formFile">
            <img width="80" height="80" src="images/<?php echo $categoryImage ?>" alt="">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Date_Create</label>
            <input type="text" name="date_create" value="<?php echo $dateCreate ?>" class="form-control" id="exampleInputPassword1">
        </div>
        <button name="update" type="submit" class="btn btn-primary">Update</button>
    </form>
    
    

</div>
<?php include '../layout/footer.php'; ?>