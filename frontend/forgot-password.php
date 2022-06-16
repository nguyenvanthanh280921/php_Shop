<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
<?php
    include "../backend/connection.php";
    require '../backend/functions.php';
    $error = "";
    if(isset($_POST['submit']) == true){
      $email = $_POST['email'];
      $conn = new PDO("mysql:host=localhost;dbname=project_shop;charset=utf8", "root", "");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "SELECT * FROM tbl_users WHERE email = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$email]);
      $count = $stmt->rowCount();
      if($count==0){
        $error = "Email bạn nhập chưa được đăng ký";
      }else{
        $seed = str_split('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()');
        shuffle($seed); 
        $newPassword = '';
        foreach (array_rand($seed, 15) as $k){
          $newPassword .= $seed[$k];
        } 
        $sql = "UPDATE tbl_users SET user_password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql); //tạo một prepare stement     
        $stmt->execute([md5($newPassword), $email ]);
        $mailContent = "<p> You received this message, you or anyone else requested a new password!!!</p>
        Your new password is: {$newPassword}";
        sendMail($email, 'Reset password', $mailContent);
      }
    }
  ?>
<!-- Sing in  Form -->
<section class="sign-in">
    <div class="container">
        <a href="login.php"> <svg style="padding: 20px" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
            </svg>
        </a>
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="img/rigister.png" alt="sing up image"></figure>
            </div>
            <div class="signin-form">
                <h2 class="form-title">Forgot Password</h2>
                <form method="POST" class="register-form" id="login-form" action="./forgot-password.php">
                    <?php if($error != ""){ ?>
                        <div class="alert alert-danger"><?= $error ?> </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input value="<?php if(isset($email) == true) echo $email ?>" type="email" name="email" id="email" placeholder="Enter Email"/>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="submit" id="signin" class="form-submit" value="Submit"/>
                    </div>
                </form>
                <div class="social-login">
                    <span class="social-label">Or login with</span>
                    <ul class="socials">
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="vendor/jquery/jquery.min.js"></script>
</body>
</html>