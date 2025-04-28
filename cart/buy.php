<?php
session_start();
define('__ROOT__', dirname(dirname(__FILE__)));
include_once '../classes/Database.php';

$db = new Database();
$conn = $db->getConnection();

$cart = $_SESSION['cart'] ?? [];

if (empty($cart)) {
    header('Location: ../cart.php');
    exit;
}

// Start transaction (to make it safe)
$conn->beginTransaction();

try {
    foreach ($cart as $productId => $quantity) {
        // Fetch current stock
        $stmt = $conn->prepare('SELECT stock FROM products WHERE id = ?');
        $stmt->execute([$productId]);
        $product = $stmt->fetch();

        if (!$product) {
            throw new Exception('Produkt neexistuje.');
        }

        if ($product['stock'] < $quantity) {
            throw new Exception('Nedostatok zásob pre produkt ID ' . $productId);
        }

        // Update stock
        $stmt = $conn->prepare('UPDATE products SET stock = stock - ? WHERE id = ?');
        $stmt->execute([$quantity, $productId]);
    }

    // Clear cart
    unset($_SESSION['cart']);

    // Commit transaction
    $conn->commit();

    // Redirect
    header('Location: ../thankyou.php');
    exit;
} catch (Exception $e) {
    // Rollback on error
    $conn->rollBack();
    echo "Chyba pri nákupe: " . $e->getMessage();
    exit;
}
