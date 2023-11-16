<?php

include '../include/head.php';

// Preset result
$result = array(

	"success" => true,
	"message" => "",
);

// Check method
if($_SERVER['REQUEST_METHOD'] === "POST") {

    $sql = "INSERT INTO `newsletter`(`email`, `updated_at`) VALUES (:email, NOW()) 
            ON DUPLICATE KEY UPDATE 
            updated_at = VALUES(updated_at)
            ;
    ";
    $bindData = array(
        "email" => $_POST["newsletter-email"],
    );
    $quoteId = insertQuery($pdo, $sql, $bindData);

    // get total subscribe count
    $count = countSubs($pdo);
    $result["message"] = $count;
}
else {

	$result["success"] = false;
	$result["message"] = "Subscribe Newsletter Fail: HTTP Request Method Wrong";
}

echo json_encode($result);