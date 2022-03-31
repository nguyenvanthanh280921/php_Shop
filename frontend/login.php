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
    session_start();
    
    if(isset($_SESSION['user_login']) && $_SESSION['user_login'] === true){
        header("Location: /Project_shop/frontend/home.php");
    }
    $cookieTime = time() + 3000;
    if(isset($_POST['submit'])){
        $userName = $_POST['user_name'] ?? '';
        $userPassword = $_POST['user_password'] ?? '';
        if(!empty($userName) && !empty($userPassword)){
            if($userName === 'Thanhnv' && $userPassword === 'thanhnv2001'){
                $_SESSION['user_login'] = true;
                $_SESSION['name'] = "ThanhNV";
                if(!empty($_POST["remember"])){
                    setcookie ("user_name",$userName,$cookieTime);
                    setcookie ("user_pasword",$userPassword,$cookieTime);
                    setcookie ("name","ThanhNV",$cookieTime);
                }else{
                    setcookie("user_name","");
                    setcookie("user_password","");
                    setcookie("name","");
                }
                header("Location: /Project_shop/frontend/home.php");
            }else{
                $error = "Incorrect Username or Password";
            }
        }else{
            $error = "Please insert your infomation";
        }

    }
?>
<body>
      <!--Main Navigation-->
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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand nav-link" target="_blank" href="#">
          <strong>OGANI</strong>
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </nav>
    <!-- Navbar -->
    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
              <form class="bg-white  rounded-5 shadow-5-strong p-5" action="login.php" method="post">
                <div class="form-outline mb-4">
                    <label class="form-label" for="form1Example1">Name</label>
                    <input type="text" name="user_name" value="Thanhnv" id="form1Example1" class="form-control" />
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form1Example2">Password</label>
                    <input type="password" name="user_password" value="thanhnv2001" id="form1Example2" class="form-control" />                
                </div>
                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                      <label class="form-check-label" for="form1Example3">
                        Remember me
                      </label>
                    </div>
                  </div>
                  <div class="col text-center">
                    <!-- Simple link -->
                    <a href="forgot_password.php">Forgot password?</a>
                  </div>
                </div>
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                <span class="error"><?php echo !empty($error) ? $error : ''; ?></span><br /><br />
                <div class="text-center">
                    <p>Not a member? <a href="#">Register</a></p>
                </div>
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