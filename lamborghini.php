<?php include_once('include/head.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lamborghini</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <?php include_once('include/header.php') ?>

</head>
<body class="product-page">
    
    <?php include_once('include/nav.php') ?>

    <div class="product-page-header-container lamborghini-page-header-container">
        <div class="container">
            <div class="page-header">
                <h1>Lamborghini <small>Revuelto</small></h1>
            </div>
        </div>
    </div>

    <div class="product-page-content-container">
        <section class="product-description container">
            <div class="product-image-container col-sm-7">
                <div class="product-image">
                    <image src="images/lamborghini/lamborghini-bg1.png" />
                </div>
            </div>
            <div class="product-content col-sm-5">
                <img class="product-content-img" src="images/lamborghini/revuelto.png" />
                <span class="product-description">
                    The Revuelto is the beginning of a new era for Lamborghini, who has harnessed the power of hybridization technology to create the first HPEV (High Performance Electrified Vehicle). Responding to the need for sustainability and powerful performance, the Lamborghini Revuelto rewrites all paradigms and represents a technical masterpiece beyond anyone’s imagination. The iconic V12 engine finds a new life in this futuristic automotive masterwork that delivers unparalleled performance and driving emotions.
                </span>
                <p class="btn-more-container">
                    <a class="btn btn-primary btn-lg" href="javascript:void(0);" role="button">DISCOVER MORE</a>
                </p>
            </div>
        </section>
        <section class="product-info container" id="section-product-info">
            <div class="container">
                <div class="product-slider-container col-sm-6">
                    <ul class="owl-carousel owl-theme product-slider">
                        <li><img src="images/lamborghini/p1.jpg" /></li>
                        <li><img src="images/lamborghini/p2.jpg" /></li>
                        <li><img src="images/lamborghini/p3.jpg" /></li>
                        <li><img src="images/lamborghini/p4.jpg" /></li>
                    </ul>
                </div>
                <div class="product-detail-container col-sm-offset-1 col-sm-5">
                    <h1 class="product-name">
                        Lamborghini Revuelto
                    </h1>
                    <div class="product-specification">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>POWER (combined ICE+EE)</strong> : 1015 CV
                            </li>
                            <li class="list-group-item">
                                <strong>MAX. SPEED</strong> : >350 km/
                            </li>
                            <li class="list-group-item">
                                <strong>0-100 km/h</strong> : 2.5 s
                            </li>
                        </ul>
                    </div>
                    <div class="product-add-to-cart">
                        <form action="action/add_to_cart.php" method="POST" class="form-horizontal add-to-cart-form" onsubmit="return false;">
                            <div class="form-group">
                                <button type="submit" class="btn dark btn-primary btn-lg btn-add-to-cart">Add to Cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include_once('include/copyright.php') ?>

</body>

    <?php include_once('include/footer.php') ?>

</html>