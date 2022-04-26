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
    <?php
    include 'layout/header.php';
    include '../backend/connection.php';
    ?>
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/a.jpg">
                            <h5><a href="#">Fresh Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/b.jpg">
                            <h5><a href="#">Dried Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/c.jpg">
                            <h5><a href="#">Vegetables</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/d.jpg">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/l.jpg">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                        <?php
                            $listcate = "SELECT * FROM tbl_category";
                            $result = mysqli_query($con,$listcate) ;
                            while($row = mysqli_fetch_array($result)){
                        ?>
                            <!-- <li class="active" data-filter="*">All</li> -->
                            <li data-filter=".oranges"><a href="home.php?id=<?php echo $row['id_category'] ?>"><?php echo $row['category_name']?></a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="row featured__filter">
                <?php
                    $categoryId = $_GET['id'] ?? '';
                    $query = "SELECT * FROM tbl_product WHERE id_category = $categoryId";
                    // var_dump($query);die;
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg=" ">
                            <a href="./detail.php?getId=<?php echo $row['id_product']?> "><img src="../backend/product/images/<?php echo $row['image'] ?>" alt=""></a>
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="./detail.php?getId=<?php echo $row['id_product']?>"><?php echo $row['product_name'] ?></a></h6>
                            <h5><?php echo number_format($row['price'], 0). ' VNĐ'?></h5>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/a.jpg" alt=""  width="600" Height="200">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/b.png" alt="" width="600" Height="200">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/a.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Kamito while</h6>
                                        <span>$65.56</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/b.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Kamito red</h6>
                                        <span>$65.56</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/c.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Kamito blue</h6>
                                        <span>$65.56</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/d.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Adidas White gold </h6>
                                        <span>$79.26</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/a.png" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Adidas green</h6>
                                        <span>$50.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/b.png" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Adidas while</h6>
                                        <span>$50.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/j.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Nike hyper phantom</h6>
                                        <span>$109.26</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/g.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Nike mercurial</h6>
                                        <span>$80.26</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/h.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Nike mercurial red</h6>
                                        <span>$70.26</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/c.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Kamito blue </h6>
                                        <span>$50.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/bongda1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Nike hyper</h6>
                                        <span>$80.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/f.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Kamito black while</h6>
                                        <span>$90.50</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/bongda1.png" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Nike hyper phantom gray red</h6>
                                        <span>$100.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/k.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Nike mercurial orange</h6>
                                        <span>$80.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/d.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>adidas X Ghosted.3 TF EG8199 Inflight</h6>
                                        <span>$90.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/g.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>NIKE MERCURIAL SUPERFLY 8 ACADEMY TF</h6>
                                        <span>$90.52</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/k.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>NIKE MERCURIAL SUPERFLY 8 ACADEMY TF – CV0953-600 – GOLD</h6>
                                        <span>$100.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/h.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>NIKE MERCURIAL SUPERFLY 8 ACADEMY TF – CV0953-600 – RED</h6>
                                        <span>$95.20</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/2.png" alt="" width="100" Height="300">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> April 30,2022</li>
                                <li><i class="fa fa-comment-o"></i>50</li>
                            </ul>
                            <h5><a href="#">Special models of Nike shoes</a></h5>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/4.png" alt="" width="100" Height="300">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> April 30,2022</li>
                                <li><i class="fa fa-comment-o"></i>30</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare quality shoes when going out on the field</a></h5>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/3.png" alt="" width="100" Height="300">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> April 30,2022</li>
                                <li><i class="fa fa-comment-o"></i>20</li>
                            </ul>
                            <h5><a href="#">Visit new shoe models: NIKE, ADIDAS, KAMITO</a></h5>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <?php include 'layout/footer.php' ?>
</body>

</html>