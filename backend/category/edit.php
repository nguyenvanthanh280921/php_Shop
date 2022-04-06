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
    
?>
<div class="container">
    <form action="update.php?id_category=<?php echo $categoryId ?>" method="POST">
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