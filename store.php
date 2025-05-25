<?php
include_once 'parts/theme-handler.php';
?>

<!DOCTYPE html>
<html lang="sk">

<?php
include_once 'parts/head.php';
?>

<body class="<?php echo $themeClass; ?>">

    <?php
    include_once 'parts/nav.php';
    include_once 'parts/header.php';

    $jsonData = file_get_contents('data/datas.json');
    $data = json_decode($jsonData, true);

    // nacitaj produkty
    $products = $data['stranky']['store.php']['products'];
    ?>

        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <?php foreach ($products as $index => $product): ?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="<?php echo 0.1 + ($index * 0.2); ?>s">
                            <div class="store-item position-relative text-center">
                                <img class="img-fluid" src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['alt']); ?>">
                                <div class="p-4">
                                    <div class="text-center mb-3">
                                        <?php for ($i = 0; $i < $product['rating']; $i++): ?>
                                            <small class="fa fa-star text-primary"></small>
                                        <?php endfor; ?>
                                    </div>
                                    <h4 class="mb-3"><?php echo htmlspecialchars($product['name']); ?></h4>
                                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                                    <h4 class="text-primary">$<?php echo number_format($product['price'], 2); ?></h4>
                                </div>
                                <div class="store-overlay">
                                    <a href="tea.php?id=<?php echo $product['id']; ?>" class="btn btn-primary rounded-pill py-2 px-4 m-2">
                                        Detail <i class="fa fa-arrow-right ms-2"></i>
                                    </a>
                                    <a href="tea.php?id=<?php echo $product['id']; ?>" class="btn btn-dark rounded-pill py-2 px-4 m-2">
                                        Pridať do košíka <i class="fa fa-cart-plus ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a href="" class="btn btn-primary rounded-pill py-3 px-5">Zobraziť viac produktov</a>
                    </div>
                </div>
            </div>
        </div>

    <!-- Store End -->

    <?php
    include_once 'parts/footer.php';
    ?>

</body>

</html>