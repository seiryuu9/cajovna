<?php

namespace pozdravN;

class Pozdrav
{
    function pozdravF()
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

}