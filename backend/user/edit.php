<?php
    include '../layout/header.php';
    require_once("../connection.php");
    $userId = $_GET['getId'];
    $query = "select * from tbl_users where id_user='".$userId."'";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result)){
        $userId = $row['id_user'];
        $userName = $row['user_name'];
        $userPassword = $row['user_password'];
        $userEmail = $row['email'];
    }
    ?>
<div class="container">
    <form action="update.php?id_user=<?php echo $userId ?>" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input type="text" class="form-control" name="user_name" value="<?php echo $userName ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="text" class="form-control" name="user_password" value="<?php echo $userPassword ?>" id="exampleInputPassword1" placeholder="50.000đ">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="text" class="form-control" name="email" value="<?php echo $userEmail ?>" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary" name="update">Update</button>
    </form>
</div>
<?php include '../layout/footer.php' ?>