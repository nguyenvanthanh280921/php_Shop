<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>T-sport</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <?php
    include '../backend/connection.php';
    session_start();

    $user = (isset($_SESSION['user'])) ? $_SESSION['user']: []; 
    ?>
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logoshop.png" alt=""></a>
        </div>
<!--        <div class="humberger__menu__cart">-->
<!--            <ul>-->
<!--                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>-->
<!--                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>-->
<!--            </ul>-->
<!--        </div>-->
        <div class="humberger__menu__widget">
            
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
            <li class="active"><a href="./index.php">Home</a></li>
                <li><a href="./product.php">Shop</a></li>                       
                <li><a href="#">Blog</a>
                    <ul class="header__menu__dropdown">
                    <li><a href="./blog_detail.php">Blog Details</a></li>
                        <li><a href="./blog.php">Blog </a></li>
                    </ul>
                </li>
                <li><a href="./contact.php">Contact</a></li>
                <li><a href="./checkout.php">Check Out</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> nguyenvanthanh280921@gmail.com</li>
                <li>Free Shipping for all Order of $199</li>
            </ul>
        </div>
    </div>
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><a href="#" class="fa fa-envelope">Tshop@tgroup.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">VietNamese</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__language">
                                <?php
                                if(isset($user['user_name'])){
                                    ?>
                                    <div><?php echo $user['user_name']?></div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="logout.php">Sign Out</a></li>
                                    </ul>
                                    <?php
                                }else{
                                    ?>
                                    <i class="fa fa-user"></i>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="register.php"><i class="fa fa-user"></i>  Sign Up</a></li>
                                        <li><a href="login.php"><i class="fa fa-user"></i>  Sign In</a></li>
                                    </ul>
                                <?php
                                }
                                ?>
                            </div>       
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="header__logo">
                            <a href="./index.php"><img src="img/logotshop.png" alt="" ></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav class="header__menu">
                            <ul>
                                <li class="active"><a href="./index.php">Home</a></li>
                                <li><a href="./product.php">Shop</a></li>
                                <li><a href="#">Page</a>
                                    <ul class="header__menu__dropdown">
                                    <li><a href="./checkout.php">Check Out</a></li>
                                        <li><a href="./blog_detail.php">Blog Details </a></li>
                                    </ul>
                                </li>
                                <li><a href="./blog.php">Blog</a></li>
                                <li><a href="./contact.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <div class="header__cart">
                        <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">VietNamese</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="humberger__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
    </header>
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                    <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Nike</a></li>
                            <li><a href="#">Adidas</a></li>
                            <li><a href="#">Kamito</a></li>
                            <li><a href="#">Mizuno</a></li>
                            <li><a href="#">Zocker</a></li>
                            <li><a href="#">Mitre</a></li>
                            <li><a href="#">Biti’s</a></li>
                            <li><a href="#">Puma</a></li>
                            <li><a href="#">Under Armour</a></li>
                            <li><a href="#">New Banlance</a></li>
                            <li><a href="#">Iwin</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                <section class="hero hero-normal">
                <div class="container">
                    <?php
                        if(isset($_POST['search'])){
                            $key = $_POST['txsearch'];
                            if($key == ""){
                                echo "Vui long nhap vao thanh tim kiem";
                            }else{
                                $sql = "SELECT * FROM tbl_product WHERE id_product LIKE '%$key%' OR product_name LIKE '%$key%' OR price LIKE '%$key%' OR image LIKE'%$key%'";
                                $query = mysqli_query($con, $sql);
                                $count = mysqli_num_rows($query);
                                if($count <= 0){
                                    echo "ko tim thay <br>".$key." </br>";
                                }else{
                                    echo "tim thay ".$count.", ket qua <br>".$key." </br>";
                                }
                           }
                        }
                    ?>
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="" method="POST">
                                <input type="text" name="txsearch" placeholder="What do yo u need?"
                                 value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>">
                                <button type="submit" name="search" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class=" hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0355.249.737</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
                    <div class="hero__item set-bg" data-setbg="img/hero/benner.jpg">
                        <div class="hero__text">
                            <span>
                                CRISTIANO RONALDO
                            </span>
                            <h2 style="color:#fff">JUST DO IT <br />100%</h2>
                            <p style="color:#bac5ca">The moment lasts a second. The legend lasts forever</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
