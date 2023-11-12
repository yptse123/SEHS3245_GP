<?php include_once('include/head.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lamborghini | Sleipnir</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <?php include_once('include/header.php') ?>

</head>
<body class="product-page">
    
    <?php include_once('include/nav.php') ?>

    <div class="product-page-header-container lamborghini-page-header-container">
        <div class="container">
            <div class="page-header text-center">
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
                    The Revuelto honors the Lamborghini tradition and ushers in a new era even in its exterior design. While the car’s silhouette follows the iconic single center line, the sharply sculpted lines and smooth negative radiuses create a high-tech shape that puts the Revuelto unmistakably in the new generation of Lamborghini supercars. The iconic V12 is celebrated by being on full display in the rear.
                </span>
                <p class="btn-more-container">
                    <a class="btn btn-primary btn-lg" href="javascript:void(0);" role="button">
                        <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                        DISCOVER MORE
                    </a>
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
                    <h2 class="product-name">
                        Lamborghini Revuelto
                    </h2>
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
                    <div class="product-price price-deposit">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 
                        <span>Deposit: </span>
                        USD$ 2,000
                    </div>
                    <div class="product-add-to-cart">
                        <form action="action/add_to_cart.php" method="POST" class="form-horizontal add-to-cart-form" onsubmit="return false;">
                            <input type="hidden" name="product_id" value="11" />
                            <input type="hidden" name="product_name" value="Lamborghini Revuelto" />
                            <input type="hidden" name="product_url" value="lamborghini.php#section-product-info" />
                            <input type="hidden" name="product_image_url" value="images/lamborghini/p1.jpg" />
                            <input type="hidden" name="sales_price" value="2000" />
                            <input type="hidden" name="qty" value="1" />
                            <div class="form-group">
                                <button type="submit" class="btn dark btn-primary btn-lg btn-add-to-cart">
                                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> 
                                    Add to Cart
                                </button>
                                <img src="images/ajax-loader-black.gif" class="ajax-loader">
                                <div class="validation-add-to-cart invalid-feedback">
                                    Add to Cart Fail: Something wrong.
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-accessories container" id="section-product-accessories">
            <div class="product-accessories-container container">
                <div class="page-header">
                    <h1>Lamborghini <small>Accessories</small></h1>
                </div>
                <div class="product-accessories-item text-center col-sm-3" id="product-id-12">
                    <div class="item-image thumbnail">
                        <img src="images/lamborghini/item1.jpg" />
                    </div>
                    <h4 class="item-name">
                        LEGO TECHNIC LAMBORGHINI SIÁN FKP 37
                    </h4>
                    <h4 class="item-price">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 
                        USD$ 100
                    </h4>
                    <div class="product-add-to-cart">
                        <form action="action/add_to_cart.php" method="POST" class="form-horizontal add-to-cart-form" onsubmit="return false;">
                            <input type="hidden" name="product_id" value="12" />
                            <input type="hidden" name="product_name" value="LEGO TECHNIC LAMBORGHINI SIÁN FKP 37" />
                            <input type="hidden" name="product_url" value="lamborghini.php#product-id-12" />
                            <input type="hidden" name="product_image_url" value="images/lamborghini/item1.jpg" />
                            <input type="hidden" name="sales_price" value="100" />
                            <input type="hidden" name="qty" value="1" />
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-add-to-cart">
                                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> 
                                    Add to Cart
                                </button>
                                <img src="images/ajax-loader-black.gif" class="ajax-loader">
                                <div class="validation-add-to-cart invalid-feedback">
                                    Add to Cart Fail: Something wrong.
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="product-accessories-item text-center col-sm-3" id="product-id-13">
                    <div class="item-image thumbnail">
                        <img src="images/lamborghini/item2.jpg" />
                    </div>
                    <h4 class="item-name">
                        WIRELESS MW75 HEADPHONES BY MASTER & DYNAMIC
                    </h4>
                    <h4 class="item-price">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 
                        USD$ 100
                    </h4>
                    <div class="product-add-to-cart">
                        <form action="action/add_to_cart.php" method="POST" class="form-horizontal add-to-cart-form" onsubmit="return false;">
                            <input type="hidden" name="product_id" value="13" />
                            <input type="hidden" name="product_name" value="WIRELESS MW75 HEADPHONES BY MASTER & DYNAMIC" />
                            <input type="hidden" name="product_url" value="lamborghini.php#product-id-13" />
                            <input type="hidden" name="product_image_url" value="images/lamborghini/item2.jpg" />
                            <input type="hidden" name="sales_price" value="100" />
                            <input type="hidden" name="qty" value="1" />
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-add-to-cart">
                                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> 
                                    Add to Cart
                                </button>
                                <img src="images/ajax-loader-black.gif" class="ajax-loader">
                                <div class="validation-add-to-cart invalid-feedback">
                                    Add to Cart Fail: Something wrong.
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="product-accessories-item text-center col-sm-3" id="product-id-14">
                    <div class="item-image thumbnail">
                        <img src="images/lamborghini/item3.jpg" />
                    </div>
                    <h4 class="item-name">
                        WIRELESS MW08 SPORT EARBUDS FROM MASTER & DYNAMIC
                    </h4>
                    <h4 class="item-price">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 
                        USD$ 100
                    </h4>
                    <div class="product-add-to-cart">
                        <form action="action/add_to_cart.php" method="POST" class="form-horizontal add-to-cart-form" onsubmit="return false;">
                            <input type="hidden" name="product_id" value="14" />
                            <input type="hidden" name="product_name" value="WIRELESS MW08 SPORT EARBUDS FROM MASTER & DYNAMIC" />
                            <input type="hidden" name="product_url" value="lamborghini.php#product-id-14" />
                            <input type="hidden" name="product_image_url" value="images/lamborghini/item3.jpg" />
                            <input type="hidden" name="sales_price" value="100" />
                            <input type="hidden" name="qty" value="1" />
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-add-to-cart">
                                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> 
                                    Add to Cart
                                </button>
                                <img src="images/ajax-loader-black.gif" class="ajax-loader">
                                <div class="validation-add-to-cart invalid-feedback">
                                    Add to Cart Fail: Something wrong.
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="product-accessories-item text-center col-sm-3" id="product-id-15">
                    <div class="item-image thumbnail">
                        <img src="images/lamborghini/item4.jpg" />
                    </div>
                    <h4 class="item-name">
                        CAP WITH SILVER-TONE SHIELD LOGO
                    </h4>
                    <h4 class="item-price">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 
                        USD$ 100
                    </h4>
                    <div class="product-add-to-cart">
                        <form action="action/add_to_cart.php" method="POST" class="form-horizontal add-to-cart-form" onsubmit="return false;">
                            <input type="hidden" name="product_id" value="15" />
                            <input type="hidden" name="product_name" value="CAP WITH SILVER-TONE SHIELD LOGO" />
                            <input type="hidden" name="product_url" value="lamborghini.php#product-id-15" />
                            <input type="hidden" name="product_image_url" value="images/lamborghini/item4.jpg" />
                            <input type="hidden" name="sales_price" value="100" />
                            <input type="hidden" name="qty" value="1" />
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-add-to-cart">
                                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> 
                                    Add to Cart
                                </button>
                                <img src="images/ajax-loader-black.gif" class="ajax-loader">
                                <div class="validation-add-to-cart invalid-feedback">
                                    Add to Cart Fail: Something wrong.
                                </div>
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