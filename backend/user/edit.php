<?php
    include '../layout/header.php';
    require_once("../connection.php");
    // show user info
    $userId = $_GET['getId'];
    $query = "select * from tbl_users where id_user='".$userId."'";
    $result = mysqli_query($con,$query);
    while($row=mysqli_fetch_assoc($result)){
        $userId = $row['id_user'];
        $userName = $row['user_name'];
        $userPassword = "xxxxxxxxxx";
        $userEmail = $row['email'];
    }
    // update user info
    if(isset($_POST['update'])){
        $userId = $_GET['id_user'];
        $userName = $_POST['user_name'];
        $userEmail = $_POST['email'];
        $userFullName = $_POST['user_fullname'];
        if(!empty($_POST['user_password']) && $_POST['user_password'] !== 'xxxxxxxxxx'){
            $userPassword = password_hash($_POST['user_password'],PASSWORD_DEFAULT);
            $query= "update tbl_users set user_name='".$userName."', user_password='".$userPassword."',email='".$userEmail."' where id_user='".$userId."'";
        }else{
            $query= "update tbl_users set user_name='".$userName."', email='".$userEmail."' where id_user='".$userId."'";
        }
        $result = mysqli_query($con,$query);
        
        if($result){
            header("Location: index.php");
        }else{
            echo 'Please check ';
        }
    }
?>
<div class="container">
    <form action="edit.php?id_user=<?php echo $userId ?>" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input type="text" class="form-control" name="user_name" value="<?php echo $userName ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="user_password" value="<?php echo $userPassword ?>" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="text" class="form-control" name="email" value="<?php echo $userEmail ?>" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary" name="update">Update</button>
    </form>
</div>
<?php include '../layout/footer.php' ?>