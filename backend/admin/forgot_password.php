<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
  </head>
  <?php 
    require '../functions.php';
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
  <body>
    <header>
      <style>
        #intro {
          background-image: url(https://mdbootstrap.com/img/new/fluid/city/008.jpg);
          height: 100vh;
        }
        /* Height for devices larger than 576px */
        @media (min-width: 992px) {
          #intro {
            margin-top: -58.59px;
          }
        }
        .navbar .nav-link {
          color: #fff !important;
        }
      </style>
      <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
        <div class="container-fluid">
          <a class="navbar-brand nav-link" target="_blank" href="#">
            <strong>OGANI</strong>
          </a>
          <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
            aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
        </div>
      </nav>
      <div id="intro" class="bg-image shadow-2-strong">
        <div class="mask d-flex align-items-center h-100" style="background-color:rgba(192,192,192,0.3);">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-xl-5 col-md-8">
                <form class="bg-white  rounded-5 shadow-5-strong p-5" action="" method="post">
                  <h1>Forgot Password</h1>
                  <hr>
                  <?php if($error!="") { ?>
                    <div class="alert alert-danger"><?= $error ?> </div>
                  <?php } ?>
                  <div class="form-outline mb-4">
                      <label class="form-label" for="form1Example1">Enter Email</label>
                      <input value="<?php if(isset($email) == true) echo $email ?>" type="email" name="email" id="email" class="form-control" />
                  </div>
                  <button type="submit" name="submit" value="email" class="btn btn-primary btn-block mb-4">Send require</button>
                  <br /><br />
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Background image -->
    </header>
    <!--Footer-->
    <footer class="bg-light text-lg-start">
      <!-- <hr class="m-0" /> -->
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright:
        <a href="">nguyenvanthanh280921@gmail.com</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!--Footer-->
  </body>
</html>