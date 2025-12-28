<?php
require 'config.php';

if (!isset($_SESSION['user'])) {
    http_response_code(401);
    exit;
}

$_SESSION['cart'] = $_SESSION['cart'] ?? [];

if (isset($_POST['product_id'])) {
    $id = (int)$_POST['product_id'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
    echo "ok";
}
