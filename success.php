<?php include_once('include/head.php') ?>

<?php

    if(isset($_SESSION["order"]["id"])) {

        // get order info
        $sql = "SELECT * FROM `order` WHERE id = :id;";
        $bindData = array(
            "id" => $_SESSION["order"]["id"],
        );
        $order = fetchOne($pdo, $sql, $bindData);

        if($order) {

            // get all quote items
            $sql = "SELECT * FROM `order_item` WHERE order_id = :order_id;";
            $bindData = array(
                "order_id" => $order["id"],
            );
            $orderItems = fetchAll($pdo, $sql, $bindData);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thank You Page | Sleipnir</title>

    <?php include_once('include/header.php') ?>

</head>
<body class="success-page">
    
    <?php include_once('include/nav.php') ?>

    <div class="success-page-header-container">
        <div class="container">
            <div class="page-header text-center">
                <h1>Order Success</h1>
            </div>
            <div class="alert alert-success" role="alert"></div>
        </div>
    </div>

    <div class="success-page-content-container">
        <div class="container">

            <?php if(!isset($_SESSION["order"]["id"])): ?>
            
            <div class="jumbotron">
                <h3>No Order Data</h3>
                <div>You have to check out the <a href="cart.php">Shopping Cart</a> first.</div>
            </div>

            <?php else: ?>

            <div class="jumbotron">
                <h3>Order Information</h3>
                <div>Your Order Number is # <strong><?php echo $_SESSION["order"]["increment_id"] ?></strong></div>

                <div class="order-info container">
                    <div class="row">
                        <div class="col-sm-5">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>First Name</strong>: <?php echo $order["first_name"] ?></li>
                                <li class="list-group-item"><strong>Last Name</strong>: <?php echo $order["last_name"] ?></li>
                                <li class="list-group-item"><strong>Email</strong>: <?php echo $order["email"] ?></li>
                                <li class="list-group-item"><strong>Mobile</strong>: <?php echo $order["mobile"] ?></li>
                                <li class="list-group-item"><strong>Coupon</strong>: <?php echo $order["coupon_code"] ?></li>
                            </ul>
                        </div>

                        <div class="col-sm-5 col-sm-offset-2">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Order Status</strong>: <?php echo $order["status"] ?></li>
                                <li class="list-group-item"><strong>Appointment Date</strong>: <?php echo $order["appointment_at"] ?></li>
                                <li class="list-group-item"><strong>Branch</strong>: <?php echo $order["branch"] ?></li>
                                <li class="list-group-item"><strong>Payment Method</strong>: <?php echo $order["payment_method"] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <hr/>

                <h3>Order Item</h3>

                <div class="order-item container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="list-group">

                                <li class="list-group-item row hidden-xs">
                                    <div class="col-sm-2">
                                        Product
                                    </div>
                                    <div class="col-sm-4">
                                        Product Name
                                    </div>
                                    <div class="col-sm-2">
                                        Qty
                                    </div>
                                    <div class="col-sm-2">
                                        Price
                                    </div>
                                    <div class="col-sm-2">
                                        Subtotal
                                    </div>
                                </li>

                                <?php foreach ($orderItems as $orderItem): ?>
                                <li class="list-group-item row">
                                    <div class="col-sm-2">
                                        <img src="<?php echo $orderItem["product_image_url"] ?>" />
                                    </div>
                                    <div class="col-sm-4">
                                        <strong class="visible-xs">Product Name</strong>
                                        <a target="_blank" href="<?php echo $orderItem["product_url"] ?>">
                                            <?php echo $orderItem["product_name"] ?>
                                        </a>
                                    </div>
                                    <div class="col-sm-2">
                                        <strong class="visible-xs">Qty</strong>
                                        <?php echo $orderItem["qty"] ?>
                                    </div>
                                    <div class="col-sm-2">
                                        <strong class="visible-xs">Price</strong>
                                        <?php echo $orderItem["sales_price"] ?>
                                    </div>
                                    <div class="col-sm-2">
                                        <strong class="visible-xs">Subtotal</strong>
                                        <?php echo $orderItem["sales_price"] * $orderItem["qty"] ?>
                                    </div>
                                </li>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="list-group">
                                <li class="list-group-item row">
                                    <div class="col-sm-12">
                                        <strong>Order Subtotal</strong>: <?php echo $order["subtotal"] ?>
                                    </div>
                                </li>
                                <li class="list-group-item row">
                                    <div class="col-sm-12">
                                        <strong>Order Discount</strong>: <?php echo $order["discount"] ?>
                                    </div>
                                </li>
                                <li class="list-group-item row">
                                    <div class="col-sm-12">
                                        <h4><strong>Order Grand Total</strong>: <?php echo $order["grand_total"] ?></h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-12">
                            <a href="index.php" class="btn btn-primary dark btn-continue-to-shopping">
                                Continue to Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php endif; ?>

        </div>
    </div>

    <?php 

        // unset order data in session
        unset($_SESSION["order"]);

    ?>

    <?php include_once('include/copyright.php') ?>

</body>

    <?php include_once('include/footer.php') ?>

</html>