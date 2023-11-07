<?php

include '../include/head.php';

// unset token from session, keep customer email for login form
unset($_SESSION["token"]);
unset($_SESSION["customer_id"]);

// redirect to previous page
$refer = $_SERVER["HTTP_REFERER"];

header("Location: {$refer}");