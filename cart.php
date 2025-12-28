<?php
require 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$_SESSION['cart'] = $_SESSION['cart'] ?? [];

if (isset($_POST['add'])) {
    $id = $_POST['product_id'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
}

if (isset($_POST['remove'])) {
    unset($_SESSION['cart'][$_POST['remove_id']]);
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
$total = 0;
if (!$_SESSION['cart']) {
    echo "<p>Cart is empty</p>";
} else {
    foreach ($_SESSION['cart'] as $id => $qty) {
        $p = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
        $sub = $p['price'] * $qty;
        $total += $sub;

        echo "<p>{$p['name']} × $qty = $$sub</p>";
        echo '<form method="POST">
                <input type="hidden" name="remove_id" value="'.$id.'">
                <button name="remove">Remove</button>
              </form>';
    }
    echo "<h3>Total: $$total</h3>";
    echo '<a class="btn" href="confirm_order.php">Confirm Order</a>';
}
?>

<br><br>
<a href="catalog.php">Back to Catalog</a>

</body>
</html>

