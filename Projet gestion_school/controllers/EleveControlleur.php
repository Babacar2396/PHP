<?php


namespace Controllers;
use Models\Eleve;
use Models\Annee;
use App\Controlleur;


 class EleveControlleur extends Controlleur
 {
    private $eleveModel;
    private $anneeModel;

    public function __construct()
    {
        $this->eleveModel=new Eleve();
        $this->anneeModel=new Annee();
    }

    function lister()
    {
        $eleves=$this->eleveModel->all();
        $annee=$this->anneeModel->getAnneeEnCours();

        $data = [
            'annee' => $annee,
            'eleves' => $eleves
        ];

        $this->render('Eleves.php' ,$data);

    }

    public function inserer()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $date_born = $_POST['born'];
        $lieu_born = $_POST['lieu'];
        $numero = $_POST['num'];
        $sexe = $_POST['sexe'];
        $niveau = $_POST['niveau'];
        $classe = $_POST['classe'];

        if ($this->eleveModel->insert($prenom, $nom, $date_born, $lieu_born, $numero, $sexe, $niveau, $classe)) {
            echo "L'insertion a réussi";
            header('Location: /listeEleves');
            
        } else {
            echo "Une erreur s'est produite lors de l'ajout.";
        }
    }
    
    
}

    

  



}

?>