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

    // get quote info
    $quote = getQuoteById($pdo, $_POST["id"]);

    $needUpdateQty = $_POST["qty"];

    foreach ($needUpdateQty as $quoteItemId => $qty) {

        $sql = "UPDATE quote_item SET qty = :qty WHERE id = :id";
        $bindData = array(
            "qty" => $qty,
            "id" => $quoteItemId,
        );
        $rowCount = updateQuery($pdo, $sql, $bindData);
    }

    // re-calculate the quote total qty, total price, etc
    $updateData = recalculateQuote($pdo, $_POST["id"]);

    $result["message"] = $updateData;
}
else {

	$result["success"] = false;
	$result["message"] = "Update Cart Fail: HTTP Request Method Wrong";
}

echo json_encode($result);