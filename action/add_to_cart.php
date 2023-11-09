<?php

include '../include/head.php';

// Preset result
$result = array(

	"success" => true,
	"message" => "",
	"code" => "",
);

// Check method
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check Customer Login
    if(isset($_SESSION["customer"]["token"]) && !empty($_SESSION["customer"]["token"])) {

        // check total qty in session, if = 0, create a new quote
        if($_SESSION["quote"]["total_qty"] == 0) {

            $sql = "INSERT INTO `quote`(`customer_id`) VALUES (:customer_id);";
            $bindData = array(
                "customer_id" => $_SESSION["customer"]["id"],
            );
            $quoteId = insertQuery($pdo, $sql, $bindData);
        }
        // else, get quote from session
        else {

            $quoteId = $_SESSION["quote"]["id"];
        }

        // insert quote items
        if($quoteId) {

            // check exist items first,
            $sql = "SELECT * FROM quote_item WHERE quote_id = :quote_id AND product_id = :product_id";
            $bindData = array(
                "quote_id" => $quoteId,
                "product_id" => $_POST["product_id"],
            );
            $quoteItem = fetchOne($pdo, $sql, $bindData);

            // if exist, add qty into exist record
            if($quoteItem) {

                $newQty = $quoteItem["qty"] + $_POST["qty"];

                $sql = "UPDATE quote_item SET qty = :qty WHERE id = :id";
                $bindData = array(
                    "qty" => $newQty,
                    "id" => $quoteItem["id"],
                );
                $rowCount = updateQuery($pdo, $sql, $bindData);
            }
            // else, insert a new quote item
            else {

                $sql = "INSERT INTO `quote_item`(`quote_id`, `product_id`, `product_name`, `qty`, `sales_price`) VALUES (:quote_id, :product_id, :product_name, :qty, :sales_price);";
                $bindData = array(
                    "quote_id" => $quoteId,
                    "product_id" => $_POST["product_id"],
                    "product_name" => $_POST["product_name"],
                    "qty" => $_POST["qty"],
                    "sales_price" => $_POST["sales_price"],
                );
                $quoteItemId = insertQuery($pdo, $sql, $bindData);
            }

            // re-calculate the quote total qty, total price, etc
            $totalQty = recalculateQuote($pdo, $quoteId);

            // set tht quote id, total qty into session
            $_SESSION["quote"]["total_qty"] = $totalQty;
            $_SESSION["quote"]["id"] = $quoteId;

            $result["message"] = $totalQty;
        }
    }
    // Not Login yet, return fail
    else {

        $result["success"] = false;
        $result["message"] = "Add to Cart Fail: Login First.";
        $result["code"] = "require-login";
    }
}
else {

	$result["success"] = false;
	$result["message"] = "Add to Cart Fail: HTTP Request Method Wrong";
}

echo json_encode($result);