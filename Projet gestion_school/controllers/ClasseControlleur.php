<?php


namespace Controllers;
use Models\Classe;
use Models\Eleve;
use Models\Annee;
use App\Controlleur;


 class ClasseControlleur extends Controlleur
 {
    private $classeModel;
    private $eleveModel;
    private $anneeModel;

    public function __construct()
    {
        $this->classeModel=new Classe();
        $this->eleveModel=new Eleve();
        $this->anneeModel=new Annee();

    }

    function lister()
    {
        $classes=$this->classeModel->all();
        $this->render('classe.php' ,$classes);

    }

    public function chargerEleves($params)
    {
        $classe=$params[0];
        $eleves = $this->eleveModel->getEleveByClasse($classe);
        $annee=$this->anneeModel->getAnneeEnCours();

        $data = [
            'annee' => $annee,
            'eleves' => $eleves,
            'classe' => $classe
        ];

        $this->render('eleve.php', $data);

    }

    public function inserer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom_classe = $_POST['nom_classe'];
            $niveau = $_POST['niveau'];
            switch ($niveau) {
                case 'Elementaires':
                    $niveau=1;
                    break;

                case 'Moyens':
                    $niveau=2;
                    break;
                    
                case 'Secondaires':
                    $niveau=3;
                    break;
                
                default:
                    $niveau=4;
                    break;
            }



            if ($this->classeModel->insert($nom_classe, $niveau)) {
                $_SESSION['success'] = "L'insertion a réussi";
            } else {
                $_SESSION['error'] = "Une erreur s'est produite lors de l'ajout.";
            }
            
            header('location: /niveau');
        }
    }
}


