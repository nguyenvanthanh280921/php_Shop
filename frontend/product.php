<?php
    include './layout/search.php';
    require_once("../backend/connection.php");
?>
<div id="preloder">
    <div class="loader"></div>
</div>
<section class="breadcrumb-section set-bg" data-setbg="img/hero/banner2.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Tsport Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.php">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
                        <?php
                        $listcate = "SELECT * FROM tbl_category";
                        $result = mysqli_query($con,$listcate) ;
                        while($row = mysqli_fetch_array($result)){
                        ?>
                    <ul>
                        <li>
                            <a href="#" value="<?php echo $row['id_category'] ?>"><?php echo $row['category_name']?></a>
                        </li>
                        </ul>
                        <?php }?>
                    </div>
                    <div class="sidebar__item">
                        <h4>Price</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item sidebar__item__color--option">
                        <h4>Colors</h4>
                        <div class="sidebar__item__color sidebar__item__color--white">
                            <label for="white">
                                White
                                <input type="radio" id="white">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--gray">
                            <label for="gray">
                                Gray
                                <input type="radio" id="gray">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--red">
                            <label for="red">
                                Red
                                <input type="radio" id="red">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--black">
                            <label for="black">
                                Black
                                <input type="radio" id="black">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--blue">
                            <label for="blue">
                                Blue
                                <input type="radio" id="blue">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--green">
                            <label for="green">
                                Green
                                <input type="radio" id="green">
                            </label>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <h4>Popular Size</h4>
                        <div class="sidebar__item__size">
                            <label for="large">
                                39
                                <input type="radio" id="large">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="large">
                                40
                                <input type="radio" id="large">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="large">
                                41
                                <input type="radio" id="large">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="medium">
                                42
                                <input type="radio" id="medium">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="small">
                                43
                                <input type="radio" id="small">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="tiny">
                                44
                                <input type="radio" id="tiny">
                            </label>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/kamito.webp" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>
                                                Kamito Tứ Linh - Quy Chính Hãng TF
                                            </h6>
                                            <span>$300.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/kamito1.webp" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Kamito Tứ Linh - Long Vàng Đen Chính Hãng TF</h6>
                                            <span>$300.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/kamito2.webp" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Kamito Linh Phượng Đỏ Chính Hãng TF</h6>
                                            <span>$300.00</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/bongda9.jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Nike Mercurial Dream Speed Superfly 8 Elite FG</h6>
                                            <span>$400.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/images (1).jpg" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>MTZ Mercurial Hero_2 16x9_hd_1600</h6>
                                            <span>$400.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/latest-product/abcd.webp" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Nike Mercurial superfly VII dream speed 3 elite fg</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/latest-product/kamito.webp">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Kamito</span>
                                            <h5><a href="#">Kamito Tứ Linh - Quy Chính Hãng TF</a></h5>
                                            <div class="product__item__price">$300.00 <span>$30.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/latest-product/kamito1.webp">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Kamito</span>
                                            <h5><a href="#">Kamito Tứ Linh - Long Vàng Đen Chính Hãng TF</a></h5>
                                            <div class="product__item__price">$300.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/latest-product/kamito2.webp">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Kamito</span>
                                            <h5><a href="#">Kamito Linh Phượng Đỏ Chính Hãng TF</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/latest-product/kamito.webp">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Kamito</span>
                                            <h5><a href="#">Kamito Tứ Linh - Quy Chính Hãng TF</a></h5>
                                            <div class="product__item__price">$300.00 <span>$30.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/latest-product/kamito1.webp">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Kamito</span>
                                            <h5><a href="#">Kamito Tứ Linh - Long Vàng Đen Chính Hãng TF</a></h5>
                                            <div class="product__item__price">$300.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/latest-product/kamito2.webp">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Kamito</span>
                                            <h5><a href="#">Kamito Linh Phượng Đỏ Chính Hãng TF</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>16</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                          }else{
                            $page = 1;
                          }
                          $num_per_page = 6;
                          $start_from = ($page -1 ) * $num_per_page;
                          $query = "SELECT * FROM tbl_product left join tbl_category
                                    on tbl_product.id_category = tbl_category.id_category ORDER BY id_product ASC LIMIT $start_from,$num_per_page";
                          $result = mysqli_query($con,$query);
                            foreach ($result as $i => $row) {
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="">
                                    <a href="./detail.php?getId=<?php echo $row['id_product']?>"><img src="../backend/product/images/<?php echo $row['image'] ?>" alt=""></a>
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li id="cart">
                                            <a href="cart.php"><i class="fa fa-shopping-cart">
                                                <?php if (isset($_SESSION['cart'])) {
                                                    echo count($_SESSION['cart']) ;
                                                    } else echo "0";
                                                    ?>
                                                </i>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="./detail.php?getId=<?php echo $row['id_product']?>"><?php echo $row['product_name'] ?></a></h6>
                                    <h5><?php echo number_format($row['price'],0).' VNĐ'; ?></h5>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                        <div class="product__pagination">
                            <?php
                            $pr_query = "SELECT * FROM tbl_product";
                            $query_num = mysqli_query($con,$pr_query);
                            $totalrecord = mysqli_num_rows($query_num);
                            $totalpage = ceil($totalrecord/$num_per_page);
                            if($page>1){
                                echo "<a href='product.php?page=".($page-1)."'class='btn btn-outline-success'>Previous</a>";
                            }
                            for($i = 1; $i<=$totalpage;$i++){
                                if($i == $page){
                                    echo '<a class="active btn btn-light">'.$i.'</a>';
                                }else{
                                    echo "  <a href='product.php?page=".$i."' class=' btn btn-light'>$i</a>";
                                }
                            }
                            if($i > $page && $page != $totalpage){
                                echo "<a href='product.php?page=".($page+1)."'class='btn btn-outline-success'>Next</a>";
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
<?php include 'layout/footer.php' ?>