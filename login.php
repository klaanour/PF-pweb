<?php
require 'config.php';

if ($_POST['username'] === 'admin' && $_POST['password'] === '123') {
    $_SESSION['user'] = true;
    $_SESSION['cart'] = array();
    header("Location: catalog.html");
    exit;
}

echo "Login failed";
