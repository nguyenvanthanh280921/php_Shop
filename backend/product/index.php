<?php
  include '../layout/header.php';
   require_once("../connection.php");
  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }else{
    $page = 1;
  }
  $num_per_page = 3;
  $start_from = ($page -1 ) * $num_per_page;
   $query = "SELECT * FROM tbl_product left join tbl_category
             on tbl_product.id_category = tbl_category.id_category ORDER BY id_product ASC LIMIT $start_from,$num_per_page";
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
        <?php
          $pr_query = "SELECT * FROM tbl_product";
          $query_num = mysqli_query($con,$pr_query);
          $totalrecord = mysqli_num_rows($query_num);

          $totalpage = ceil($totalrecord/$num_per_page);

          if($page>1){
            echo "<a href='index.php?page=".($page-1)."' class='btn btn-success'>Previous</a>";
          }
          for($i = 1; $i<=$totalpage;$i++){
            if($i == $page){
              echo '<a class="active btn btn-light">'.$i.'</a>';
            }else{
              echo "  <a href='index.php?page=".$i."' class=' btn btn-warning'>$i</a>";
            }
            
          }
          if($i > $page && $page != $totalpage){
            echo "<a href='index.php?page=".($page+1)."' class='btn btn-success'>Next</a>";
          }
        ?>
      </div>
    </div>
  </div>
</div>
<?php include '../layout/footer.php'?>