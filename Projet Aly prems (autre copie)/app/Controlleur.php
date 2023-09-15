<?php

namespace App;

class Controlleur
{
    public function render($view, $data)
    {
      require __DIR__."/../Vues/$view";
    }

}


