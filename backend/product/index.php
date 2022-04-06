<?php
  include '../layout/header.php';
   require_once("../connection.php");
   $query = "SELECT * FROM tbl_product left join tbl_category on tbl_product.id_category = tbl_category.id_category";
   $result = mysqli_query($con,$query); 

  // $item_per_page = !empty($_GET['per_page']) ?$_GET['per_page']:4;
  // $current_page = !empty($_GET['page']) ?$_GET['page']:4;
  // $offset = ($current_page - 1) * $item_per_page;
  // $


?>
<div class="row">
  <div class="col">
    <div class="card card-small mb-4">
      <div class="card-header border-bottom">
        <h6 class="m-0">Products</h6>
        <a style="float:right" type="button" class="btn btn-success" href="<?php echo $baseUrl;?>/product/add.php">Add</a>  
      </div>
      <div class="card-body p-0 pb-3 text-center">
        <table class="table mb-0">
          <!-- <thead class="bg-light"> -->
            <tr>
              <th scope="col" class="border-0">#</th>
              <th scope="col" class="border-0">Full Name </th>
              <th scope="col" class="border-0">Price</th>
              <th scope="col" class="border-0">Images</th>
              <th scope="col" class="border-0">Category</th>
              <th scope="col" class="border-0">Action</th>
            </tr>
          <!-- </thead>
          <tbody> -->
              <?php
                while($row=mysqli_fetch_assoc($result)){
                  $productId = $row['id_product'];
                  $productName = $row['product_name'];
                  $price = $row['price'];
                  $images = $row['image'];
                  $categoryName = $row['category_name'];
                  ?>
                  <tr>
                    <td><?php echo $productId?></td>
                    <td><?php echo $productName?></td>
                    <td><?php echo $price?></td>    
                    <td><img width="100" height="100" src="<?php echo "./images/".$images?>" alt=""></td>
                    <td><?php echo $categoryName?></td>
                    <td>                             
                      <a href="edit.php?getId=<?php echo $productId ?>" type="button" class="btn btn-warning">Edit</a>
                      <a href="delete.php?Del=<?php echo $productId ?>" type="button" class="btn btn-danger">Delete</a>         
                      </td>
                  </tr>
                  <?php 
                      }
                  ?>
          <!-- </tbody> -->
        </table>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
<?php include '../layout/footer.php'?>