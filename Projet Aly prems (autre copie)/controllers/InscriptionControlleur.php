<?php


namespace Controllers;

use Models\Inscription;
use App\Controlleur;


class InscriptionControlleur extends Controlleur
{
    private $inscriptionModel;

    public function __construct()
    {
        $this->inscriptionModel = new Inscription();
    }

    public function lister()
    {
        $inscrire = $this->inscriptionModel->all();
        $this->render('inscription.php', $inscrire);

    }





}

