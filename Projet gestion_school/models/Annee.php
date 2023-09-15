<?php


namespace Models;
use App\Model;


 class Annee extends Model
 {
    private $id_annee_scolaire;
    private $annee_scolaire;
    private $active;


    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $reponse =$this->bd->query('SELECT * FROM Annees_Scolaires');
        return $reponse->fetchAll();

    } 

    public function insert($anneeScolaire)
    {   
        $queryInsert = "INSERT INTO Annees_Scolaires (annee_scolaire) VALUES (:annee)";
        $statementInsert = $this->bd->prepare($queryInsert);
        $statementInsert->bindParam(':annee', $anneeScolaire);

        if ($statementInsert->execute()) {
            echo "L'insertion a réussi";
            return true;
        } else {
            echo "Erreur dans l'insertion";
            return false;
        }
    }


    public function update($idAnnee, $anneeScolaire) {

        $query = "UPDATE Annees_Scolaires SET annee_scolaire = :annee WHERE id_annee_scolaire = :id";
        $statement = $this->bd->prepare($query);
        $statement->bindParam(':annee', $anneeScolaire);
        $statement->bindParam(':id', $idAnnee);

        if ($statement->execute()) {
            echo "La mise à jour a réussi";
            return true;
        } else {
            echo "Erreur lors de la mise à jour";
            return false;
        }
    }

    public function delete($idAnnee) {

        $query = "DELETE FROM Annees_Scolaires WHERE id_annee_scolaire = :id";
        $statement = $this->bd->prepare($query);
        $statement->bindParam(':id', $idAnnee);
        
        if ($statement->execute()) {
            echo "La suppression a réussi";
            return true;
        } else {
            echo "Erreur lors de la suppression";
            return false;
        }
    }

    public function updateState($idAnnee, $actif)
    {
        // Désactiver toutes les autres années scolaires
        $disableQuery = "UPDATE Annees_Scolaires SET actif = 'non' WHERE id_annee_scolaire != :id";
        $disableStatement = $this->bd->prepare($disableQuery);
        $disableStatement->bindParam(':id', $idAnnee);
        $disableStatement->execute();

        // Activer l'année spécifique
        $query = "UPDATE Annees_Scolaires SET actif = :actif WHERE id_annee_scolaire = :id";
        $statement = $this->bd->prepare($query);
        $statement->bindParam(':actif', $actif);
        $statement->bindParam(':id', $idAnnee);

        if ($statement->execute()) {
            echo "La mise à jour de l'état a réussi";
            return true;
        } else {
            echo "Erreur lors de la mise à jour de l'état";
            return false;
        }
    }

        public function getAnneeEnCours()
    {
        $query = "SELECT annee_scolaire FROM Annees_Scolaires WHERE actif = 'oui'";
        $statement = $this->bd->prepare($query);
        $statement->execute();
        $result = $statement->fetch();

        return $result;
    }





}


