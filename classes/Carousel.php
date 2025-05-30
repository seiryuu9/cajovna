<?php

namespace cajovna\classes;

include_once 'classes/Pozdrav.php';

use cajovna\classes\Pozdrav; //prve je namespace

class Carousel
{
    protected $pozdravenie;

    public function __construct()
    {
        $this->pozdravenie = new Pozdrav(); // treba konstruktor na prvotnu inicializaciu triedy
    }
    public function carousel(): void
    {
        $json = file_get_contents('data/datas.json');
        $data = json_decode($json, true); //true vrati asociativne pole (nie objekt)
        $carouselData = $data['carousel'];

        foreach ($carouselData as $index => $slide) {
            $activeClass = $index === 0 ? 'active' : '';
            echo '<div class="carousel-item ' . $activeClass . '">';
            echo '<img class="w-100" src="' . $slide['image'] . '" alt="Image">';
            echo '<div class="carousel-caption">';
            echo '<div class="container">';
            echo '<div class="row justify-content-center">';
            echo '<div class="col-lg-7 text-center">';
            $this->pozdravenie->pozdrav();
            echo '<h1 class="display-1 text-dark mb-4 animated zoomIn">Organická & kvalitná produkcia čajov</h1>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

    }

}