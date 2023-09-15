<?php


namespace Models;
use App\Model;


 class Inscription extends Model
 {
    private $id;
    private $id_eleve;
    private $id_classe;
    private $id_annee;



    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $reponse =$this->bd->query('SELECT * FROM Inscription');
        return $reponse->fetchAll();

    } 

    // public function insert($anneeScolaire)
    // {   
    //     $queryInsert = "INSERT INTO Inscription (annee_scolaire) VALUES (:annee)";
    //     $statementInsert = $this->bd->prepare($queryInsert);
    //     $statementInsert->bindParam(':annee', $anneeScolaire);

    //     if ($statementInsert->execute()) {
    //         echo "L'insertion a réussi";
    //         return true;
    //     } else {
    //         echo "Erreur dans l'insertion";
    //         return false;
    //     }
    // }


    // public function update($idAnnee, $anneeScolaire) {

    //     $query = "UPDATE Inscription SET annee_scolaire = :annee WHERE id_annee_scolaire = :id";
    //     $statement = $this->bd->prepare($query);
    //     $statement->bindParam(':annee', $anneeScolaire);
    //     $statement->bindParam(':id', $idAnnee);

    //     if ($statement->execute()) {
    //         echo "La mise à jour a réussi";
    //         return true;
    //     } else {
    //         echo "Erreur lors de la mise à jour";
    //         return false;
    //     }
    // }

    // public function delete($idAnnee) {

    //     $query = "DELETE FROM Inscription WHERE id_annee_scolaire = :id";
    //     $statement = $this->bd->prepare($query);
    //     $statement->bindParam(':id', $idAnnee);
        
    //     if ($statement->execute()) {
    //         echo "La suppression a réussi";
    //         return true;
    //     } else {
    //         echo "Erreur lors de la suppression";
    //         return false;
    //     }
    // }

    //  public function updateState($idAnnee, $actif)
    // {
    //     $query = "UPDATE Inscription SET actif = :actif WHERE id_annee_scolaire = :id";
    //     $statement = $this->bd->prepare($query);
    //     $statement->bindParam(':actif', $actif);
    //     $statement->bindParam(':id', $idAnnee);

    //     if ($statement->execute()) {
    //         echo "La mise à jour de l'état a réussi";
    //         return true;
    //     } else {
    //         echo "Erreur lors de la mise à jour de l'état";
    //         return false;
    //     }
    // }



}



