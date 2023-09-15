<?php

namespace Models;
use App\Model;

session_start();


 class Eleve extends Model
 {
    private $id_classe;
    private $nom_classe;
    private $id_niveau;
    private $id_annee_scolaire;


    public function __construct()
    {
        parent::__construct();
    }

    public function getElevesByIdClasse($id)
    {
        $requete = $this->bd->prepare("SELECT e.prenom, e.nom FROM Eleves AS e
    INNER JOIN Inscription AS i ON e.id = i.id_eleve WHERE i.id_classe = :id");
        $requete->bindValue(':id', $id);
        $requete->execute();

        return $requete->fetchAll();

    }

        public function all()
    {
        $reponse =$this->bd->query('SELECT * FROM Eleves');
        return $reponse->fetchAll();

    }
 
    public function insert($prenom, $nom, $date_born, $lieu_born, $numero, $sexe, $niveau, $classe)
    {
       
    $queryCheckNumero = "SELECT numero, COUNT(*) as count FROM Eleves WHERE numero = :numero";
    $statementCheckNumero = $this->bd->prepare($queryCheckNumero);
    $statementCheckNumero->bindParam(':numero', $numero);
    $statementCheckNumero->execute();
    $resultCheckNumero = $statementCheckNumero->fetch();
    $numeroExists = $resultCheckNumero['count'];

    if ($numeroExists > 0 && $resultCheckNumero['numero'] != null) {
        $_SESSION['error'] = "Le numéro est déjà attribué.";
        return false;
    }

    if($numero==null){
        $type_eleve='Externe';
    }else{
        $type_eleve='Interne';
    }

    $queryEleve = "INSERT INTO Eleves (prenom, nom, date_born, lieu_born, numero, type_eleve, sexe) VALUES (:prenom, :nom, :date_born, :lieu_born, :numero, :type_eleve, :sexe)";
    $statementEleve = $this->bd->prepare($queryEleve);

    $statementEleve->bindParam(':prenom', $prenom);
    $statementEleve->bindParam(':nom', $nom);
    $statementEleve->bindParam(':date_born', $date_born);
    $statementEleve->bindParam(':lieu_born', $lieu_born);
    $statementEleve->bindParam(':numero', $numero);
    $statementEleve->bindParam(':type_eleve', $type_eleve);
    $statementEleve->bindParam(':sexe', $sexe);

    if ($statementEleve->execute()) {
        
        $id_eleve = $this->bd->lastInsertId();

        $queryAnnee = "SELECT id_annee_scolaire FROM Annees_Scolaires where actif like 'oui' ";
        $statementAnnee = $this->bd->prepare($queryAnnee);
        $statementAnnee->execute();
        $resultAnnee = $statementAnnee->fetch();
        $idAnneeEnCours = $resultAnnee['id_annee_scolaire'];
        
        $queryInscription = "INSERT INTO Inscription (id_eleve, id_niveau, id_classe, id_annee) 
        VALUES (:id_eleve, :id_niveau, :id_classe, :id_annee)";
        $statementInscription = $this->bd->prepare($queryInscription);
        
        $params=[
            ":id_eleve" => intval($id_eleve),
            ":id_classe"=>intval($classe),
            ":id_niveau"=>intval($niveau),
            ":id_annee" => $idAnneeEnCours
        ];
       
        if ($statementInscription->execute($params)) {
            echo "L'insertion a réussi";
            return true;
        } else {
            echo "Erreur dans l'insertion dans la table inscription";
            return false;
        }
    } else {
        echo "Erreur dans l'insertion de l'élève";
        return false;
    }
}




}


