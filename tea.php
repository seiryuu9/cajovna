<?php

include_once 'parts/theme-handler.php';
require_once(__DIR__ . '/classes/Cart.php');

use cartN\Cart;
$cart = new Cart();

$cart->handleAddToCart();

$id = intval($_GET['id']); //konverzia na int (ochrana pred SQL injection, zoberie len cislo)

$product = $cart->getProductById($id);

?>

<!DOCTYPE html>
<html lang="sk">
<?php include_once 'parts/head.php'; ?>
<body class="<?php echo $themeClass; ?>">

<?php include_once 'parts/nav.php'; ?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo htmlspecialchars($product['image']); ?>" class="img-fluid" alt=""> <!--prepise specialne znaky aby sa predislo utokom-->
        </div>
        <div class="col-md-6">
            <h1><?php echo htmlspecialchars($product['name']); ?></h1>
            <p><?php echo htmlspecialchars($product['description']); ?></p>
            <h3 class="text-primary"><?php echo number_format($product['price'], 2); ?> €</h3>

            <?php if ($product['stock'] <= 0): ?>
                <p class="text-danger">Vypredané</p>
            <?php else: ?>
                <p>Skladom: <?php echo $product['stock']; ?> ks</p>
                <?php if ($product['stock'] < 6): ?>
                    <p class="text-warning">Pozor, zostáva len pár kusov!</p>
                <?php endif; ?>
                <form method="POST">
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
