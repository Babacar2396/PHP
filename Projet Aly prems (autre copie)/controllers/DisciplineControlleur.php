<?php

namespace Controllers;
session_start();
use Models\Niveau;
use Models\Annee;

use App\Controlleur;

class DisciplineControlleur extends Controlleur
{

    private $niveauModel;
    private $anneeModel;


    public function __construct()
    {
        $this->anneeModel=new Annee();
        $this->niveauModel=new Niveau();

    }

    public function listerClasses($params)
    {
        $niveauId=$params[0];

        $classes = $this->niveauModel->getClasseByNiveau($niveauId);

        echo json_encode($classes); 
            
    }

    public function gestion()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $niveaux = $this->niveauModel->all();
            $groupes = $this->niveauModel->listerGroupe();
            $annee = $this->anneeModel->getAnneeEnCours();

            $data = [
                'annee' => $annee,
                'niveaux' => $niveaux,
                'groupes' => $groupes

            ];

            $this->render('discipline.php', $data);

        }else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = json_decode(file_get_contents('php://input'), true);
            
            $new = $data['newdisc'];
            $code = $data['code'];
            $id_grp = $data['groupe'];
            $id_classe = $data['classe'];


            $disciplines = $this->niveauModel->insertDISC($new, $code, $id_grp, $id_classe);

            echo json_encode($disciplines);
            exit();
        }
    }

    public function listerDisciplines($params)
    {
        $idClasse=$params[0];

        $disc = $this->niveauModel->getDisciplines($idClasse);

        echo json_encode($disc);
    }

    // public function addDiscipline($newdisc, $code, $idGrp, $idCla)
    // {
    //   $disciplines = $this->niveauModel->insertDISC($newdisc, $code, $idGrp, $idCla);

    //   echo json_encode($disciplines);

    // }

}







