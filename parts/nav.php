<?php
$strankaTeraz = basename($_SERVER['PHP_SELF']);

$cart_count = isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;

?>

<div class="container-fluid sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light py-2 py-lg-0">

            <a href="/cajovna/index.php" class="navbar-brand">
                <img class="img-fluid" src="/cajovna/img/logo.png" alt="Logo">
            </a>
            <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <?php if (empty($_SESSION['admin_logged_in'])): ?>
                        <a href="/cajovna/admin/login.php" class="nav-item nav-link <?php echo $strankaTeraz == 'login.php' ? 'active' : ''; ?>" style="opacity: 0.1; font-size: 0.9rem;">Prihlásenie</a>
                    <?php else: ?>
                        <a href="/cajovna/admin/logout.php" class="nav-item nav-link text-danger" style="font-weight: bold;">Odhlásiť</a>
                    <?php endif; ?>
                    <a href="/cajovna/index.php" class="nav-item nav-link <?php echo $strankaTeraz == 'index.php' ? 'active' : ''; ?>">Domov</a>
                    <a href="/cajovna/about.php" class="nav-item nav-link <?php echo $strankaTeraz == 'about.php' ? 'active' : ''; ?>">O nás</a>
                    <a href="/cajovna/product.php" class="nav-item nav-link <?php echo $strankaTeraz == 'product.php' ? 'active' : ''; ?>">Produkty</a>
                    <a href="/cajovna/store.php" class="nav-item nav-link <?php echo $strankaTeraz == 'store.php' ? 'active' : ''; ?>">Obchod</a>
                    <a href="/cajovna/contact.php" class="nav-item nav-link <?php echo $strankaTeraz == 'contact.php' ? 'active' : ''; ?>">Kontakt</a>
                </div>

                <div class="d-flex align-items-center">
                    <a href="/cajovna/cart_page.php" class="btn btn-outline-primary position-relative ms-3">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php echo $cart_count; ?>
                        </span>
                    </a>
                    <button onclick="window.location.href='?toggle_theme=true';" class="btn btn-primary ms-3">
                        zmeniť tému
                    </button>

                </div>
            </div>
        </nav>
    </div>
</div>

