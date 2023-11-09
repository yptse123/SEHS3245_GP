<?php

// Start Session
if(session_id() == '')  {

    session_start();

    $_SESSION["quote"]["total_qty"] = 0;
}

include_once('config.php');
include_once('function.php');

// Connect DB
try {

    $pdo = new PDO("mysql:host=$servername;dbname=$database;charset=utf8;port=3306", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {

    echo "Connection failed: " . $e->getMessage();
}

// Check Customer Login
if(isset($_SESSION["customer"]["token"]) && !empty($_SESSION["customer"]["token"])) {

    // if logined, check database to find the shopping cart items
    $customerId = $_SESSION["customer"]["id"];

    $sql = "SELECT * FROM quote WHERE customer_id = :customer_id AND active = :active;";
    $bindData = array(
        "customer_id" => $customerId,
        "active" => 1,
    );
    $quote = fetchOne($pdo, $sql, $bindData);
    
    $_SESSION["quote"]["total_qty"] = 0;

    if($quote) {

        // set the total qty 
        $_SESSION["quote"]["total_qty"] = $quote["total_qty"];
        $_SESSION["quote"]["id"] = $quote["id"];
    }
}