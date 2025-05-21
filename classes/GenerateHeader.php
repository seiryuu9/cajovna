<?php

namespace cajovna\classes;

class GenerateHeader
{
    public function generateHeader(): array
    {
        $currentPage = basename($_SERVER['SCRIPT_NAME']); //napr about.php

        // Load JSON data
        $json = file_get_contents(__DIR__ . '/../data/datas.json');
        $data = json_decode($json, true);

        $pages = $data['stranky'] ?? [];

        // Set values
        return [
            'title' => $pages[$currentPage]['title'] ?? '',
            'title2' => $pages[$currentPage]['title2'] ?? '',
        ];

    }

}