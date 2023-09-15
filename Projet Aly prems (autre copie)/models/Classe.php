<?php

namespace Models;
use App\Model;

 class Classe extends Model
 {
    private $id_classe;
    private $nom_classe;
    private $niveau;


    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $reponse =$this->bd->query('SELECT * FROM Classes');
        return $reponse->fetchAll();

    }

     public function insert($nom_classe, $niveau)
    {
        $query = "INSERT INTO Classes (nom_classe, niveau) VALUES (:nom_classe, :niveau)";
        $statement = $this->bd->prepare($query);

        $statement->bindParam(':nom_classe', $nom_classe);
        $statement->bindParam(':niveau', $niveau);

        
        if ($statement->execute()) {
            return "L'insertion a réussi";
           
        } else {
            return "Erreur dans l'insertion";
        }
    }

    public function getClasseByNiveau($niveauId)
    {
        $requete = $this->bd->prepare("SELECT * FROM Classes WHERE niveau = :niveauId");
        $requete->bindValue(':niveauId', $niveauId);
        $requete->execute();

        return $requete->fetchAll();
    }

    public function getNameClasseByID($id){
        $requete = $this->bd->prepare("SELECT id_classe, nom_classe FROM Classes WHERE id_classe = :id");
        $requete->bindValue(':id', $id);
        $requete->execute();

        return $requete->fetch();

    }

    public function getNameNiveauByClasse($classe){
        $requete = $this->bd->prepare("SELECT n.id_niveau, n.nom_niveau FROM Niveaux AS n INNER JOIN Classes AS c ON n.id_niveau = c.id_niveau WHERE c.id_classe = :classe");
        $requete->bindParam(':classe', $classe);
        $requete->execute();

        return $requete->fetch();

    }



}


