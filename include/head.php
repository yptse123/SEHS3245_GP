<?php

// Start Session
if(session_id() == '')  {

    session_start();

    $_SESSION["quote"]["total_qty"] = 0;
}

// Connect DB
include_once('config.php');

try {

    $pdo = new PDO("mysql:host=$servername;dbname=$database;charset=utf8;port=3306", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {

    echo "Connection failed: " . $e->getMessage();
}

// Check Customer Login
if(isset($_SESSION["token"]) && !empty($_SESSION["token"])) {

    // if logined, check database to find the shopping cart items
    $customerId = $_SESSION['customer_id'];

    $sql = "SELECT * FROM quote WHERE customer_id = :customer_id;";
    $stmt = $pdo->prepare($sql);
    $bindData = array(
        "customer_id" => $customerId,
    );
    $stmt->execute($bindData); 
    $quote = $stmt->fetch(PDO::FETCH_ASSOC);

    if($quote) {

        $quoteId = $quote["id"];

        $sql = "SELECT * FROM quote_item WHERE quote_id = :quote_id;";
        $stmt = $pdo->prepare($sql);
        $bindData = array(
            "quote_id" => $quoteId,
        );
        $stmt->execute($bindData); 
        $quoteItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $totalQty = 0;

        foreach ($quoteItems as $quoteItem) {
            
            $totalQty += $quoteItem["qty"];

            $_SESSION["quote"]["items"][] = $quoteItem;
        }

        // set the total qty 
        $_SESSION["quote"]["total_qty"] = $totalQty;
    }
}