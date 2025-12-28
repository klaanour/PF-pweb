<?php
require 'config.php';
if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit;
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Add product to cart
if (isset($_POST['add'])) {
    $id = $_POST['product_id'];
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
}

// Remove product from cart
if (isset($_POST['remove'])) {
    $rid = $_POST['remove_id'];
    unset($_SESSION['cart'][$rid]);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Your Cart</h1>

<?php
if (empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty.</p>";
} else {
    $total = 0;
    foreach ($_SESSION['cart'] as $id => $qty) {
        $res = $conn->query("SELECT * FROM products WHERE id=$id");
        $p = $res->fetch_assoc();
        $price = $p['price'] * $qty;
        $total += $price;
        echo "<p>{$p['name']} × $qty = $$price</p>";
        // Remove form
        echo '<form action="cart.php" method="POST" style="display:inline;">
                <input type="hidden" name="remove_id" value="'.$id.'">
                <input type="submit" name="remove" value="Remove">
              </form>';
    }
    echo "<h3>Total: $$total</h3>";
}
?>

<a href="catalog.html">Back to Catalog</a>

<script src="script.js"></script>
</body>
</html>
