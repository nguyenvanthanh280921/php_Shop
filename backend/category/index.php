<?php 
  include '../layout/header.php';
   require_once("../connection.php");
   $query = "select * from tbl_category";
   $result = mysqli_query($con,$query);
   
?>
<div class="row">
  <div class="col">
    <div class="card card-small mb-4">
      <div class="card-header border-bottom">
        <h6 class="m-0">Category</h6>
        <button style="float:right" type="button" class="btn btn-success" ><a href="<?php echo $baseUrl; ?>/category/add.php">Add</a></button>      
      </div>
      <div class="card-body p-0 pb-3 text-center">
        <table class="table mb-0">
          <!-- <thead class="bg-light"> -->
            <tr>
              <th scope="col" class="border-0">#</th>
              <th scope="col" class="border-0">Name Category </th>
              <th scope="col" class="border-0">Images</th>
              <th scope="col" class="border-0">DateCreate</th>
              <th scope="col" class="border-0">Action</th>
            </tr>
          <!-- </thead>
          <tbody> -->
              <?php
                while($row=mysqli_fetch_assoc($result)){
                  $categoryId = $row['id_category'];
                  $categoryName = $row['category_name'];
                  $categoryImage = $row['category_image'];
                  $dateCreate = $row['date_create'];
                  ?>
                  <tr>
                    <td><?php echo $categoryId?></td>
                    <td><?php echo $categoryName?></td>
                    <td><?php echo $categoryImage?></td>
                    <td><?php echo $dateCreate?></td>
                    <td>                             
                      <a href="edit.php?getId=<?php echo $categoryId ?>" type="button" class="btn btn-warning">Edit</a>
                      <a herf="delete.php?Del=<?php echo $categoryId ?>" type="button" class="btn btn-danger">Delete</a>          
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
<?php include '../layout/footer.php' ?>


