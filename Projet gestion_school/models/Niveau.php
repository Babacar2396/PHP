<?php


namespace Models;
use App\Model;
use PDO;


 class Niveau extends Model 
 {
    private $id_niveau;
    private $nom_niveau;

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $reponse =$this->bd->query('SELECT * FROM Niveaux');
        return $reponse->fetchAll();
    }

    public function listerGroupe()
    {
        $reponse =$this->bd->query('SELECT * FROM Groupe_Disciplines');
        return $reponse->fetchAll();

    }

    public function updateDisciplines($data) {
        $success = true;
        $message = "";

        foreach ($data as $row) {
            $discipline = $row['discipline'];
            $ressource = $row['ressource'];
            $examen = $row['examen'];

            // Effectuer la requête de mise à jour dans la table "discipline"
            $query = "UPDATE Discipline SET ressource = :ressource, examen = :examen WHERE nom = :discipline";
            $stmt = $this->bd->prepare($query);
            $stmt->bindParam(':ressource', $ressource);
            $stmt->bindParam(':examen', $examen);
            $stmt->bindParam(':discipline', $discipline);

            if (!$stmt->execute()) {
                $success = false;
                $message = "Erreur lors de la mise à jour des données";
                break;
            }
        }

        return array(
            'success' => $success,
            'message' => $message
        );
    }

    public function getClasseByNiveau($niveau)
    {
        $requete = $this->bd->prepare("SELECT nom_classe FROM Classes WHERE niveau = :niveau");
        $requete->bindValue(':niveau', $niveau);
        $requete->execute();

        return $requete->fetchAll();
    }

    public function getGroupeDisciplinesByClasse($classe)
    {
        $requete = $this->bd->prepare("SELECT id, libelle FROM Groupe_Disciplines WHERE classe = :classe");
        $requete->bindValue(':classe', $classe);
        $requete->execute();

        return $requete->fetchAll();
    }

    public function getDisciplinesByClasse($classe)
    {
        $requete = $this->bd->prepare("SELECT * FROM Discipline WHERE classe = :classe");
        $requete->bindValue(':classe', $classe);
        $requete->execute();

        return $requete->fetchAll();
    }

    public function getDisciplinesByIdGroupe($id)
    {
        $requete = $this->bd->prepare("SELECT id_groupe, nom, code FROM Discipline WHERE id_groupe = :id");

        $requete->bindValue(':id', $id);

        $requete->execute();

        return $requete->fetchAll();
    }

     public function deleteDiscipline($name)
    {
        $sql = "DELETE FROM Discipline WHERE nom = :name";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // echo "Suppression réussie";
            return true;
        } else {
            // echo "Échec de la suppression";
            return false;
        }
    }

     public function insertGrp($libelle, $classe)
    {
        $query = "SELECT libelle FROM Groupe_Disciplines WHERE libelle = :nom";
        $checkStatement = $this->bd->prepare($query);
        $checkStatement->bindParam(':nom', $libelle);
        $checkStatement->execute();

        if ($checkStatement->rowCount() > 0) {
            return "Erreur dans l'insertion";

        } else {
        $query = "INSERT INTO Groupe_Disciplines (libelle, classe) VALUES (:libelle, :classe)";
        $statement = $this->bd->prepare($query);

        $statement->bindParam(':libelle', $libelle);
        $statement->bindParam(':classe', $classe);
        $statement->execute();

        }
    }

    public function insertDISC($nom, $code, $id, $classe)
    {
        // Vérification si les 4 premiers caractères existent déjà dans la base de données
        $query = "SELECT code FROM Discipline WHERE SUBSTRING(code, 1, 4) = :code";
        $checkStatement = $this->bd->prepare($query);
        $code=substr($code, 0, 4);
        $checkStatement->bindParam(':code', $code);
        $checkStatement->execute();

        if ($checkStatement->rowCount() > 0) {
            // Les 5 premiers caractères + ')'
            $code = substr($code, 0, 5) . ')';
        } else {
            // Les 4 premiers caractères + ')'
            $code = substr($code, 0, 4) . ')';
        }

         $query = "SELECT nom FROM Discipline WHERE nom = :nom";
        $checkStatement = $this->bd->prepare($query);
        $checkStatement->bindParam(':nom', $nom);
        $checkStatement->execute();

        if ($checkStatement->rowCount() > 0) {
            return "Erreur dans l'insertion";

        } else {
        $insertQuery = "INSERT INTO Discipline (nom, code, id_groupe, classe) 
                        VALUES (:nom, :code, :id, :classe)";
        $statement = $this->bd->prepare($insertQuery);
        $statement->bindParam(':nom', $nom);
        $statement->bindParam(':code', $code);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':classe', $classe);
        $statement->execute(); 
        
        }
    }






}

