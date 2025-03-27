<?php

function pozdrav()
{
    $hour = date('H');
    if ($hour < 12) {
        echo "<p class='fs-4 text-white animated zoomIn'>Dobré ráno v <strong class='text-dark'>čajovni</strong></p>";
    } elseif ($hour < 18) {
        echo "<p class='fs-4 text-white animated zoomIn'>Dobrý deň v <strong class='text-dark'>čajovni</strong></p>";
    } else {
        echo "<p class='fs-4 text-white animated zoomIn'>Dobrý večer v <strong class='text-dark'>čajovni</strong></p>";
    }
}

function carousel(){

    $json = file_get_contents('data/datas.json');
    $data = json_decode($json, true);
    $carouselData = $data['carousel'];

    foreach ($carouselData as $index => $slide) {
        $activeClass = $index === 0 ? 'active' : '';
        echo '<div class="carousel-item ' . $activeClass . '">';
        echo '<img class="w-100" src="' . $slide['image'] . '" alt="Image">';
        echo '<div class="carousel-caption">';
        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-lg-7 text-center">';
        include_once 'funkcie.php';
        pozdrav();
        echo '<h1 class="display-1 text-dark mb-4 animated zoomIn">Organická & kvalitná produkcia čajov</h1>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

}

function generateHeader()
{
    // Get the current script name (e.g., "about.php")
    $currentPage = basename($_SERVER['SCRIPT_NAME']);

    // Load JSON data

    $json = file_get_contents('data/datas.json');
    $data = json_decode($json, true);

    $pages = $data['stranky'];

    // Set default values if page is not found in JSON
    $title = $pages[$currentPage]['title'];
    $title2 = $pages[$currentPage]['title2'];

    // Output the dynamic header HTML
    echo '
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">' . htmlspecialchars($title) . '</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Domov</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">' . htmlspecialchars($title2) . '</li>
                </ol>
            </nav>
        </div>
    </div>';
}


?>