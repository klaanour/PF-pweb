<?php
require 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$_SESSION['cart'] = $_SESSION['cart'] ?? [];

if (isset($_POST['add'])) {
    $id = (int)$_POST['product_id'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
}

if (isset($_POST['remove'])) {
    $rid = (int)$_POST['remove_id'];
    unset($_SESSION['cart'][$rid]);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Your Shopping Cart</h1>
    <nav>
        <a href="catalog.php">Catalog</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<div class="cart-container">

<?php if (empty($_SESSION['cart'])): ?>

    <p class="cart-empty">Your cart is empty 🛒</p>
    <div style="text-align:center;">
        <a href="catalog.php" class="btn-back">Back to Catalog</a>
    </div>

<?php else: ?>

    <table class="cart-table">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>

        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $id => $qty):
            $res = $conn->query("SELECT * FROM products WHERE id = $id");
            if (!$res || $res->num_rows == 0) continue;
            $p = $res->fetch_assoc();

            $sub = $p['price'] * $qty;
            $total += $sub;
        ?>
        <tr>
            <td><?= htmlspecialchars($p['name']) ?></td>
            <td>$<?= number_format($p['price'], 2) ?></td>
            <td><?= $qty ?></td>
            <td>$<?= number_format($sub, 2) ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="remove_id" value="<?= $id ?>">
                    <button class="btn btn-remove" name="remove">Remove</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div class="cart-total">
        Total: $<?= number_format($total, 2) ?>
    </div>

    <div style="text-align:center;">
        <a href="catalog.php" class="btn-back">Continue Shopping</a>
        <a href="confirm_order.php" class="btn-checkout">Confirm Order</a>
    </div>

<?php endif; ?>

</div>

</body>
</html>
