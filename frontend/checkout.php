<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tsport</title>

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
    <!-- Page Preloder -->
    <?php
     include './layout/search.php'; 
     include '../backend/connection.php';
        session_start();
        if(isset($_POST['action']) && $_POST['action'] == 'add'){
            $_SESSION['carts'][$_POST['product_id']] += $_POST['quantity'] ?? 0;
        }
        $productCarts = $_SESSION['carts'];
        // echo "<pre/>";
        // print_r ($_SESSION['carts']);
        $ids = '';
        foreach($productCarts as $key => $value){
            $ids .= ','.$key;
        }
        $a = ltrim($ids,',');   
    ?>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./home.php">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="checkout.php" method="POST">
                    <?php
                     
                    // $error = false;
                    //     if(isset ($_POST['click-order'])){
                    //         if(empty($_POST['name'])){
                    //             $error = "Bạn chưa nhập tên người nhận";
                    //         }
                    //         elseif(empty($_POST['phone'])){
                    //             $error = "Bạn chưa nhập tên người nhận";
                    //         }
                    //         elseif(empty($_POST['email'])){
                    //             $error = "Bạn chưa nhập mail người nhận";
                    //         }
                    //         elseif(empty($_POST['address'])){
                    //             $error = "Bạn chưa nhập địa chỉ người nhận";
                    //         }
                    //         echo $error;
                    //     }
                    ?>
                    <div class="row">
                        <div class="col-lg-7 col-md-6">                     
                                <div class="checkout__input">
                                        <p>Name<span>*</span></p>
                                        <input type="text" name="name">
                                </div> 
                            <div class="row">         
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Country<span>*</span></p>
                                        <input type="text" name="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone">
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text">
                            </div>
                            <!-- <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text">
                            </div>
                            
                            <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Create an account?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Create an account by entering the information below. If you are a returning customer
                                please login at the top of the page</p>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="text">
                            </div> -->
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <?php
                                    $product = "SELECT * FROM tbl_product WHERE id_product in($a)";
                                    $result = mysqli_query($con,$product);
                                    // var_dump($result);
                                    $total= 0;
                                    while($row = mysqli_fetch_array($result)){
                                ?>
                                <ul>
                                    <?php 
                                    $quantity = '';
                                    foreach ($productCarts as $key => $value){   
                                        if($row['id_product'] == $key){
                                            $quantity = $value;
                                        }  
                                    }
                                    $sum = $row['price'] * $quantity;
                                    $total +=$sum;
                                    ?>
                                    <li><?php echo $row['product_name'] ?> <span><?php echo number_format($sum, 0).' VND';?></span></li>
                                </ul>
                                <?php
                                }
                                ?>
                                <div class="checkout__order__total">Total <span><?php echo number_format($total, 0).' VND'; ?></span></div>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" name="click-order" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
<?php include './layout/footer.php'; ?>