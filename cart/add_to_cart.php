<?php
session_start();
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/classes/Database.php');
$db = new Database();
$conn = $db->getConnection();

$id = intval($_POST['id']);
$quantity = intval($_POST['quantity']);

// Fetch product to validate
$stmt = $conn->prepare('SELECT * FROM products WHERE id = ?');
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product || $quantity > $product['stock']) {
    die('Nesprávna požiadavka.');
}

// Add to session cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// If product already in cart, add quantity
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] += $quantity;
} else {
    $_SESSION['cart'][$id] = $quantity;
}

header('Location: /cajovna/cart.php');
exit;
