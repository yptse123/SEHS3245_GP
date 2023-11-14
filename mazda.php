<?php include_once('include/head.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mazda | Sleipnir</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <?php include_once('include/header.php') ?>

</head>
<body class="product-page">
    
    <?php include_once('include/nav.php') ?>

    <div class="product-page-header-container mazda-page-header-container">
        <div class="container">
            <div class="page-header text-center">
                <h1>Mazda <small>MX-5</small></h1>
            </div>
        </div>
    </div>

    <div class="product-page-content-container">
        <section class="product-description container">
            <div class="product-image-container col-sm-7">
                <div class="product-image">
                    <image src="images/mazda/mazda-3.png" />
                </div>
            </div>
            <div class="product-content col-sm-5">
                <img class="product-content-img" src="images/mazda/mazda.png" />
                <span class="product-description">
                    The Mazda MX-5, also known as the Miata, is a legendary sports car that embodies driving pleasure. With its sleek design and timeless appeal, the MX-5 captures attention wherever it goes. Its elegant yet aggressive exterior features aerodynamic curves and sharp lines, complemented by a retractable soft top for a thrilling open-air experience. Despite its compact size, the MX-5 boasts a powerful and responsive engine, enhanced by its lightweight construction for agile handling. Inside, the driver-focused cabin showcases sophistication and comfort with intuitive controls and luxurious materials. The Mazda MX-5 is the perfect blend of performance, style, and driving enjoyment.
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
                        <li><img src="images/mazda/mazda-4.png" /></li>
                        <li><img src="images/mazda/mazda-5.png" /></li>
                        <li><img src="images/mazda/mazda-6.png" /></li>
                        <li><img src="images/mazda/mazda-7.png" /></li>
                    </ul>
                </div>
                <div class="product-detail-container col-sm-offset-1 col-sm-5">
                    <h2 class="product-name">
                        Mazda MX-5
                    </h2>
                    <div class="product-specification">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>POWER (hp)</strong> : 160
                            </li>
                            <li class="list-group-item">
                                <strong>MAX. SPEED</strong> : 214 km/h
                            </li>
                            <li class="list-group-item">
                                <strong>0-100 km/h</strong> : 7.3 s
                            </li>
                        </ul>
                    </div>
                    <div class="product-price price-deposit">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 
                        <span>Deposit: </span>
                        USD$ 2,805
                    </div>
                    <div class="product-add-to-cart">
                        <form action="action/add_to_cart.php" method="POST" class="form-horizontal add-to-cart-form" onsubmit="return false;">
                            <input type="hidden" name="product_id" value="1" />
                            <input type="hidden" name="product_name" value="Mazda MX-5" />
                            <input type="hidden" name="product_url" value="mazda.php#section-product-info" />
                            <input type="hidden" name="product_image_url" value="images/mazda/mazda-4.png" />
                            <input type="hidden" name="sales_price" value="2805" />
                            <input type="hidden" name="qty" value="1" />
                            <div class="form-group">
                                <button type="submit" class="btn dark btn-primary btn-lg btn-add-to-cart">
                                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> 
                                    Add to Cart
                                </button>
                                <img src="images/ajax-loader.gif" class="ajax-loader">
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
                    <h1>Mazda <small>Accessories</small></h1>
                </div>
                <div class="product-accessories-item text-center col-sm-3" id="product-id-2">
                    <div class="item-image thumbnail">
                        <img src="images/mazda/mazda-10.jpg" />
                    </div>
                    <h4 class="item-name">
                        Sunglasses Holder
                    </h4>
                    <h4 class="item-price">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 
                        USD$ 15
                    </h4>
                    <div class="product-add-to-cart">
                        <form action="action/add_to_cart.php" method="POST" class="form-horizontal add-to-cart-form" onsubmit="return false;">
                            <input type="hidden" name="product_id" value="2" />
                            <input type="hidden" name="product_name" value="Mazda - Sunglasses Holder" />
                            <input type="hidden" name="product_url" value="mazda.php#product-id-2" />
                            <input type="hidden" name="product_image_url" value="images/mazda/mazda-10.jpg" />
                            <input type="hidden" name="sales_price" value="15" />
                            <input type="hidden" name="qty" value="1" />
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-add-to-cart">
                                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> 
                                    Add to Cart
                                </button>
                                <img src="images/ajax-loader.gif" class="ajax-loader">
                                <div class="validation-add-to-cart invalid-feedback">
                                    Add to Cart Fail: Something wrong.
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="product-accessories-item text-center col-sm-3" id="product-id-3">
                    <div class="item-image thumbnail">
                        <img src="images/mazda/mazda-11.jpg" />
                    </div>
                    <h4 class="item-name">
                        Keychain
                    </h4>
                    <h4 class="item-price">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 
                        USD$ 11
                    </h4>
                    <div class="product-add-to-cart">
                        <form action="action/add_to_cart.php" method="POST" class="form-horizontal add-to-cart-form" onsubmit="return false;">
                            <input type="hidden" name="product_id" value="3" />
                            <input type="hidden" name="product_name" value="Mazda - Keychain" />
                            <input type="hidden" name="product_url" value="mazda.php#product-id-3" />
                            <input type="hidden" name="product_image_url" value="images/mazda/mazda-11.jpg" />
                            <input type="hidden" name="sales_price" value="11" />
                            <input type="hidden" name="qty" value="1" />
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-add-to-cart">
                                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> 
                                    Add to Cart
                                </button>
                                <img src="images/ajax-loader.gif" class="ajax-loader">
                                <div class="validation-add-to-cart invalid-feedback">
                                    Add to Cart Fail: Something wrong.
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="product-accessories-item text-center col-sm-3" id="product-id-4">
                    <div class="item-image thumbnail">
                        <img src="images/mazda/mazda-12.jpg" />
                    </div>
                    <h4 class="item-name">
                        Cup Holder
                    </h4>
                    <h4 class="item-price">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 
                        USD$ 10
                    </h4>
                    <div class="product-add-to-cart">
                        <form action="action/add_to_cart.php" method="POST" class="form-horizontal add-to-cart-form" onsubmit="return false;">
                            <input type="hidden" name="product_id" value="4" />
                            <input type="hidden" name="product_name" value="Mazda - Cup Holder" />
                            <input type="hidden" name="product_url" value="mazda.php#product-id-4" />
                            <input type="hidden" name="product_image_url" value="images/mazda/mazda-12.jpg" />
                            <input type="hidden" name="sales_price" value="10" />
                            <input type="hidden" name="qty" value="1" />
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-add-to-cart">
                                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> 
                                    Add to Cart
                                </button>
                                <img src="images/ajax-loader.gif" class="ajax-loader">
                                <div class="validation-add-to-cart invalid-feedback">
                                    Add to Cart Fail: Something wrong.
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="product-accessories-item text-center col-sm-3" id="product-id-5">
                    <div class="item-image thumbnail">
                        <img src="images/mazda/mazda-13.jpg" />
                    </div>
                    <h4 class="item-name">
                        Smart Key Fob Case
                    </h4>
                    <h4 class="item-price">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 
                        USD$ 20
                    </h4>
                    <div class="product-add-to-cart">
                        <form action="action/add_to_cart.php" method="POST" class="form-horizontal add-to-cart-form" onsubmit="return false;">
                            <input type="hidden" name="product_id" value="5" />
                            <input type="hidden" name="product_name" value="Mazda - Smart Key Fob Case" />
                            <input type="hidden" name="product_url" value="mazda.php#product-id-5" />
                            <input type="hidden" name="product_image_url" value="images/mazda/mazda-13.jpg" />
                            <input type="hidden" name="sales_price" value="20" />
                            <input type="hidden" name="qty" value="1" />
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-add-to-cart">
                                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> 
                                    Add to Cart
                                </button>
                                <img src="images/ajax-loader.gif" class="ajax-loader">
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