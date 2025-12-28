<?php
require 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Catalog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Product Catalog</h1>
    <nav>
        <a href="catalog.php">All</a>
        <?php
        $cats = $conn->query("SELECT * FROM categories");
        while ($cat = $cats->fetch_assoc()) {
            echo '<a href="catalog.php?cat='.$cat['id'].'">'.$cat['name'].'</a>';
        }
        ?>
        <a href="cart.php">Cart</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<main>
<?php
$cat_id = $_GET['cat'] ?? null;
$sql = "SELECT * FROM products";
if ($cat_id) {
    $sql .= " WHERE category_id = $cat_id";
}
$result = $conn->query($sql);

while ($p = $result->fetch_assoc()):
?>
<div class="product-card">
    <h3><?= $p['name'] ?></h3>
    <p><?= $p['description'] ?></p>
    <p><strong>$<?= $p['price'] ?></strong></p>

    <button class="btn add-btn" data-id="<?= $p['id'] ?>">
    Add to cart
    </button> 
    
</div>
<?php endwhile; ?>
</main>

<script src="script.js"></script>
</body>
</html>
