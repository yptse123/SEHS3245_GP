<?php

/**
 * @param  object $pdo      php pdo db connection
 * @param  string $sql      mysql query
 * @param  array  $bindData list of bind data with values
 * @return array  $data     assoc array of one row data
 */
function fetchOne($pdo, $sql, $bindData = array()) {

    $data = array();
    foreach ($bindData as $key => $value) {
        $data[$key] = removeXSS($value);
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

/**
 * @param  object $pdo      php pdo db connection
 * @param  string $sql      mysql query
 * @param  array  $bindData list of bind data with values
 * @return array  $data     assoc array of all row data
 */
function fetchAll($pdo, $sql, $bindData = array()) {

    $data = array();
    foreach ($bindData as $key => $value) {
        $data[$key] = removeXSS($value);
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/**
 * @param  object $pdo      php pdo db connection
 * @param  string $sql      mysql query
 * @param  array  $bindData list of bind data with values
 * @return int    $rowCount affeced amount of row
 */
function updateQuery($pdo, $sql, $bindData = array()) {

    $data = array();
    foreach ($bindData as $key => $value) {
        $data[$key] = removeXSS($value);
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($data); 
    $rowCount = $stmt->rowCount();

    return $rowCount;
}

/**
 * @param  object $pdo          php pdo db connection
 * @param  string $sql          mysql query
 * @param  array  $bindData     list of bind data with values
 * @return int    $lastInsertId auto increment id of row
 */
function insertQuery($pdo, $sql, $bindData = array()) {

    $data = array();
    foreach ($bindData as $key => $value) {
        $data[$key] = removeXSS($value);
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    $lastInsertId = $pdo->lastInsertId();

    return $lastInsertId;
}

/**
 * @param  object $pdo          php pdo db connection
 * @param  string $sql          mysql query
 * @param  array  $bindData     list of bind data with values
 * @return int    $lastInsertId auto increment id of row
 */
function deleteQuery($pdo, $sql, $bindData = array()) {

    $data = array();
    foreach ($bindData as $key => $value) {
        $data[$key] = removeXSS($value);
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($data); 
    $rowCount = $stmt->rowCount();

    return $rowCount;
}

/**
 * @param  object $pdo      php pdo db connection
 * @param  string $quoteId  quote id
 * @return array  $quote    quote data with assoc array format 
 */
function getQuoteById($pdo, $quoteId) {

    $sql = "SELECT * FROM quote WHERE id = :id;";
    $bindData = array(
        "id" => $quoteId,
    );
    $quote = fetchOne($pdo, $sql, $bindData);

    return $quote;
}

/**
 * @param  object $pdo          php pdo db connection
 * @param  string $quoteItemId  quote item id
 * @return array  $quoteItem    quote item data with assoc array format 
 */
function getQuoteItemById($pdo, $quoteItemId) {

    $sql = "SELECT * FROM quote_item WHERE id = :id;";
    $bindData = array(
        "id" => $quoteItemId,
    );
    $quoteItem = fetchOne($pdo, $sql, $bindData);

    return $quoteItem;
}

/**
 * @param  object $pdo      php pdo db connection
 * @param  string $quoteId  quote id
 * @return array  $quoteItems    quote item data with assoc array format 
 */
function getQuoteItemByQuoteId($pdo, $quoteId) {

    $sql = "SELECT * FROM quote_item WHERE quote_id = :quote_id ORDER BY product_id ASC;";
    $bindData = array(
        "quote_id" => $quoteId,
    );
    $quoteItems = fetchAll($pdo, $sql, $bindData);

    return $quoteItems;
}

/**
 * @param  object $pdo      php pdo db connection
 * @param  string $quoteId  id
 * @return array  $result   total qty, total price, etc
 */
function recalculateQuote($pdo, $quoteId) {

    // get quote info
    $sql = "SELECT * FROM quote WHERE id = :id;";
    $bindData = array(
        "id" => $quoteId,
    );
    $quote = fetchOne($pdo, $sql, $bindData);

    // get all quote items
    $sql = "SELECT * FROM quote_item WHERE quote_id = :quote_id;";
    $bindData = array(
    	"quote_id" => $quoteId,
    );
	$quoteItems = fetchAll($pdo, $sql, $bindData);

    $totalQty = 0;
    $subtotal = 0;
    foreach ($quoteItems as $quoteItem) {
        
        $totalQty += $quoteItem["qty"];
        $subtotal += $quoteItem["sales_price"] * $quoteItem["qty"];
    }

    $sql = "UPDATE quote SET total_qty = :total_qty, subtotal = :subtotal, discount = :discount, grand_total = :grand_total, updated_at = NOW() WHERE id = :id;";
    $bindData = array(
    	"total_qty" => $totalQty,
    	"subtotal" => $subtotal,
        "discount" => floatval($quote["discount"]),
        "grand_total" => $subtotal - $quote["discount"],
    	"id" => $quoteId,
    );
	$rowCount = updateQuery($pdo, $sql, $bindData);

    // set tht quote id, total qty into session
    $_SESSION["quote"]["total_qty"] = $totalQty;
    $_SESSION["quote"]["id"] = $quoteId;

    $result = $bindData;

    return $result;
}

/**
 * @author ozkanozcan
 * @link   https://gist.github.com/ozkanozcan/3378054
 * @param  string $val string need to remove XXSid
 * @return string $val string of after remove xss
 */
function removeXSS($val) {
    
    $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);
    $search = 'abcdefghijklmnopqrstuvwxyz';
    $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $search .= '1234567890!@#$%^&*()';
    $search .= '~`";:?+/={}[]-_|\'\\';

    for ($i = 0; $i < strlen($search); $i++) {
        $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val);
        $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val);
    }
    $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
    $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
    $ra = array_merge($ra1, $ra2);
    $found = true;

    while ($found == true) {

        $val_before = $val;

        for ($i = 0; $i < sizeof($ra); $i++) {
            $pattern = '/';
            for ($j = 0; $j < strlen($ra[$i]); $j++) {
                if ($j > 0) {
                    $pattern .= '(';
                    $pattern .= '(&#[xX]0{0,8}([9ab]);)';
                    $pattern .= '|';
                    $pattern .= '|(&#0{0,8}([9|10|13]);)';
                    $pattern .= ')*';
                }
                $pattern .= $ra[$i][$j];
            }

            $pattern .= '/i';
            $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2);
            $val = preg_replace($pattern, $replacement, $val);

            if ($val_before == $val) {
                $found = false;
            }
        }
    }
    return $val;
 }