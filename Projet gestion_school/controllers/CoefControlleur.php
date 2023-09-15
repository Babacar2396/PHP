<?php


namespace Controllers;
use Models\Niveau;
use Models\Annee;
use App\Controlleur;


 class CoefControlleur extends Controlleur
 {
    private $niveauModel;
    private $anneeModel;

    public function __construct()
    {
        $this->niveauModel=new Niveau();
        $this->anneeModel=new Annee();

    }

    public function updateCoef($params){

        if($_SERVER['REQUEST_METHOD'] === 'GET'){

        $classe=$params[0];
        $disciplines = $this->niveauModel->getDisciplinesByClasse($classe);
        $annee=$this->anneeModel->getAnneeEnCours();

        $data = [
            'annee' => $annee,
            'disciplines' => $disciplines,
            'classe' => $classe
        ];

        $this->render('CoefDisciplines.php', $data);

        }else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updatedData'])) {
            $updatedData = $_POST['updatedData'];

            $result = $this->niveauModel->updateDisciplines($updatedData);

            header('Content-Type: application/json');
            echo json_encode($result);

        }else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['disciplineName'])) {
          $disciplineName = $_POST['disciplineName'];

          $result = $this->niveauModel->deleteDiscipline($disciplineName);

        if (!$result) {
          echo json_encode(['success' => false, 'message' => 'Erreur lors de la suppression des disciplines']);
          exit();
        }else {
          echo json_encode(['success' => true, 'message' => 'Suppression des disciplines réussie']);
          exit();
        }

}
 }
}

 
 