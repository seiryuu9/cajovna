<?php

namespace cartN;
use Database;

class Cart extends Database
{

    public function __construct()
    {
        session_start(); // Start session once
        parent::__construct(); // Call parent constructor if Database has one
        $this->conn = $this->getConnection(); // Get database connection
    }
    function addToCart()
    {

        $id = intval($_POST['id']);
        $quantity = intval($_POST['quantity']);

// Fetch product to validate
        $stmt = $this->$conn->prepare('SELECT * FROM products WHERE id = ?');
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

    }

}