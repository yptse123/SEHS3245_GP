<?php

include '../include/head.php';

// Preset result
$result = array(

	"success" => true,
	"message" => "",
);

// Check method
if($_SERVER['REQUEST_METHOD'] === 'POST') {

	$email = $_POST["login_email"];
	$password = md5($_POST["login_password"]);

	// select customers check account exist
	$sql = "SELECT * FROM customer WHERE email = :email AND password = :password;";
    $stmt = $pdo->prepare($sql);
    $bindData = array(
    	"email" => $email,
    	"password" => $password,
    );
    $stmt->execute($bindData); 
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);

	// if find account exist only one record
	if($customer) {

		// Login Success
		$id = $customer["id"];
		$customerEmail = $customer["email"];
		
		// Update Last Login Time & Token
		$token = md5(rand(1, 100));

		$sql = "UPDATE customer SET last_login_time = NOW(), token = :token WHERE id = :id;";
		$stmt= $pdo->prepare($sql);
		$bindData = array(
	    	"token" => $token,
	    	"id" => $id,
	    );
		$stmt->execute($bindData);
		$rowCount = $stmt->rowCount();

		if($rowCount > 0) {

			// Set Session for logined
			$_SESSION['customer_email'] = $customerEmail;
			$_SESSION['customer_id'] = $id;
			$_SESSION['token'] = $token;

			$result["message"] = $customerEmail;

		} else {

			$result["success"] = false;
			$result["message"] = "Error updating record: " . $customerEmail;
		}

	} else {
		
		$result["success"] = false;
		$result["message"] = "Email / Password unmatch";
	}

}
else {

	$result["success"] = false;
}

// close db connection
$conn = null;

echo json_encode($result);