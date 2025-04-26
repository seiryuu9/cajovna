<?php

namespace carousel;
use pozdrav\pozdrav; //prve je namespace
include_once 'classes/pozdrav.php';


class carousel
{
    protected $pozdrav;

    public function __construct()
    {
        $this->pozdrav = new pozdrav(); // treba konstruktor na prvotnu inicializaciu
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
            $this->pozdrav->pozdrav();
            echo '<h1 class="display-1 text-dark mb-4 animated zoomIn">Organická & kvalitná produkcia čajov</h1>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

    }

}