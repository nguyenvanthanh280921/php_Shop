<?php
    include '../layout/header.php';
    require_once("../connection.php");
    require_once("../constant.php");
    $query = "SELECT * FROM tbl_category";
    $catalogs = $con->query($query);
    $productId = $_GET['getId'];
    $query = "SELECT * FROM tbl_product WHERE id_product='".$productId."'";
    $result = mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);
    $img_product = mysqli_query($con, "SELECT * FROM tbl_product_images WHERE id_product=$productId");
    //    var_dump($img_product);die();
//    $productId = $row['id_product'] ?? '';
    $productName = $row['product_name'] ?? '';
    $price = $row['price'] ?? '';
    $images = $row['image'] ?? '';
    $categoryId = $row['id_category'] ?? '';
    $productDetail = $row['product_detail'] ?? '';
    $upload = $row['product_images'] ?? '';
    $error = '';
    if(isset($_POST['update'])){
        if(empty($_POST['product_name']) || empty($_POST['price'])){
            $error = 'Please Fill in the Blank';
        }else{
            $productName = $_POST['product_name'] ?? '';
            $price = $_POST['price'] ?? '';
            $categoryId = $_POST['id_category'] ?? '';
            $productDetail = $_POST['product_detail'] ?? '';
            $productSize = $_POST['product_size'] ?? '';
            $productColor = $_POST['product_color'] ?? '';
            $imagesUpdate = 'no_image.jpg';
            $hasImage = false;
            if($_FILES['image']['size'] > 0) {
                // exit("ok");
                $file = $_FILES['image'];
                $file_name = $file['name'];
                if(empty($_FILES)){
                    $file_name = $row['image'];
                }else{
                    $hasImage = true;
                    $imagesUpdate = basename($_FILES['image']['name']);
                    move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$images);
                }
            }
            $imageDir = 'product-image/'.$productId;
            $deleteImage = $_POST['remove'] ?? [];
            if(!empty($deleteImage)){
                foreach($deleteImage as $idImage){
                    $sql = "SELECT * FROM tbl_product_images WHERE  id = $idImage";
                    $results = mysqli_query($con, $sql);
                    $removeImage = $results->fetch_assoc();
                    unlink($imageDir.'/'.$removeImage['product_images']);
                    mysqli_query($con, "DELETE FROM tbl_product_images WHERE id='$idImage'");
                }
            }
            if (!file_exists($imageDir)) {
                mkdir($imageDir, 0777);
            }
            if(!empty($_FILES['upload']['name'][0])) {
                $files = $_FILES['upload'];
                $file_names = $files['name'];
                foreach($file_names as $key => $value){
                    $newName = date("YmmddHis").'_'.$value;
                    move_uploaded_file($files['tmp_name'][$key], $imageDir.'/'.$newName);
                    mysqli_query($con, "INSERT INTO tbl_product_images(id_product, product_images) VALUES('$productId', '$newName')");
                }
            }
            if($hasImage){
                $query= "UPDATE tbl_product SET product_size='$productSize',product_name='".$productName."', price='".$price."',image='".$imagesUpdate."',id_category='".$categoryId."', product_detail='$productDetail', product_color='$productColor' where id_product='".$productId."'";
            }else{
                $query= "UPDATE tbl_product SET product_size='$productSize',product_name='".$productName."', price='".$price."',id_category='".$categoryId."', product_detail='$productDetail', product_color='$productColor' where id_product='".$productId."'";
            }
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
                <div class="error"><?php if(!empty($error)) echo $error; ?></div>
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
                        <label for="exampleInputPassword1">PRODUCT IMAGES</label>
                        <input type="file" name="image" value="<?php echo $images ?>" class="form-control" id="exampleInputPassword1">
                        <img width="80" height="80" name="image" src="images/<?php echo $images ?>" alt="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">DESCRIPTION PHOTO</label>
                        <input type="file" name="upload[]" value="?>"  class="form-control"  id="exampleInputPassword1" multiple="multiple" >
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($img_product as $key => $value){
                                ?>
                                <tr id="tr_product_remove_<?php echo $value['id'] ?? 0; ?>">
                                    <td><?php echo $value['id'] ?? 0; ?></td>
                                    <td><?php echo basename($value['product_images']);  ?></td>
                                    <td>
                                        <img width="80" height="80" src="product-image/<?php echo $productId ?>/<?php echo $value['product_images'] ?>" alt="<?php echo $value['product_images'] ?>">
                                    </td>
                                    <td>
                                    <input id="product_remove_<?php echo $value['id'] ?? 0; ?>" type="hidden" name="temp[]" value="<?php echo $value['id'] ?? 0; ?>" />
                                    <a  href="javascript:void(0)" onclick="removeProduct('<?php echo $value['id'] ?? 0; ?>')"><i class="material-icons cancel">&#xe5c9;</i>
                                        </a>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
        <textarea name="product_detail" id="ck_editor" cols="80" rows="5" class="ckeditor" ></textarea>
        <button type="submit" class="btn btn-primary" name="update">Update</button>
</div>
<?php include '../layout/footer.php' ?>

<script type="text/javascript">
      let theEditor = "";
      ClassicEditor.create( document.querySelector( '#ck_editor' ),
            {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                    ]
                },
                allowedContent: 'p b i img; a[!href];img[!src]; ',
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                }
            }).then( editor => {
                theEditor = editor;
                editor.setData("<?php echo $productDetail; ?>");
          } )
          .catch( error => {
              console.error( error );
          } );



          setInterval(() => {
            $("#ck_editor").val(theEditor.getData());
          }, 1000);
         function removeProduct(imageId){
            $("#product_remove_" + imageId).attr("name","remove[]");
            $("#tr_product_remove_" + imageId).hide();
         }
  </script>

  <!-- <textarea name="product_detail" id="ck_editor"></textarea>
        <button type="submit" class="btn btn-primary" name="update" style="margin-top: 10px; ">Update</button> -->