<?php
    include_once 'classes/GenerateHeader.php';

    use cajovna\classes\GenerateHeader;

    $header = new GenerateHeader(); //instancia triedy (objekt)
    $headerData = $header->generateHeader(); //metoda
?>

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown">
            <?php echo htmlspecialchars($headerData['title1']) ?>
        </h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="index.php">Domov</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">
                    <?php echo htmlspecialchars($headerData['title3']) ?>
                </li>
            </ol>
        </nav>
    </div>
</div>
