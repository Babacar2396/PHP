<?php

namespace Controllers;
session_start();
use Models\Annee;
use App\Controlleur;


class AnneeControlleur extends Controlleur
{
    private $anneeModel;

    public function __construct()
    {
        $this->anneeModel = new Annee();
    }

    public function lister()
    {
        $annees = $this->anneeModel->all();
        $annee=$this->anneeModel->getAnneeEnCours();

        $data = [
            'annee' => $annee,
            'annees' => $annees
        ];

        $this->render('annee.php', $data);

    }

    public function inserer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $anneeScolaire = $_POST['annee'];

            if (!preg_match('/^\d{4}-\d{4}$/', $anneeScolaire)) {
                $_SESSION['error'] = "Le format de l'année est incorrect.";                return;
            }

            $annees = explode('-', $anneeScolaire);
            $anneeDebut = intval($annees[0]);
            $anneeFin = intval($annees[1]);

            if ($anneeFin - $anneeDebut !== 1) {
                $_SESSION['error'] = "La différence entre les deux années doit être de 1 an.";
                return;
            }

            if ($this->anneeModel->insert($anneeScolaire)) {
                $_SESSION['success'] = "L'année scolaire a été ajoutée avec succès.";
            } else {
                $_SESSION['error'] = "Une erreur s'est produite lors de l'ajout de l'année scolaire.";
            }
              header('location: /annee');
        }
    }



    public function activer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idAnnee = $_POST['activer'];

            if ($this->anneeModel->updateState($idAnnee, 'oui')) {
                $_SESSION['success'] = 'Etat mis à jour';
                header('Location: /annee');
                exit();
            } else {
                $_SESSION['error'] = 'Etat non mis à jour';
                return false;
            }
        }
    }

    public function desactiver()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idAnnee = $_POST['desactiver'];

            $anneeEnCours = $this->anneeModel->getAnneeEnCours();
            if ($anneeEnCours['id_annee_scolaire'] == $idAnnee) {
                $_SESSION['error'] = "Impossible de désactiver l'année en cours";
                header('Location: /annee');
                exit();
            }

            if ($this->anneeModel->updateState($idAnnee, 'non')) {
                $_SESSION['success'] = 'Etat mis à jour';
                header('Location: /annee');
                exit();
            } else {
                $_SESSION['error'] = 'Etat non mis à jour';
                return false;
            }
        }
    }


    

    public function modifier()
    {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idAnnee = $_POST['id_annee'];
        $anneeScolaire = $_POST['annee'];
        $actif = $_POST['etat'];

        
        if (!preg_match('/^\d{4}-\d{4}$/', $anneeScolaire)) {
            $_SESSION['error'] = "Le format de l'année est incorrect.";
            return;
        }

        $annees = explode('-', $anneeScolaire);
        $anneeDebut = intval($annees[0]);
        $anneeFin = intval($annees[1]);

        if ($anneeFin - $anneeDebut !== 1) {
            header('location: /annee');
            $_SESSION['error'] = "La différence entre les deux années doit être de 1 an.";
            return;
        }

        if ($this->anneeModel->update($idAnnee, $anneeScolaire)) {
            header('location: /annee');
            $_SESSION['success'] = "L'année scolaire a été mise à jour avec succès.";
        } else {
            header('location: /annee');
            $_SESSION['error'] = "Une erreur s'est produite lors de la mise à jour de l'année scolaire.";
        }

         header('location: /annee');

      }
    }

    public function supprimer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idAnnee = $_POST['delete'];

            if ($this->anneeModel->delete($idAnnee)) {
                $_SESSION['success'] = "L'année scolaire a été supprimée avec succès.";
            } else {
                $_SESSION['error'] = "Une erreur s'est produite lors de la suppression de l'année scolaire.";
            }

             header('Location: /annee');
        }
    }

  

}


