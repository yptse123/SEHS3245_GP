<?php

include '../include/head.php';

// Preset result
$result = array(

	"success" => true,
    "message" => "",
	"product" => "",
);

// Check method
if($_SERVER['REQUEST_METHOD'] === "POST") {

    // check exist items first,
    $quoteItem = getQuoteItemById($pdo, $_POST["id"]);

    // if exist, remove item
    if($quoteItem) {

        $sql = "DELETE FROM `quote_item` WHERE id = :id;";
        $bindData = array(
            "id" => $_POST["id"],
        );
        $rowCount = deleteQuery($pdo, $sql, $bindData);

        // re-calculate the quote total qty, total price, etc
        $updateData = recalculateQuote($pdo, $quoteItem["quote_id"]);

        $result["message"] = $updateData["total_qty"];
        $result["product"] = $quoteItem["product_name"];
    }
}
else {

	$result["success"] = false;
	$result["message"] = "Remove Item Fail: HTTP Request Method Wrong";
}

echo json_encode($result);