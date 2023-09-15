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

    public function getEleveByClasse($classe)
    {
        $requete = $this->bd->prepare("SELECT prenom, nom FROM Eleves WHERE classe = :classe");
        $requete->bindValue(':classe', $classe);
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
    $queryCheckNumero = "SELECT COUNT(*) as count FROM Eleves WHERE numero = :numero";
    $statementCheckNumero = $this->bd->prepare($queryCheckNumero);
    $statementCheckNumero->bindParam(':numero', $numero);
    $statementCheckNumero->execute();
    $resultCheckNumero = $statementCheckNumero->fetch();
    $numeroExists = $resultCheckNumero['count'];

    if ($numeroExists > 0) {
        $_SESSION['error'] = "Le numéro est déjà attribué.";
        return false;
    }

    $queryEleve = "INSERT INTO Eleves (prenom, nom, date_born, lieu_born, numero, sexe, niveau, classe) VALUES (:prenom, :nom, :date_born, :lieu_born, :numero, :sexe, :niveau, :classe)";
    $statementEleve = $this->bd->prepare($queryEleve);

    $statementEleve->bindParam(':prenom', $prenom);
    $statementEleve->bindParam(':nom', $nom);
    $statementEleve->bindParam(':date_born', $date_born);
    $statementEleve->bindParam(':lieu_born', $lieu_born);
    $statementEleve->bindParam(':numero', $numero);
    $statementEleve->bindParam(':sexe', $sexe);
    $statementEleve->bindParam(':niveau', $niveau);
    $statementEleve->bindParam(':classe', $classe);
    
    if ($statementEleve->execute()) {
        
        $queryAnnee = "SELECT annee_scolaire FROM Annees_Scolaires where actif like 'oui' ";
        $statementAnnee = $this->bd->prepare($queryAnnee);
        $statementAnnee->execute();
        $resultAnnee = $statementAnnee->fetch();
        $anneeEnCours = $resultAnnee['annee_scolaire'];
        
        $queryInscription = "INSERT INTO Inscription (nom_eleve, prenom_eleve, type_eleve, classe, annee) VALUES (:nomEleve, :prenomEleve, 'externe', :nomClasse, :annee)";
        $statementInscription = $this->bd->prepare($queryInscription);
        $statementInscription->bindParam(':nomEleve', $nom);
        $statementInscription->bindParam(':prenomEleve', $prenom);
        $statementInscription->bindParam(':nomClasse', $classe);
        $statementInscription->bindParam(':annee', $anneeEnCours);
        
        if ($statementInscription->execute()) {
            echo "L'insertion a réussi";
            return true;
        } else {
            echo "Erreur dans l'insertion de l'élève dans la table inscription";
            return false;
        }
    } else {
        echo "Erreur dans l'insertion de l'élève dans la table Eleves";
        return false;
    }
}




}


