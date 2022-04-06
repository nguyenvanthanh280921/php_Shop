<?php
    include '../layout/header.php';
    require_once("../connection.php");
    $productId = $_GET['getId'];
    $query = "select * from tbl_product where id_product='".$productId."'";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result)){
        $productId = $row['id_product'] ?? '';
        $productName = $row['product_name'] ?? '';
        $price = $row['price'] ?? '';
        $images = $row['image'] ?? '';
        $categoryId = $row['id_category'] ?? '';
        $productDetail = $row['product_detail'] ?? '';
    }


    $query = "SELECT * FROM tbl_category";
    $catalogs = $con->query($query);
    if(isset($_POST['submit'])){
        if(empty($_POST['product_name']) || empty($_POST['price'])){
            echo 'Please Fill in the Blank';
        }else{
            $productName = $_POST['product_name'];
            $price = $_POST['price'] ?? '';
            $categoryId = $_POST['id_category'] ?? '';
            $productDetail = $_POST['product_detail'] ?? '';
            $images = 'no_image.jpg';
            if($_FILES['image']['size'] > 0) {
                $images = basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$images);
            }
            $query= "update tbl_product set product_name='".$productName."', price='".$price."',image='".$images."',id_category='".$categoryId."' where id_product='".$productId."'";
            // var_dump($result);die;
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
    <form action="edit.php?id_product=<?php echo $productId ?>" method="post">
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
            <input type="file" class="form-control" name="image" value="<?php echo $images ?>" id="exampleInputPassword1">
            <img width="80" height="80" src="images/<?php echo $images ?>" alt="">
        </div>
        <div class="form-group">
            <select name="id_category" class="form-control">
            <option>Select Catalog</option>
                <?php foreach($catalogs as $cat): ?>
                <option value="<?php echo $cat['id_category']; ?>"><?php echo $cat['category_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>  
        <textarea name="content" id="ck_editor"></textarea>
        <button type="submit" class="btn btn-primary" name="update" style="margin-top: 10px; ">Update</button>
    </form>
</div>
<?php include '../layout/footer.php' ?>
<script type="text/javascript">
      let theEditor = "";
      ClassicEditor.create( document.querySelector( '#ck_editor' ),
          {},
          ).then( editor => {
            editor.setData("<?php echo $productDetail; ?>");
              console.log( editor.getData() );
          } )
          .catch( error => {
              console.error( error );
          } );
          setInterval(() => {
            $("#ck_editor").val(theEditor.getData());
          }, 1000);
  </script>