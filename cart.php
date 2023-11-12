<?php include_once('include/head.php') ?>

<?php

    if(isset($_SESSION["quote"]["id"])) {

        // get quote info
        $quote = getQuoteById($pdo, $_SESSION["quote"]["id"]);

        if($quote) {

            $couponCode = $quote["coupon_code"];

            if(empty($couponCode)) {

                //preset coupon for testing
                $couponCode = "coupon001";
            }

            // get all quote items
            $quoteItems = getQuoteItemByQuoteId($pdo, $quote["id"]);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shopping Cart | Sleipnir</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <?php include_once('include/header.php') ?>

</head>
<body class="cart-page">
    
    <?php include_once('include/nav.php') ?>

    <div class="cart-page-header-container">
        <div class="container">
            <div class="page-header text-center">
                <h1>Shopping Cart</h1>
            </div>
            <div class="alert alert-success" role="alert"></div>
        </div>
    </div>

    <div class="cart-page-content-container">
        <div class="container">

            <?php if($_SESSION["quote"]["total_qty"] == 0): ?>
            
            <div class="jumbotron">
                <h3>SHOPPING CART IS EMPTY</h3>
                <div>You have no items in your shopping cart.</div>
                <div>
                    Click 
                    <a class="btn btn-primary dark" href="index.php" role="button">Here</a> to continue shopping.
                </div>
            </div>

            <?php else: ?>
                
            <section class="cart-table table-responsive col-sm-12">
                <table class="table">
                    <tr>
                        <th></th>
                        <th class="text-left">PRODUCT NAME</th>
                        <th class="text-left">PRICE</th>
                        <th class="text-left">QTY</th>
                        <th class="text-left">SUBTOTAL</th>
                        <th></th>
                    </tr>

                    <?php foreach ($quoteItems as $quoteItem): ?>

                    <tr class="row-<?php echo $quoteItem["id"] ?>">
                        <td><img src="<?php echo $quoteItem["product_image_url"] ?>" /></td>
                        <td>
                            <a href="<?php echo $quoteItem["product_url"] ?>">
                                <?php echo $quoteItem["product_name"] ?>
                            </a>
                        </td>
                        <td class="item-price"><?php echo $quoteItem["sales_price"] ?></td>
                        <td>
                            <a href="javascript:void(0);" class="qty-dec">-</a>
                            <input type="hidden" class="update-item-qty" name="qty[<?php echo $quoteItem["id"] ?>]" min="1" value="<?php echo $quoteItem["qty"] ?>" form="update-cart-form" />
                            <span class="item-qty"><?php echo $quoteItem["qty"] ?></span>
                            <a href="javascript:void(0);" class="qty-inc">+</a>
                        </td>
                        <td class="item-subtotal"><?php echo $quoteItem["sales_price"]*$quoteItem["qty"] ?></td>
                        <td>
                            <form action="action/remove_item.php" method="POST" class="form-horizontal remove-item-form" onsubmit="return false;">
                                <input type="hidden" name="id" value="<?php echo $quoteItem["id"] ?>" />
                                <button type="submit" class="btn btn-primary btn-remove-item">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
                                </button>
                                <img src="images/ajax-loader-black.gif" class="ajax-loader">
                                <div class="validation-remove-item invalid-feedback">
                                    Remove Item Fail: Something wrong.
                                </div>
                            </form>
                        </td>
                    </tr>

                    <?php endforeach; ?>

                </table>
            </section>

            <section class="cart-action col-sm-12">
                <div class="col-sm-4">
                    <form action="action/update_cart.php" method="POST" id="update-cart-form" class="form-horizontal" onsubmit="return false;">
                        <input type="hidden" name="id" value="<?php echo $_SESSION["quote"]["id"] ?>" />
                        <button type="submit" class="btn btn-primary dark btn-update-cart">
                            Update Cart
                        </button>
                        <img src="images/ajax-loader-black.gif" class="ajax-loader">
                        <div id="validation-update-cart-submit" class="invalid-feedback">
                            Update Cart Fail: Something wrong.
                        </div>
                    </form>
                </div>
                <div class="col-sm-8 text-right">
                    <a href="index.php" class="btn btn-primary dark btn-continue-to-shopping">
                        Continue to Shopping
                    </a>
                </div>
            </section>

            <section class="cart-bottom col-sm-12">
                <div class="cart-coupon-container col-sm-6">
                    <div class="cart-coupon-title">
                        ENTER YOUR COUPON CODE
                    </div>
                    <div class="cart-coupon-form">
                        <form action="action/apply_coupon.php" method="POST" id="cart-coupon-form" class="form-horizontal" onsubmit="return false;">
                            <input type="hidden" name="id" value="<?php echo $_SESSION["quote"]["id"] ?>" />
                            <div class="form-group">
                                <label for="cart-coupon" class="col-sm-12 control-label text-left hidden">Coupon Code</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="cart-coupon" name="coupon_code" value="<?php echo $couponCode ?>" placeholder="Coupon Code" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 text-left">
                                    <button type="submit" class="btn btn-default btn-cart-coupon dark">Apply Coupon</button>
                                    <img src="images/ajax-loader-black.gif" class="ajax-loader">
                                </div>
                                <div id="validation-cart-coupon-submit" class="invalid-feedback">
                                    Apply Coupon: Something wrong.
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="cart-total-container col-sm-6">
                    <div class="cart-total-table table-responsive col-sm-12">
                        <table class="table">
                            <tr>
                                <td>Subtotal</td>
                                <td class="subtotal text-right"><?php echo $quote["subtotal"] ?></td>
                            </tr>
                            <tr>
                                <td>Discount</td>
                                <td class="discount text-right"><?php echo $quote["discount"] ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <h3>Grand Total (USD)</h3>
                                </td>
                                <td class="text-right">
                                    <h3 class="grand-total"><?php echo $quote["grand_total"] ?></h3>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="cart-total-button text-right">
                        <a class="btn btn-primary btn-lg white btn-checkout" href="javascript:void(0);" role="button">
                            PROCEED TO CHECKOUT
                        </a>
                    </div>
                </div>
            </section>

            <section class="cart-action col-sm-12" id="checkout-section">
                <form action="action/place_order.php" method="POST" id="place-order-form" class="form-horizontal" onsubmit="return false;">
                    <input type="hidden" name="id" value="<?php echo $_SESSION["quote"]["id"] ?>" />
                    <div class="panel-group" id="checkout-accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="checkout-information">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#checkout-accordion" href="#collapse-checkout-information" aria-expanded="true" aria-controls="collapse-checkout-information"> 
                                        Checkout Information 
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-checkout-information" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="checkout-information">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="checkout-email">Email</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="email" id="checkout-email" class="form-control" pattern="([A-Za-z0-9][._]?)+[A-Za-z0-9]@[A-Za-z0-9]+(\.?[A-Za-z0-9]){2}\.(com?|net|org)+(\.[A-Za-z0-9]{2,4})?" placeholder="name@domain.com" value="<?php echo $_SESSION["customer"]["email"] ?>" required />
                                        </div>
                                        <label class="col-sm-2 control-label" for="checkout-mobile">Mobile</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="mobile" id="checkout-mobile" class="form-control" pattern="[0-9]{8}" placeholder="Mobile" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="checkout-first-name">First Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="first_name" id="checkout-first-name" class="form-control" placeholder="First Name" required />
                                        </div>
                                        <label class="col-sm-2 control-label" for="checkout-last-name">Last Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="last_name" id="checkout-last-name" class="form-control" placeholder="Last Name" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="checkout-payment">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#checkout-accordion" href="#collapse-checkout-payment" aria-expanded="false" aria-controls="collapse-checkout-payment"> 
                                        Checkout Payment 
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-checkout-payment" class="panel-collapse collapse" role="tabpanel" aria-labelledby="checkout-payment">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="checkout-branch">Branch<small>For Pick Up</small></label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="checkout-branch" name="branch">
                                                <option value="Kowloon branch">Kowloon branch</option>
                                                <option value="Hong Kong Island branch">Hong Kong Island branch</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="checkout-appointment">Appointment</label>
                                        <div class="col-sm-4">
                                            <input type="datetime-local" name="appointment_at" id="checkout-appointment" class="form-control" placeholder="Appointment" min="<?php echo date("Y-m-d")."T".date("H:i") ?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="checkout-payment-method">Payment Method</label>
                                        <div class="col-sm-4 radio">
                                            <label>
                                                <input type="radio" name="payment_method" id="checkout-payment-method" value="Bank Transfer" checked>
                                                Bank Transfer
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12 text-left">
                                            <button type="submit" class="btn btn-default btn-place-order white">Place Order</button>
                                            <img src="images/ajax-loader-black.gif" class="ajax-loader">
                                        </div>
                                        <div id="validation-place-order-submit" class="invalid-feedback">
                                            Place Order: Something wrong.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>

            <?php endif; ?>

        </div>
    </div>

    <?php include_once('include/copyright.php') ?>

</body>

    <?php include_once('include/footer.php') ?>

</html>