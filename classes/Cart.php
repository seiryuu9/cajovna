<?php

namespace cajovna\classes;
use cajovna\classes\Database;
use PDO;

require_once (__DIR__ . '/Database.php');


class Cart extends Database
{
    private array $cart;
    public function __construct(){
        parent::__construct(); // zavola konstruktor z databazy
        $this->conn = $this->getConnection(); // pripojenie na databazu
        $this->cart = $_SESSION['cart'] ?? []; // nacita kosik zo session (default prazdny) / asociativne pole
    }

    function getCart(): array{
        return $this->cart;
    }


    function addToCart($id, $quantity){

        $id = intval($id);
        $quantity = intval($quantity);

        // fetch id
        $stmt = $this->conn->prepare('SELECT * FROM products WHERE id = ?');
        $stmt->execute([$id]);
        $product = $stmt->fetch();

        // prida/update mnozstvo
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] += $quantity;
        } else {
            $_SESSION['cart'][$id] = $quantity;
        }

        // synchronizacia, lebo su od seba nezavisle
        $this->cart[$id] = $_SESSION['cart'][$id];

    }

    function removeFromCart($id){
        $id = intval($id);
        unset($_SESSION['cart'][$id]);
        unset($this->cart[$id]); //vymaze aj z this cart, pouziam ako lokalnu premennu
    }

    function buy(){

        $conn = $this->getConnection();
        $cart = $this->cart;

        if (empty($cart)) {
            header('Location: /cajovna/cart_page.php');
            exit;
        }

        // pdo metoda (sekvencia databazovych operacii - transakcia)
        $conn->beginTransaction();

        try {
            foreach ($cart as $productId => $quantity) { //kluc -> hodnota v poli cart
                // vrati stock
                $stmt = $conn->prepare('SELECT stock, price FROM products WHERE id = ?');
                $stmt->execute([$productId]);
                $product = $stmt->fetch(PDO::FETCH_ASSOC);

                // update stock
                $stmt = $conn->prepare('UPDATE products SET stock = stock - ? WHERE id = ?');
                $stmt->execute([$quantity, $productId]);

                // logne nakup anonymmne
                $totalPrice = $product['price'] * $quantity;

                // Log the purchase with total price
                $stmt = $conn->prepare('INSERT INTO purchases (product_id, quantity, price) VALUES (?, ?, ?)');
                $stmt->execute([$productId, $quantity, $totalPrice]);
            }

            // vycisti kosik
            unset($_SESSION['cart']);

            // ulozi zmeny
            $conn->commit();
            header('Location: /cajovna/thankyou.php');
            exit;
        } catch (\PDOException $e) {
            // vymaze zmeny
            $conn->rollBack();
            echo "Chyba pri nákupe: " . $e->getMessage();
            exit;
        }
    }

    function getProductById($id) {
        $stmt = $this->conn->prepare('SELECT * FROM products WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(); //pripravi sql dotaz - ? placeholder berie $id ako hodnotu, nie kod (sql injection), len 1 riadok
    }

    function handleAddtoCart(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { //z kupit
            try {
                $this->addToCart($_POST['id'], $_POST['quantity']);
                header('Location: /cajovna/cart_page.php');
                exit;
            } catch (\PDOException $e) {
                echo "Chyba: " . $e->getMessage();
                exit;
            }
        }
    }

    function getCartProducts(): array {
        if (!empty($this->cart)) {
            // zozbiera kluce - id
            $cartKeys = array_keys($this->cart);

            // konverzia na int
            $cartKeysInt = array_map('intval', $cartKeys);

            //spravi z nich string
            $placeholders = implode(',', array_fill(0, count($cartKeysInt), '?'));
            $stmt = $this->conn->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
            $stmt->execute($cartKeysInt);

            return $stmt->fetchAll();
        } return []; //prazdny kosik
    }

    function handleRemoveFromCart(){
        if (isset($_GET['remove_id'])) { //z url
            $this->removeFromCart($_GET['remove_id']);
            header('Location: cart_page.php');
            exit;
        }
    }

    function handleBuy(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->buy();
                $_SESSION['cart'] = [];
                exit;
            } catch (\PDOException $e) {
                echo "Chyba: " . $e->getMessage();
                exit;
            }
        }
    }


}