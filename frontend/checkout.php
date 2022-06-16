<?php
    session_start();
    include './layout/search.php'; 
    include '../backend/connection.php';
     
    if(isset($_POST['action']) && $_POST['action'] == 'add'){
        $_SESSION['carts'][$_POST['product_id']] += $_POST['quantity'] ?? 0;
    }
    $productCarts = $_SESSION['carts'];
    $ids = '';
    foreach($productCarts as $key => $val){
        $ids .= ','.$key;
    }
    $ids = ltrim($ids,','); 
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
                        <a href="./index.php">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
                    <div class="col-lg-5 col-md-6">
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
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Products Name</th>
                                        <th scope="col">Images</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $sql = "SELECT * FROM tbl_product WHERE id_product in($ids)";
                                    $result = mysqli_query($con,$sql);
                                    $total= 0;
                                    while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <?php
                                    $quantity = isset($productCarts[$row['id_product']]) ? $productCarts[$row['id_product']] : 0;
                                    $sumPrice = (int)$row['price'] * $quantity ;
                                    $total += $sumPrice;
                                ?>
                                    <tr>
                                        <td><?php echo $row['product_name'] ?></td>
                                        <td scope="row"><img src="../backend/product/images/<?php echo $row['image'] ?? ''; ?>" alt="" Height="70" width="70"> </td>
                                        <td><?php echo number_format($sumPrice, 0).' VND';?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
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
<?php include './layout/footer.php'; ?>