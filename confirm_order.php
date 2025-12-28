<?php
require 'config.php';

if (!isset($_SESSION['user']) || empty($_SESSION['cart'])) {
    header("Location: catalog.php");
    exit;
}

$_SESSION['cart'] = [];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmed</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>✅ Order Confirmed</h1>
    <p>Your order has been successfully placed.</p>
    <a href="catalog.php" class="btn">Continue Shopping</a>
</div>

</body>
</html>
