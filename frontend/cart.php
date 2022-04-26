<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>
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
            if(!isset($_SESSION['carts'][$_POST['product_id']])){
                $_SESSION['carts'][$_POST['product_id']] = 0;
            }
            $_SESSION['carts'][$_POST['product_id']] += $_POST['quantity'] ?? 0; 
        }
        if(isset($_POST['update']) && $_POST['update'] == 'update'){
            $_SESSION['carts'] = $_POST['cart'] ?? '';
        } 
        $productCarts = $_SESSION['carts'];
        $ids = '';
        foreach($productCarts as $key => $value){
            $ids .= ','.$key;
        }
        $a = ltrim($ids,',');        
    ?>
    <section class="breadcrumb-section set-bg" data-setbg="img/hero/banner2.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <!-- <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shoping-cart spad">
        <div class="container">
            <form id="cart-form" action="cart.php" method="POST">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $product = "SELECT * FROM tbl_product WHERE id_product in($a)";
                                        $result = mysqli_query($con,$product);
                                        // var_dump($result);
                                        $total= 0;
                                        while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <tr>   
                                        <td class="shoping__cart__item">
                                            <img src="../backend/product/images/<?php echo $row['image'] ?? ''; ?>" alt="" Height="70" width="70">
                                            <h5><?php echo $row['product_name']?></h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            <?php
                                                echo number_format($row['price'], 0).' VND';
                                             ?>
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <?php 
                                            $quantity = '';
                                            foreach ($productCarts as $key => $value){   
                                                if($row['id_product'] == $key){
                                                    $quantity = $value;
                                                }  
                                            }
                                            $sum = $row['price'] * $quantity;
                                            $total += $sum;
                                            ?>
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input  type="text" value="<?php echo $quantity ?>" name="cart[<?php echo $row['id_product'] ?? ''; ?>]"/>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total"> <?php echo number_format($sum, 0).' VND';?></td>
                                        <td class="shoping__cart__item__close">
                                            <a href="deletecart.php?delete=<?php echo $row['id_product'] ?>" class="icon_close" name="delete" value="delete"></a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>  
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="form-buttom">
                        <!-- <span class="icon_loading"></span> -->
                        <input class="btn btn-primary" name="update" type="submit" value="update" ></input>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Total <span><?php echo number_format($total, 0).' VND'; ?></span></li>       
                            </ul>
                            <a href="checkout.php" class="primary-btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
  <?php include './layout/footer.php' ?>