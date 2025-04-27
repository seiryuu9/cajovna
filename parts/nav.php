<?php
$strankaTeraz = basename($_SERVER['PHP_SELF']);
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
                    <a href="/cajovna/index.php" class="nav-item nav-link <?php echo $strankaTeraz == 'index.php' ? 'active' : ''; ?>">Domov</a>
                    <a href="/cajovna/about.php" class="nav-item nav-link <?php echo $strankaTeraz == 'about.php' ? 'active' : ''; ?>">O nás</a>
                    <a href="/cajovna/product.php" class="nav-item nav-link <?php echo $strankaTeraz == 'product.php' ? 'active' : ''; ?>">Produkty</a>
                    <a href="/cajovna/store.php" class="nav-item nav-link <?php echo $strankaTeraz == 'store.php' ? 'active' : ''; ?>">Obchod</a>
                    <a href="/cajovna/contact.php" class="nav-item nav-link <?php echo $strankaTeraz == 'contact.php' ? 'active' : ''; ?>">Kontakt</a>
                </div>
                <div class="border-start ps-4 d-none d-lg-block">
                    <button onclick="window.location.href='?toggle_theme=true';" class="btn btn-primary">
                        zmeniť tému
                    </button>
                </div>
            </div>
        </nav>
    </div>
</div>

