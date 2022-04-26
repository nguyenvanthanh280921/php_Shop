<?php
    include '../layout/header.php';
    require_once("../connection.php");
    require_once("../constant.php");
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
            $productSize = $_POST['product_size'] ?? '';
            $productColor = $_POST['product_color'] ?? '';
            $images = 'no_image.jpg';
            if($_FILES['image']['size'] > 0) {
                $images = basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$images);
            }
            $query = "insert into tbl_product (product_name, price, image, id_category,product_detail,product_size,product_color ) values('$productName','$price','$images',$categoryId,'$productDetail','$productSize','$productColor')";
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
        <li class="list-group-item p-3">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                    <label for="exampleInputPassword1">PRODUCT NAME</label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="product_name" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">PRODUCT PRICE</label>
                        <input type="text" class="form-control" name="price" id="inputPassword4" placeholder="$100" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Imgaes</label>
                        <input type="file" name="image" class="form-control" id="exampleInputPassword1">
                    </div>
                
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">       
                        <label for="exampleInputPassword1">SELECT CATALOG</label>
                        <select class="form-control" name="id_category">
                            <option>Select Catalog</option>
                            <?php foreach($catalogs as $cat): ?>
                                <option value="<?php echo $cat['id_category']; ?>"><?php echo $cat['category_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Please select your state.</div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">SELECT SIZE</label>
                        <select class="form-control" name="product_size">
                            <option>Select size</option>
                            <?php foreach(PRODUCT_SIZE as $size): ?>
                                <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Please select your state.</div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">SELECT COLOR</label>
                        <select class="form-control" name="product_color">
                            <option>Select color</option>
                            <?php foreach(PRODUCT_COLOR as $color): ?>
                                <option value="<?php echo $color; ?>"><?php echo $color; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Please select your state.</div>
                    </div>

                   
                </div>
            </div>
        </li>
        <textarea name="product_detail" id="ck_editor" cols="80" rows="5" class="ckeditor" ></textarea>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include '../layout/footer.php' ?>
<script type="text/javascript">
      let theEditor = "";
      ClassicEditor.create( document.querySelector( '#ck_editor' ),
          {},
          ).then( editor => {
            
              console.log( editor.getData() );
          } )
          .catch( error => {
              console.error( error );
          } );
          setInterval(() => {
            $("#ck_editor").val(theEditor.getData());
          }, 1000);
          
  </script>
  <style>
.ck-editor__editable_inline {
    min-height: 400px;
}
</style>