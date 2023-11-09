<?php

include '../include/head.php';

// unset token from session, keep customer email for login form
unset($_SESSION["customer"]);
unset($_SESSION["quote"]);

// redirect to previous page
$refer = $_SERVER["HTTP_REFERER"];

header("Location: {$refer}");