<?php

namespace Controllers;

session_start();

use Models\Niveau;
use Models\Classe;
use Models\Annee;
use App\Controlleur;

 class NiveauControlleur extends Controlleur
 {
    private $niveauModel;
    private $classeModel;
    private $anneeModel;


    public function __construct()
    {
        $this->niveauModel=new Niveau();
        $this->classeModel=new Classe();
        $this->anneeModel=new Annee();

    }

    public function lister()
    {
        $niveaux=$this->niveauModel->all();
        $annee=$this->anneeModel->getAnneeEnCours();

        $data = [
            'annee' => $annee,
            'niveaux' => $niveaux
        ];

        $this->render('niveau.php' ,$data);

    }

    public function chargerClasses($params)
    {
        $niveau=$params[0];
        $classes = $this->classeModel->getClasseByNiveau($niveau);
        
        $annee=$this->anneeModel->getAnneeEnCours();

        $data = [
            'annee' => $annee,
            'classes' => $classes,
            'id' => $niveau
        ];
        
        $this->render('classe.php', $data);
    }

  

}

?>