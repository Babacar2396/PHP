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

    public function getNameClasseById($id)
    {
        $requete = $this->bd->prepare("SELECT nom_classe FROM Classes WHERE id_classe = :id");
        $requete->bindParam(':id', $id);
        $requete->execute();
        return $requete->fetch();
    }

    public function getClasseByNiveau($niveau)
    {
        $requete = $this->bd->prepare("SELECT id_classe, nom_classe FROM Classes WHERE id_niveau = :niveau");
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

    public function getDisciplines($id)
    {
        $requete = $this->bd->prepare("
        SELECT Discipline.nom, Discipline.code
        FROM Discipline
        join ClassesDisciplines 
        on Discipline.id_discipline = ClassesDisciplines.id_discipline
        join Classes 
        on ClassesDisciplines.id_classe = Classes.id_classe
        WHERE Classes.id_classe=:id");

        $requete->bindParam(':id', $id);

        $requete->execute();

        return $requete->fetchAll();
    }

    public function getClassesDisciplines($id)
    {
        $requete = $this->bd->prepare("
        SELECT DISTINCT *
        FROM Discipline
        join ClassesDisciplines
        on Discipline.id = ClassesDisciplines.id_discipline
        join Classes 
        on ClassesDisciplines.id_classe = Classes.id_classe
        WHERE Classes.id_classe =:id");

        $requete->bindParam(':id', $id);

        $requete->execute();

        return $requete->fetchAll();
    }

    public function updateDisciplines($data)
    {
        $success = true;
        $message = "";

        foreach ($data as $row) {
            $id = $row['id'];
            $type = $row['type'];
            $value=$row['value'];

          if($type==='ressource'){
            $query = "UPDATE ClassesDisciplines SET ClassesDisciplines.ressource = :ressource WHERE ClassesDisciplines.id_assoc = :idz";
            $stmt = $this->bd->prepare($query);
            $stmt->bindParam(':ressource', $value);
            $stmt->bindParam(':idz', $id);

          }else if($type==='examen'){
            $query = "UPDATE ClassesDisciplines SET ClassesDisciplines.examen = :examen WHERE ClassesDisciplines.id_assoc = :idz";
            $stmt = $this->bd->prepare($query);
            $stmt->bindParam(':examen', $value);
            $stmt->bindParam(':idz', $id);
          }
            if (!$stmt->execute()) {
                $success = false;
                $message = "Erreur lors de la mise à jour des données";
                exit();
            }
        }

        return array(
            'success' => $success,
            'message' => $message
        );
    
    }

     public function deleteDiscipline($id)
    {
        $sql = "DELETE FROM ClassesDisciplines WHERE id_assoc = :id";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // echo "Suppression réussie";
            return true;
        } else {
            // echo "Échec de la suppression";
            return false;
        }
    }

     public function insertGrp($libelle)
    {
        $query = "SELECT libelle FROM Groupe_Disciplines WHERE libelle = :nom";
        $checkStatement = $this->bd->prepare($query);
        $checkStatement->bindParam(':nom', $libelle);
        $checkStatement->execute();

        if ($checkStatement->rowCount() > 0) {
            return "Erreur dans l'insertion";

        } else {
        $query = "INSERT INTO Groupe_Disciplines (libelle) VALUES (:libelle)";
        $statement = $this->bd->prepare($query);

        $statement->bindParam(':libelle', $libelle);
        $statement->execute();

        }
    }

    public function insertDISC($nom, $code, $groupe, $classe)
    {
         $query = "SELECT nom FROM Discipline WHERE nom = :nom";
        $checkStatement = $this->bd->prepare($query);
        $checkStatement->bindParam(':nom', $nom);
        $checkStatement->execute();

        if ($checkStatement->rowCount() > 0) {
            return "Erreur dans l'insertion";

        } else {

        $insertQuery = "INSERT INTO Discipline (nom, code, id_groupe) 
                        VALUES (:nom, :coded, :idgrp)";
        $statement = $this->bd->prepare($insertQuery);
        $statement->bindParam(':nom', $nom);
        $statement->bindParam(':coded', $code);
        $statement->bindParam(':idgrp', $groupe);

        if($statement->execute()){

            $idDisc = $this->bd->lastInsertId();
            
            $queryInscription = "INSERT INTO ClassesDisciplines (id_classe, id_discipline) 
            VALUES (:id_classe, :id_discipline)";
            $statementInscription = $this->bd->prepare($queryInscription);
            
            $params=[
                ":id_classe" => $classe,
                ":id_discipline"=>$idDisc
            ];
        
            if ($statementInscription->execute($params)) {
                echo "L'insertion a réussi";
                return true;
            } else {
                echo "Erreur dans l'insertion de la table inscription";
                return false;
            }
            } else {
                echo "Erreur dans l'insertion de l'élève";
                return false;
            }
        }; 
        
        }


}

