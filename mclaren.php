<?php include_once('include/head.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mclaren | Sleipnir</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <?php include_once('include/header.php') ?>

</head>
<body class="product-page">
    
    <?php include_once('include/nav.php') ?>

    <div class="product-page-header-container mclaren-page-header-container">
        <div class="container">
            <div class="page-header text-center">
                <h1>Mclaren <small>60th Anniversary options</small></h1>
            </div>
        </div>
    </div>

    <div class="product-page-content-container">
        <section class="product-description container">
            <div class="product-image-container col-sm-7">
                <div class="product-image">
                    <image src="images/mclaren/McLaren_60th.png" />
                </div>
            </div>
            <div class="product-content col-sm-5">
                <img class="product-content-img" src="images/mclaren/mclaren-new-name-planetf1.png" />
                <span class="product-description">
                    <b><i>McLaren's</i></b> slogan is <i><u>"Progress, Vision, Achievement, and Innovation."</u></i> The characteristics that have shaped our first sixty years will also shape our future. History is not a static moment in time. They create it each and every day. Every gramme spared, every second gained. Every McLaren that is equipped with a component from their 60th Anniversary Options will also proudly display an exquisite, brushed aluminum Dedication Plaque, which has an exquisitely debossed and memorably evocative "Speedy Kiwi" in McLaren Orange, as a way to commemorate history in motion. A well thought-out reminder of our exciting, long-lasting heritage. each and every time you enter the cockpit.
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
                        <li><img src="images/mclaren/01.jpg" /></li>
                        <li><img src="images/mclaren/02.jpg" /></li>
                        <li><img src="images/mclaren/03.jpeg" /></li>
                        <li><img src="images/mclaren/04.jpeg" /></li>
                    </ul>
                </div>
                <div class="product-detail-container col-sm-offset-1 col-sm-5">
                    <h2 class="product-name">
                        McLaren 750S
                    </h2>
                    <div class="product-specification">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>POWER</strong> : 750ps
                            </li>
                            <li class="list-group-item">
                                <strong>MAX. SPEED</strong> : >330 km/h (206mph)
                            </li>
                            <li class="list-group-item">
                                <strong>0-100 km/h</strong> : 2.8 s
                            </li>
                            <li class="list-group-item">
                                <strong>Fuel tank capacity</strong> : 72 litres (15.8 UK gallons / 19 USA gallons)
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
                            <input type="hidden" name="product_id" value="6" />
                            <input type="hidden" name="product_name" value="McLaren 750S" />
                            <input type="hidden" name="product_url" value="mclaren.php#section-product-info" />
                            <input type="hidden" name="product_image_url" value="images/mclaren/01.jpg" />
                            <input type="hidden" name="sales_price" value="2000" />
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
                    <h1>McLaren <small>Accessories</small></h1>
                </div>
                <div class="product-accessories-item text-center col-sm-3" id="product-id-7">
                    <div class="item-image thumbnail">
                        <img src="images/mclaren/item1.jpg" />
                    </div>
                    <h4 class="item-name">
                        McLaren Speed Champion LEGO
                    </h4>
                    <h4 class="item-price">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 
                        USD$ 100
                    </h4>
                    <div class="product-add-to-cart">
                        <form action="action/add_to_cart.php" method="POST" class="form-horizontal add-to-cart-form" onsubmit="return false;">
                            <input type="hidden" name="product_id" value="7" />
                            <input type="hidden" name="product_name" value="McLaren - McLaren Speed Champion LEGO" />
                            <input type="hidden" name="product_url" value="mclaren.php#product-id-7" />
                            <input type="hidden" name="product_image_url" value="images/mclaren/item1.jpg" />
                            <input type="hidden" name="sales_price" value="100" />
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

                <div class="product-accessories-item text-center col-sm-3" id="product-id-8">
                    <div class="item-image thumbnail">
                        <img src="images/mclaren/item2.jpg" />
                    </div>
                    <h4 class="item-name">
                        McLaren Renault New Era 9FORTY Essentials Black Baseball Hat
                    </h4>
                    <h4 class="item-price">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 
                        USD$ 100
                    </h4>
                    <div class="product-add-to-cart">
                        <form action="action/add_to_cart.php" method="POST" class="form-horizontal add-to-cart-form" onsubmit="return false;">
                            <input type="hidden" name="product_id" value="8" />
                            <input type="hidden" name="product_name" value="McLaren - McLaren Renault New Era 9FORTY Essentials Black Baseball Hat" />
                            <input type="hidden" name="product_url" value="mclaren.php#product-id-8" />
                            <input type="hidden" name="product_image_url" value="images/mclaren/item2.jpg" />
                            <input type="hidden" name="sales_price" value="100" />
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

                <div class="product-accessories-item text-center col-sm-3" id="product-id-9">
                    <div class="item-image thumbnail">
                        <img src="images/mclaren/item3.jpg" />
                    </div>
                    <h4 class="item-name">
                        McLaren 2023 Team Men Zipper Jacket Coat F1 New Season Racing Team Hoodie Spring Autumn Casual Women Sweatshirt
                    </h4>
                    <h4 class="item-price">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 
                        USD$ 100
                    </h4>
                    <div class="product-add-to-cart">
                        <form action="action/add_to_cart.php" method="POST" class="form-horizontal add-to-cart-form" onsubmit="return false;">
                            <input type="hidden" name="product_id" value="9" />
                            <input type="hidden" name="product_name" value="McLaren - McLaren 2023 Team Men Zipper Jacket Coat F1 New Season Racing Team Hoodie Spring Autumn Casual Women Sweatshirt" />
                            <input type="hidden" name="product_url" value="mclaren.php#product-id-9" />
                            <input type="hidden" name="product_image_url" value="images/mclaren/item3.jpg" />
                            <input type="hidden" name="sales_price" value="100" />
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

                <div class="product-accessories-item text-center col-sm-3" id="product-id-10">
                    <div class="item-image thumbnail">
                        <img src="images/mclaren/item4.jpg" />
                    </div>
                    <h4 class="item-name">
                        Castore McLaren 2023 Kids Lando Norris Driver T-Shirt
                    </h4>
                    <h4 class="item-price">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 
                        USD$ 100
                    </h4>
                    <div class="product-add-to-cart">
                        <form action="action/add_to_cart.php" method="POST" class="form-horizontal add-to-cart-form" onsubmit="return false;">
                            <input type="hidden" name="product_id" value="10" />
                            <input type="hidden" name="product_name" value="McLaren - Castore McLaren 2023 Kids Lando Norris Driver T-Shirt" />
                            <input type="hidden" name="product_url" value="mclaren.php#product-id-10" />
                            <input type="hidden" name="product_image_url" value="images/mclaren/item4.jpg" />
                            <input type="hidden" name="sales_price" value="100" />
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