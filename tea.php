<?php
include_once 'parts/theme-handler.php';

define('__ROOT__', dirname(__FILE__));
require_once(__ROOT__ . '/classes/Database.php');
$db = new Database();
$conn = $db->getConnection();

// Get product ID
if (!isset($_GET['id'])) {
    die('Produkt neexistuje.');
}
$id = intval($_GET['id']);

// Fetch product info
$stmt = $conn->prepare('SELECT * FROM products WHERE id = ?');
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
    die('Produkt neexistuje.');
}
?>

<!DOCTYPE html>
<html lang="sk">
<?php include_once 'parts/head.php'; ?>
<body class="<?php echo $themeClass; ?>">

<?php include_once 'parts/nav.php'; ?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo htmlspecialchars($product['image']); ?>" class="img-fluid" alt="">
        </div>
        <div class="col-md-6">
            <h1><?php echo htmlspecialchars($product['name']); ?></h1>
            <p><?php echo htmlspecialchars($product['description']); ?></p>
            <h3 class="text-primary"><?php echo number_format($product['price'], 2); ?> €</h3>

            <?php if ($product['stock'] <= 0): ?>
                <p class="text-danger">Vypredané</p>
            <?php else: ?>
                <p>Skladom: <?php echo $product['stock']; ?> ks</p>
                <?php if ($product['stock'] < 5): ?>
                    <p class="text-warning">Pozor, ostáva len pár kusov!</p>
                <?php endif; ?>
                <form action="cart/add_to_cart.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Množstvo</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" max="<?php echo $product['stock']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Pridať do košíka</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include_once 'parts/footer.php'; ?>
</body>
</html>
