<?php
include_once 'parts/theme-handler.php';
require_once 'classes/Cart.php';

use cajovna\classes\Cart;

$cartClass = new Cart();

$cartClass->handleRemoveFromCart();

$cartClass->handleBuy();

$products = $cartClass->getCartProducts();

$cart = $cartClass->getCart();
?>

<!DOCTYPE html>
<html lang="sk">
<?php include_once 'parts/head.php'; ?>
<body class="<?php echo $themeClass; ?>">

    <?php include_once 'parts/nav.php'; ?>

    <div class="container py-5 my-5">
        <h1 class="display-6">Váš košík</h1>

        <?php if (empty($products)): ?>
            <p>Košík je prázdny.</p>
        <?php else: ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Produkt</th>
                    <th>Množstvo</th>
                    <th>Cena</th>
                    <th>Akcia</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['name']); ?></td>
                        <td><?php echo $cart[$product['id']]; ?></td>
                        <td><?php echo number_format($product['price'] * $cart[$product['id']], 2); ?> €</td>
                        <td>
                            <a href="cart_page.php?remove_id=<?php echo $product['id']; ?>" class="btn btn-danger btn-sm">Odstrániť</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <form action="cart_page.php" method="POST">
                <button type="submit" class="btn btn-success">Kúpiť</button>
            </form>

        <?php endif; ?>
    </div>

    <?php include_once 'parts/footer.php'; ?>
</body>
</html>