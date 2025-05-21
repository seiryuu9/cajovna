<?php
    use cajovna\classes\GenerateHeader;

    include_once 'classes/GenerateHeader.php';
    $header = new GenerateHeader(); //instancia trieda (objekt)
    $headerData = $header->generateHeader(); //metoda
?>

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown">
            <?= htmlspecialchars($headerData['title']) ?>
        </h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="index.php">Domov</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">
                    <?= htmlspecialchars($headerData['title2']) ?>
                </li>
            </ol>
        </nav>
    </div>
</div>
