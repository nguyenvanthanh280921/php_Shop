<?php
    include '../layout/header.php';
    require_once("../connection.php");
    require_once("../constant.php");
    $query = "SELECT * FROM tbl_category";
    $catalogs = $con->query($query);
    $productId = $_GET['getId'];
    $query = "select * from tbl_product where id_product='".$productId."'";
    $result = mysqli_query($con,$query);

    $row=mysqli_fetch_assoc($result);
    $productId = $row['id_product'] ?? '';
    $productName = $row['product_name'] ?? '';
    $price = $row['price'] ?? '';
    $images = $row['image'] ?? '';
    $categoryId = $row['id_category'] ?? '';
    $productDetail = $row['product_detail'] ?? '';

    if(isset($_POST['update'])){
        if(empty($_POST['product_name']) || empty($_POST['price'])){
            echo 'Please Fill in the Blank';
        }else{
            $productName = $_POST['product_name'];
            $price = $_POST['price'] ?? '';
            $categoryId = $_POST['id_category'] ?? '';
            $productDetail = $_POST['product_detail'] ?? '';
            $productSize = $_POST['product_size'] ?? '';
            $productColor = $_POST['product_color'] ?? '';
            $images = 'no_image.jpg';
            if($_FILES['image']['size'] > 0) {
                $images = basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$images);
            }
        
            $query= "update tbl_product set product_size='$productSize',product_name='".$productName."', price='".$price."',image='".$images."',id_category='".$categoryId."', product_detail='$productDetail', product_color='$productColor' where id_product='".$productId."'";
            //var_dump($query);die; // query dau, query dau, query dau???? chem nhu dung roi!!!!!
            $result = mysqli_query($con,$query);    
                if($result){
                    header("Location: index.php");
                }else{
                    header("Location: edit.php?getId=$productId");
                }
        }
    }
?>
<div class="container">
    <form action="edit.php?getId=<?php echo $productId ?>" method="POST" enctype="multipart/form-data">
        <li class="list-group-item p-3">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                    <label for="exampleInputPassword1">PRODUCT NAME</label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="product_name"  value="<?php echo $productName ?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">PRODUCT PRICE</label>
                        <input type="text" class="form-control" name="price" value="<?php echo $price ?>" id="inputPassword4" placeholder="$100" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Imgaes</label>
                        <input type="file" name="image" value="<?php echo $images ?>" class="form-control" id="exampleInputPassword1">
                        <img width="80" height="80" src="images/<?php echo $images ?>" alt="">
                    </div>
                
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">       
                        <label for="exampleInputPassword1">SELECT CATALOG</label>
                        <select class="form-control" name="id_category">
                            <option>Select Catalog</option>
                            <?php foreach($catalogs as $cat): ?>
                            <option <?php if($categoryId == $cat['id_category']) echo 'selected'; ?>
                                    value="<?php echo $cat['id_category']; ?>">
                                <?php echo $cat['category_name']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Please select your state.</div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">SELECT SIZE</label>
                        <select class="form-control" name="product_size">
                            <option value=''>Select Product size</option>
                            <?php foreach(PRODUCT_SIZE as $size): ?>
                                <option <?php if($size == $row['product_size']) echo 'selected'; ?> value="<?php echo $size; ?>"><?php echo $size; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Please select your state.</div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">SELECT COLOR</label>
                        <select class="form-control" name="product_color">
                            <option value=''>Select Product color</option>
                            <?php foreach(PRODUCT_COLOR as $color): ?>
                                <option <?php if($color == $row['product_color']) echo 'selected'; ?> value="<?php echo $color; ?>"><?php echo $color; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Please select your state.</div>
                    </div>

                   
                </div>
            </div>
        </li>
        <textarea name="product_detail" id="ck_editor" ></textarea>
        <button type="submit" class="btn btn-primary" name="update" style="margin-top: 10px; ">Update</button>
</div>
<?php include '../layout/footer.php' ?>
<script type="text/javascript">
      let theEditor = "";
      ClassicEditor.create( document.querySelector( '#ck_editor' ),
          {},
          ).then( editor => {
            theEditor = editor;
            editor.setData("<?php echo $productDetail; ?>");
          } )
          .catch( error => {
              console.error( error );
          } );
          setInterval(() => {
            $("#ck_editor").val(theEditor.getData());
          }, 1000);
  </script>
  <!-- <textarea name="product_detail" id="ck_editor"></textarea>
        <button type="submit" class="btn btn-primary" name="update" style="margin-top: 10px; ">Update</button> -->