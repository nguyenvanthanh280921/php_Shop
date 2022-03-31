<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header search</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./home.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./home.php">Home</a></li>
                            <li><a href="./product.php">Shop</a></li>
                            <li><a href="./blog.php">Blog</a></li>
                            <li><a href="./contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>                         
                            <li><a href=""><i class="fa fa-user"></i></a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="hero__search">
                <div class="hero__search__form">
                    <form action="#">
                        <input type="text" placeholder="What do yo u need?">
                        <button type="submit" class="site-btn">SEARCH</button>
                    </form>
                </div>
                <div class=" hero__search__phone">
                    <div class="hero__search__phone__icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="hero__search__phone__text">
                        <h5>+48 35.249.737</h5>
                        <span>support 24/7 time</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>