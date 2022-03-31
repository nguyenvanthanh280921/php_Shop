
<?php
    include '../layout/header.php';
    require_once("../connection.php");
    if(isset($_POST['submit'])){
        if(empty($_POST['user_name']) || empty($_POST['user_password']) || empty($_POST['email'])){
            echo 'Please Fill in the Blank';
        }else{
            $userName = $_POST['user_name'];
            $userPassword = $_POST['user_password'];
            $userEmail = $_POST['email'];
            $query = "insert into tbl_users (user_name, user_password, email) values('$userName','$userPassword','$userEmail')";
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
    <form action="" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input type="text" name="user_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">User Password</label>
            <input type="password" name="user_password" class="form-control" id="exampleInputPassword1" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="text" name="email" class="form-control" id="exampleInputPassword1">
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Address</button>
    </form>
</div>
<?php include '../layout/footer.php'; ?>