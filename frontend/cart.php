<?php
    session_start();
    include './layout/search.php';
    include '../backend/connection.php';
    function read($name = null) {
        if (is_null($name)) {
            return $this->__returnSessionVars();
        }
        if (empty($name)) {
            return false;
        }
        $result = Set::classicExtract($_SESSION, $name);
    }
    // var_dump($_POST);die();

    if(isset($_POST['action']) && $_POST['action'] == 'add'){
        if(!isset($_SESSION['carts'][$_POST['product_id']])){
            $_SESSION['carts'][$_POST['product_id']] = 0;
        }
        $_SESSION['carts'][$_POST['product_id']] += $_POST['quantity'] ?? 0; 
    }
    if(isset($_POST['update']) && $_POST['update'] == 'update'){
        $_SESSION['carts'] = $_POST['cart'] ?? '';
    } 
    $productCarts =[];
    $ids = '';
    if(!empty($_SESSION['carts'])){
        $productCarts = $_SESSION['carts'] ?? '';
        foreach($productCarts as $key => $value){
            $ids .= ','.$key;
        }
        $ids = ltrim($ids,',');
    }
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
                                    $sql = "SELECT * FROM tbl_product WHERE id_product in($ids)";
                                    $result = mysqli_query($con,$sql);
                                    $total = 0;
                                    if($result == true){
                                        $total= 0;
                                        while($row = mysqli_fetch_assoc($result)){
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
                                                $quantity = isset($productCarts[$row['id_product']]) ? $productCarts[$row['id_product']] : 0;
                                                $sumPrice = (int)$row['price'] * $quantity ;
        
                                                $total += $sumPrice;
                                            ?>
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input  type="text" value="<?php echo $quantity ?>" name="cart[<?php echo $row['id_product'] ?? ''; ?>]"/>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total"> <?php echo number_format($sumPrice, 0).' VND';?></td>
                                        <td class="shoping__cart__item__close">
                                            <a href="deletecart.php?delete=<?php echo $row['id_product'] ?>" class="icon_close" name="delete" value="delete"></a>
                                        </td>
                                    </tr>
                                <?php  }  ?>
                                <?php } else{ ?>
                                    <tr>
                                        <td colspan="5">Gio hang cua ban trong!!!</td>
                                    </tr>
                                <?php } ?>        
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="product.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        <input class="btn btn-primary" name="update" type="submit" value="update" /></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li> Total <span><?php echo number_format($total, 0).' VND'; ?></span></li>       
                        </ul>
                        <a href="checkout.php" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php include './layout/footer.php' ?>

