<?php

namespace cajovna\classes;

class GenerateHeader
{
    function generateHeaderF()
    {
        $currentPage = basename($_SERVER['SCRIPT_NAME']); //napr about.php

        // Load JSON data
        $json = file_get_contents('data/datas.json');
        $data = json_decode($json, true);

        $pages = $data['stranky'];

        // Set values
        $title = $pages[$currentPage]['title'];
        $title2 = $pages[$currentPage]['title2'];

        // Output the dynamic header HTML
        echo '
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">' . htmlspecialchars($title) . '</h1> <?--zabezpecuje, aby sa neinterpretoval ako html/js -->
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Domov</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">' . htmlspecialchars($title2) . '</li>
                </ol>
            </nav>
        </div>
    </div>';
    }


}