<?php

/**
 * @param object $pdo      php pdo db connection
 * @param string $sql      mysql query
 * @param array  $bindData list of bind data with values
 */
function fetchOne($pdo, $sql, $bindData = array()) {

    $stmt = $pdo->prepare($sql);
    $stmt->execute($bindData);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    //close db connection
    $pdo = null;

    return $data;
}

function fetchAll($pdo, $sql, $bindData = array()) {

    $stmt = $pdo->prepare($sql);
    $stmt->execute($bindData);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //close db connection
    $pdo = null;
    
    return $data;
}

function updateQuery($pdo, $sql, $bindData = array()) {

    $stmt = $pdo->prepare($sql);
    $stmt->execute($bindData); 
    $rowCount = $stmt->rowCount();

    //close db connection
    $pdo = null;

    return $rowCount;
}

function insertQuery($pdo, $sql, $bindData = array()) {

    $stmt = $pdo->prepare($sql);
    $stmt->execute($bindData);
    $lastInsertId = $pdo->lastInsertId();

    //close db connection
    $pdo = null;

    return $lastInsertId;
}

function recalculateQuote($pdo, $quoteId) {

    $sql = "SELECT * FROM quote_item WHERE quote_id = :quote_id;";
    $bindData = array(
    	"quote_id" => $quoteId,
    );
	$quoteItems = fetchAll($pdo, $sql, $bindData);

    $totalQty = 0;
    $totalPrice = 0;
    foreach ($quoteItems as $quoteItem) {
        
        $totalQty += $quoteItem["qty"];
        $totalPrice += $quoteItem["sales_price"] * $quoteItem["qty"];
    }

    $sql = "UPDATE quote SET total_qty = :total_qty, total_price = :total_price, updated_at = NOW() WHERE id = :id;";
    $bindData = array(
    	"total_qty" => $totalQty,
    	"total_price" => $totalPrice,
    	"id" => $quoteId,
    );
	$rowCount = updateQuery($pdo, $sql, $bindData);

    return $totalQty;
}