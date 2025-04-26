<?php

namespace header;

class generateHeader
{
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


}