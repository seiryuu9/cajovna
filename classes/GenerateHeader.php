<?php

namespace cajovna\classes;

class GenerateHeader
{
    public function generateHeader(): array
    {
        $currentPage = basename($_SERVER['SCRIPT_NAME']); //napr about.php

        // nacita JSON data
        $json = file_get_contents(__DIR__ . '/../data/datas.json');
        $data = json_decode($json, true);

        $pages = $data['stranky'] ?? [];

        // nastavi hodnoty
        return [
            'title1' => $pages[$currentPage]['title'] ?? '',
            'title3' => $pages[$currentPage]['title2'] ?? '',
        ];

    }

}