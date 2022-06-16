<?php
  include '../layout/header.php';
  require_once("../connection.php");
   $query = "SELECT * FROM tbl_order";
   $result = mysqli_query($con,$query);
?>
<div class="row">
  <div class="col">
    <div class="card card-small mb-4">
      <div class="card-header border-bottom">
        <h6 class="m-0">Users</h6>
        <a style="float:right" type="button" class="btn btn-success" href="<?php echo $baseUrl;?>/order/add.php">Add</a>  
      </div>
      <div class="card-body p-0 pb-3">
        <table class="table mb-0">
          <thead class="bg-light">
            <tr>
              <th scope="col" class="border-0"><input type="checkbox"></th>
              <th scope="col" class="border-0">ID</th>
              <th scope="col" class="border-0">Orrder Name </th>
              <th scope="col" class="border-0">Number Phone</th>
              <th scope="col" class="border-0">Address</th>
              <th scope="col" class="border-0">Date Create</th>
              <th scope="col" class="border-0">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
            while($row=mysqli_fetch_assoc($result)){
                $orderId = $row['order_id'];
                $OrderName = $row['name_order'];
                $numberPhone = $row['number_phone'];
                $address = $row['address'];
                $createTime = $row['created_time'];
              ?>
              <tr>
                <td><input class="check" type="checkbox" id="checkbox1" name="checkbox" value="item1"/></td>
                <td class="text-center"></td>
                <td><?php echo $OrderName?></td>
                <td><?php echo $numberPhone?></td>
                <td><?php echo $address?></td>
                <td><?php echo $createTime?></td>
                <td>
                  <a href="" type="button" class="btn btn-warning">Edit</a>
                  <a href="" type="button" class="btn btn-danger">Delete</a>
                  </td>
              </tr>
              <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include '../layout/footer.php'?>