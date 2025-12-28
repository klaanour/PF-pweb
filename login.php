<?php
require 'config.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST['username'] === 'admin' && $_POST['password'] === '123') {
        $_SESSION['user'] = true;
        $_SESSION['cart'] = [];
        header("Location: catalog.php");
        exit;
    } else {
        $error = "Login failed";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
    <h1>Login</h1>

    <?php if ($error): ?>
        <p style="color:red"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button class="btn">Login</button>
    </form>

    <p>Demo: admin / 123</p>
</div>
</body>
</html>

