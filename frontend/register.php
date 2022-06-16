<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/css.css"> 
    <style>
        .has-error{
            color: red;
        }
    </style>
</head>
<body>
    <?php
        include "../backend/connection.php";
        $err = [];
        if(isset($_POST['submit'])){
            $username = $_POST['user_name'];
            $useremail = $_POST['user_email'];
            $password = $_POST['password'];
            $rpassword = $_POST['rpassword'];
            if(empty($username)){
                $err['user_name'] = 'Please enter your name !!!';
            }
            if(empty($useremail)){
                $err['user_email'] = 'Please enter your email !!!';
            }
            if(empty($password)){
                $err['password'] = 'Please enter your password !!!';
            }
            if($password != $rpassword){
                $err['rpassword'] = 'Re-entered password is incorrect !!!';
            }
            if(empty($err)){
                $password = password_hash($password,PASSWORD_DEFAULT);
                $sql = "INSERT INTO tbl_users(user_name, email, user_password) VALUES('$username','$useremail', '$password')";
                $query = mysqli_query($con, $sql);
                if($query){
                    header('location: login.php');
                }
            }
        }
    ?>
        <!-- Sign up form -->
    <section class="signup">

        <div class="container">
            <a href="login.php"> <svg style="padding: 20px" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
            </a>
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="user_name" id="name" placeholder="Your Name"/>
                            <div class="has-error">
                                <span> <?php echo (isset($err['user_name'])) ? $err['user_name'] : '' ;?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="user_email" id="email" placeholder="Your Email"/>
                            <div class="has-error">
                                <span> <?php echo (isset($err['user_email'])) ? $err['user_email'] : '' ;?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" placeholder="Password"/>
                            <div class="has-error">
                                <span> <?php echo (isset($err['password'])) ? $err['password'] : '' ;?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="rpassword" id="re_pass" placeholder="Repeat your password"/>
                            <div class="has-error">
                                <span> <?php echo (isset($err['rpassword'])) ? $err['rpassword'] : '' ;?></span>
                            </div>
                        </div>  
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="submit" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="img/login.png" alt="sing up image"></figure>
                    <a href="#" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>