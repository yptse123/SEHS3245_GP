<?php

include '../include/head.php';

// Preset result
$result = array(

	"success" => true,
	"message" => "",
);

// Check method
if($_SERVER['REQUEST_METHOD'] === "POST") {

	$email = $_POST["login_email"];
	$password = md5($_POST["login_password"]);

	// select customers check account exist
	$sql = "SELECT * FROM customer WHERE email = :email AND password = :password AND active = :active;";
    $bindData = array(
    	"email" => $email,
    	"password" => $password,
		"active" => 1,
    );
	$customer = fetchOne($pdo, $sql, $bindData);

	// if find account exist only one record
	if($customer) {

		// Login Success
		$id = $customer["id"];
		$email = $customer["email"];
		
		// Update Last Login Time & Token
		$token = md5(rand(1, 100));

		$sql = "UPDATE customer SET last_login_time = NOW(), token = :token WHERE id = :id;";
		$bindData = array(
	    	"token" => $token,
	    	"id" => $id,
	    );
		$rowCount = updateQuery($pdo, $sql, $bindData);

		if($rowCount > 0) {

			// Set Session for logined
			$_SESSION["customer"]["email"] = $email;
			$_SESSION["customer"]["id"] = $id;
			$_SESSION["customer"]['token'] = $token;

			$result["message"] = $email;

		} else {

			$result["success"] = false;
			$result["message"] = "Error updating record: " . $email;
		}

	} else {
		
		$result["success"] = false;
		$result["message"] = "Email / Password unmatch";
	}
}
else {

	$result["success"] = false;
	$result["message"] = "Login Fail: HTTP Request Method Wrong";
}

echo json_encode($result);