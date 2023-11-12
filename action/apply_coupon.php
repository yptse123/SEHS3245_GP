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

    $sql = "SELECT * FROM `coupon` WHERE code = :code;";
    $bindData = array(
        "code" => $_POST["coupon_code"],
    );
    $coupon = fetchOne($pdo, $sql, $bindData);

    if($coupon) {

        $sql = "UPDATE `quote` SET coupon_code = :coupon_code, discount = :discount, updated_at = NOW() WHERE id = :id";
        $bindData = array(
            "coupon_code" => $_POST["coupon_code"],
            "discount" => $coupon["amount"],
            "id" => $_POST["id"],
        );
        $rowCount = updateQuery($pdo, $sql, $bindData);

        // re-calculate the quote total qty, total price, etc
        $updateData = recalculateQuote($pdo, $_POST["id"]);

        $result["message"] = $updateData;
    }
}
else {

	$result["success"] = false;
	$result["message"] = "Apply Coupon Fail: HTTP Request Method Wrong";
}

echo json_encode($result);