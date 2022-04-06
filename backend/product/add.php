<?php
    include '../layout/header.php';
    require_once("../connection.php");
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
            // $filename = $images['name'];
            // $filetmp = $images['tmp_name'];
            // $fileerror = $images['error'];
            // $fileext = explode('.',$filename);
            // $filecheck = strtolower(end($fileext));
            // $fileextstored = array('png','jpg','jpeg');
            // if(in_array($filecheck, $fileextstored)){
            //     $destinationfile = 'images/'.$filename;
            //     move_uploaded_file($filetmp, $destinationfile);
            // }  
            $query = "insert into tbl_product (product_name, price, image, id_category,product_detail) values('$productName','$price','$images',$categoryId,'$productDetail')";
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
            <label for="exampleInputEmail1">Product Name</label>
            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="50.000đ">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Imgaes</label>
            <input type="file" name="image" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <select name="id_category" class="form-control">
                <option>Select Catalog</option>
                <?php foreach($catalogs as $cat): ?>
                <option value="<?php echo $cat['id_category']; ?>"><?php echo $cat['category_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>  
        <textarea name="product_detail" id="ck_editor" cols="80" rows="5" class="ckeditor" ></textarea>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div
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