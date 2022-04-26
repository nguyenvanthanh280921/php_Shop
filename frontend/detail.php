<!DOCTYPE html>
<html lang="zxx">

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
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <?php
        include 'layout/search.php';
        include '../backend/connection.php';
    ?> 
    <section class="breadcrumb-section set-bg" data-setbg="img/hero/banner2.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Details Product</h2>
                        <div class="breadcrumb__option">
                            <a href="./home.php">Home</a>
                            <a href="./product.php">Products</a>
                            <span>Details Product</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-details spad">
        <?php
            include '../backend/connection.php';
            $productId = $_GET['getId'];
            $query = "select * from tbl_product where id_product=$productId";    
            $result = mysqli_query($con,$query);
            $row=mysqli_fetch_assoc($result);
            $imgLibrary = "select * from image_library where id_product = $productId";
            $result['images'] = mysqli_fetch_all($imgLibrary, MYSQLI_ASSOC);
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="../backend/product/images/<?php echo $row['image'] ?? ''; ?>" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel"> 
                            <img data-imgbigurl="img/product/details/product-details-2.jpg"
                                src="img/product/details/thumb-1.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-3.jpg"
                                src="img/product/details/thumb-2.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-5.jpg"
                                src="img/product/details/thumb-3.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-4.jpg"
                                src="img/product/details/thumb-4.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $row['product_name'] ?? ''; ?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span></span>
                        </div>
                        <div class="product__details__price"><?php echo number_format($row['price'],0).' VNĐ';?></div>
                        <form id="add-to-cart-form" action="./cart.php" method="POST">
                            <div class="product__details__quantity">
                                <div class="quantity">
                                <input type="hidden" value="<?php echo $row['id_product'] ?? ''; ?>" name="product_id">
                                    <div class="pro-qty">
                                        <input type="text" value="1" name="quantity" size="2">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="action" value="add" class="primary-btn btn"></input>
                        </form>
                        
                        <ul>
                            <li><b>Availability</b> 
                                <span>
                                    <?php
                                        if($row['number'] >=1){
                                            echo 'IN STOCK';
                                        }else{
                                            echo 'OUT STOCK';
                                        }
                                    ?>
                                </span>
                            </li>
                            <li><b>Size</b> <span><?php echo $row['product_size'] ?></span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <?php echo $row['product_detail'] ?? ''; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <?php
                $query = "SELECT * FROM tbl_category ORDER BY id_category DESC";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            }
            ?>
        </div>
    </section>
    <!-- Related Product Section End -->

    <!-- Footer Section Begin -->
    <?php include './layout/footer.php' ?>


</body>

</html>