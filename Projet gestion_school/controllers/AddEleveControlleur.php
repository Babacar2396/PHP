<?php


namespace Controllers;
use App\Controlleur;
use Models\Annee;


 class AddEleveControlleur extends Controlleur
 {

    private $anneeModel;

    public function __construct()
    {
        $this->anneeModel=new Annee();
    }

    public function display()
    {
        $annee=$this->anneeModel->getAnneeEnCours();

        $data = [
            'annee' => $annee
        ];

        $this->render('ajoutEleve.php' ,$data);

    }

    public function el()
    {
        $annee=$this->anneeModel->getAnneeEnCours();

        $data = [
            'annee' => $annee
        ];

        $this->render('ajoutEleve.php' ,$data);

    }

}

?>