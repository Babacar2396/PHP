<?php

namespace Controllers;
use App\Controlleur;
use Models\Annee;

 class AccueilControlleur extends Controlleur
 {
    private $anneeModel;

    public function __construct()
    {
        $this->anneeModel = new Annee;
    }

    public function acceder()
    {
        $annee = $this->anneeModel->getAnneeEnCours();

        $data = [
            'annee' => $annee,
        ];

        $this->render('accueil.php', $data);

    }

}

?>