<?php


namespace Controllers;
use App\Controlleur;
use Models\Annee;


 class ConnexionControlleur extends Controlleur
 {

    private $anneeModel;

    public function __construct()
    {
        $this->anneeModel=new Annee();

    }

    function connect()
    {
        $this->render('fichier.php' ,[]);

    }


}

?>