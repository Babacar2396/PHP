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

    public function gestion()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $niveaux = $this->niveauModel->all();
            $annee = $this->anneeModel->getAnneeEnCours();

            $data = [
                'annee' => $annee,
                'niveaux' => $niveaux
            ];

            $this->render('discipline.php', $data);

        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'];

            if ($action === 'chargerClasses') {
                $niveauId = $_POST['niveau'];
                $classes = $this->niveauModel->getClasseByNiveau($niveauId);

                echo json_encode(['success' => true, 'data' => ['classes' => $classes]]);
                exit();

            } else if ($action === 'chargerGroupeDisciplines') {
                $classe = $_POST['classe'];
                $groupes = $this->niveauModel->getGroupeDisciplinesByClasse($classe);
                $discipline = $this->niveauModel->getDisciplinesByClasse($classe);

                $data=[];
                
                echo json_encode(['success' => true, 'data' => ['groupes' => $groupes, 'discipline' => $discipline]]);
                exit();

            } else if ($action === 'chargerDisciplines') {
                $id_grp = $_POST['groupe'];
                $disciplines = $this->niveauModel->getDisciplinesByIdGroupe($id_grp);

                echo json_encode(['success' => true, 'data' => ['disciplines' => $disciplines]]);
                exit();

            } else if ($action === 'supprimerDisciplines') {
                $disciplines = $_POST['discipline'];

                foreach ($disciplines as $discipline) {
                $success = $this->niveauModel->deleteDiscipline($discipline);

                if (!$success) {
                    echo json_encode(['success' => false, 'message' => 'Erreur lors de la suppression des disciplines']);
                    exit();
                }
            }

            echo json_encode(['success' => true, 'message' => 'Suppression des disciplines réussie']);
            exit();
            
            } else if ($action === 'insertGrp') {
                $libelle = $_POST['newgrp'];
                $classe = $_POST['classe'];

                $result = $this->niveauModel->insertGrp($libelle, $classe);

                if ($result == "Erreur dans l'insertion") {
                    $_SESSION['error'] = 'Le groupe existe déjà';
                    
                } else {
                    echo json_encode(['success' => true, 'message' => $result]);
                    exit();
                }

            } else if ($action === 'insertDISC') {
                $nomDiscipline = $_POST['newdisc'];
                $groupeDisciplineID = $_POST['groupe'];
                $codeDiscipline = $_POST['code'];
                $classe = $_POST['classe'];

                $result = $this->niveauModel->insertDISC($nomDiscipline, $codeDiscipline, $groupeDisciplineID, $classe);

                if ($result === "Erreur dans l'insertion") {
                    $_SESSION['error'] = 'Le groupe existe déjà';

                } else {
                    echo json_encode(['success' => true, 'message' => $result]);
                    exit();
                }
            }
                

        }

    }

}






