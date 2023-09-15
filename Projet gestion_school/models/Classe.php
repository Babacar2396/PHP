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
        $requete = $this->bd->prepare("SELECT nom_classe FROM Classes WHERE niveau = :niveauId");
        $requete->bindValue(':niveauId', $niveauId);
        $requete->execute();

        return $requete->fetchAll();

    }


}


