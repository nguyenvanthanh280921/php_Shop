<?php
  include '../layout/header.php';
   require_once("../connection.php");
   $query = "select * from tbl_users";
   $result = mysqli_query($con,$query);
   
?>
<div class="row">
  <div class="col">
    <div class="card card-small mb-4">
      <div class="card-header border-bottom">
        <h6 class="m-0">Users</h6>
        <a style="float:right" type="button" class="btn btn-success" href="<?php echo $baseUrl;?>/user/add.php">Add</a>  
      </div>
      <div class="card-body p-0 pb-3">
        <table class="table mb-0">
          <!-- <thead class="bg-light"> -->
            <tr>
              <th scope="col" class="border-0">#</th>
              <th scope="col" class="border-0">Users Name </th>
              <th scope="col" class="border-0">Email</th>
              <th scope="col" class="border-0">Action</th>
            </tr>
          <!-- </thead>
          <tbody> -->
              <?php
                while($row=mysqli_fetch_assoc($result)){
                    $userId = $row['id_user'];
                    $userName = $row['user_name'];
                    $userEmail = $row['email'];
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $userId?></td>
                    <td><?php echo $userName?></td>
                    <td><?php echo $userEmail?></td>
                    <td>                             
                      <a href="edit.php?getId=<?php echo $userId ?>" type="button" class="btn btn-warning">Edit</a>
                      <a href="delete.php?Del=<?php echo $userId ?>" type="button" class="btn btn-danger">Delete</a>         
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