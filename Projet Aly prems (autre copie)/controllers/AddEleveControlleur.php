<?php


namespace Controllers;
use App\Controlleur;
use Models\Annee;
use Models\Classe;



 class AddEleveControlleur extends Controlleur
 {

    private $anneeModel;
    private $classeModel;


    public function __construct()
    {
        $this->anneeModel=new Annee();
        $this->classeModel=new Classe();
    }

    public function display()
    {
        $annee=$this->anneeModel->getAnneeEnCours();

        $data = [
            'annee' => $annee
        ];

        $this->render('ajoutEleve.php' ,$data);

    }

    public function el($params)
    {
        $idclasse=$params[0];
        $classe=$this->classeModel->getNameClasseByID($idclasse);

        $niveau=$this->classeModel->getNameNiveauByClasse($idclasse);
        $annee=$this->anneeModel->getAnneeEnCours();

        $data = [
            'annee' => $annee,
            'classe' => $classe,
            'niveau' => $niveau
        ];

        $this->render('ajoutEleve.php' ,$data);

    }

}

?>