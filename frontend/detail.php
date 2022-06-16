<?php
include 'layout/search.php';
include '../backend/connection.php';
?>
<div id="preloder">
        <div class="loader"></div>
</div>
<section class="breadcrumb-section set-bg" data-setbg="img/hero/banner2.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Details Product</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.php">Home</a>
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
    $productId = $_GET['getId'];
    $query = "SELECT * FROM tbl_product WHERE id_product=$productId";
    $result = mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large bg-image hover-zoom"
                             src="../backend/product/images/<?php echo $row['image'] ?? ''; ?>" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <?php
                        $sql = "SELECT * FROM tbl_product_images WHERE id_product = $productId ORDER BY id_product  ASC";
                        $result = mysqli_query($con, $sql);
                        foreach ($result as $i => $productImage){
                            ?>
                            <img data-imgbigurl="../backend/product/product-image/<?php echo $productImage['product_images'] ?>"
                                 src="../backend/product/product-image/<?php echo $productId; ?>/<?php echo $productImage['product_images'] ?>" alt="">
                        <?php } ?>
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
                    <p>Put your dreams on your feet and lead the way for them to come true.’ - Roger Vivier</p>
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
                            <span style="color: red;font-weight: 800;">
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
        <div class="row">
            <?php
                $sql = "SELECT * FROM tbl_product ORDER BY id_product ASC LIMIT 5";
                $result = mysqli_query($con,$sql);
                foreach ($result as $i => $row){
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="">
                            <a href="./detail.php?getId=<?php echo $row['id_product']?> "><img src="../backend/product/images/<?php echo $row['image'] ?>" alt=""></a>
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#"><?php echo $row['product_name'] ?></a></h6>
                            <h5><?php echo number_format($row['price'], 0). ' VNĐ'?></h5>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</section>
<?php include './layout/footer.php' ?>