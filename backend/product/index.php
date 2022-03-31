<?php
  include '../layout/header.php';
   require_once("../connection.php");
   $query = "select * from tbl_product";
   $result = mysqli_query($con,$query);
   
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
                  ?>
                  <tr>
                    <td><?php echo $productId?></td>
                    <td><?php echo $productName?></td>
                    <td><?php echo $price?></td>
                    <td><?php echo $images?></td>
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
      </div>
    </div>
  </div>
</div>
<?php include '../layout/footer.php'?>