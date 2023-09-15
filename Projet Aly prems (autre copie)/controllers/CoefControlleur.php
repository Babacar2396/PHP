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

       if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $id = $params[0];
        $disciplines = $this->niveauModel->getClassesDisciplines($id);
        $classe = $this->niveauModel->getNameClasseById($id);
        $annee = $this->anneeModel->getAnneeEnCours();

        $data = [
            'annee' => $annee,
            'disciplines' => $disciplines,
            'classe' => $classe,
            'id' => $id
        ];

        $this->render('CoefDisciplines.php', $data);

       } 
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            // echo json_encode($data);
            // die();
            
            $disc = $data['namedisc'];

            $result = $this->niveauModel->deleteDiscipline($disc);

            if ($result) {
                $response['success'] = true;
                echo json_encode($response);
            } else {
                $response['success'] = false;
                echo json_encode($response);
            }
            exit();
        }
    }

    public function update(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            // echo json_encode($data[0]['type']);
            // die();

            //$updatedData = $data['updatedData'];

            $result = $this->niveauModel->updateDisciplines($data);

            $response = array();
            if ($result['success']) {
                $response['success'] = true;
            } else {
                $response['success'] = false;
                $response['message'] = $result['message'];
            }

            echo json_encode($response);
            exit();
        }
    }

}
 
