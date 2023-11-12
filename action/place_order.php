<?php

include '../include/head.php';

// Preset result
$result = array(

	"success" => true,
    "message" => "",
);

// Check method
if($_SERVER['REQUEST_METHOD'] === "POST") {

    // re-calculate the quote total qty, total price, etc
    $updateData = recalculateQuote($pdo, $_POST["id"]);

    // get quote info
    $quote = getQuoteById($pdo, $_POST["id"]);

    if($quote) {

        // get all quote items
        $quoteItems = getQuoteItemByQuoteId($pdo, $quote["id"]);

        // insert order
        $sql = "INSERT INTO `order`(`customer_id`, `first_name`, `last_name`, `email`, `mobile`, `coupon_code`, `total_qty`, `subtotal`, `discount`, `grand_total`, `appointment_at`, `branch`, `payment_method`) VALUES (:customer_id, :first_name, :last_name, :email, :mobile, :coupon_code, :total_qty, :subtotal, :discount, :grand_total, :appointment_at, :branch, :payment_method);";
        $bindData = array(
            "customer_id" => $quote["customer_id"],
            "first_name" => $_POST["first_name"],
            "last_name" => $_POST["last_name"],
            "email" => $_POST["email"],
            "mobile" => $_POST["mobile"],
            "coupon_code" => $quote["coupon_code"],
            "total_qty" => $quote["total_qty"],
            "subtotal" => $quote["subtotal"],
            "discount" => $quote["discount"],
            "grand_total" => $quote["grand_total"],
            "appointment_at" => $_POST["appointment_at"],
            "branch" => $_POST["branch"],
            "payment_method" => $_POST["payment_method"],
        );
        $orderId = insertQuery($pdo, $sql, $bindData);

        // insert order item
        $sql = "INSERT INTO `order_item`(`order_id`, `product_id`, `product_name`, `product_url`, `product_image_url`, `qty`, `sales_price`) SELECT :order_id, product_id, product_name, product_url, product_image_url, qty, sales_price FROM quote_item WHERE quote_id = :quote_id ORDER BY product_id ASC;";

        $bindData = array(
            "order_id" => $orderId,
            "quote_id" => $quote["id"],
        );
        insertQuery($pdo, $sql, $bindData);

        // update order number
        $orderNumber = "ORDER".str_pad($orderId, 7, "0", STR_PAD_LEFT);
        $sql = "UPDATE `order` SET increment_id = :increment_id WHERE id = :id;";
        $bindData = array(
            "increment_id" => $orderNumber,
            "id" => $orderId,
        );
        $rowCount = updateQuery($pdo, $sql, $bindData);

        // update quote
        $sql = "UPDATE `quote` SET increment_id = :increment_id, is_ordered = :is_ordered, active = :active WHERE id = :id;";
        $bindData = array(
            "increment_id" => $orderNumber,
            "id" => $quote["id"],
            "is_ordered" => 1,
            "active" => 0,
        );
        $rowCount = updateQuery($pdo, $sql, $bindData);

        $_SESSION["order"]["id"] = $orderId;
        $_SESSION["order"]["increment_id"] = $orderNumber;

        $result["message"] = "success";
    }
}
else {

	$result["success"] = false;
	$result["message"] = "Place Order Fail: HTTP Request Method Wrong";
}

echo json_encode($result);