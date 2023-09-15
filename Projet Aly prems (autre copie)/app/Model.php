<?php
    
namespace App;
use App\DbConnexion;
use PDO;


class Model
{

protected PDO $bd;

public function __construct(){
   $db = new DbConnexion();
   $this->bd=$db->connexion();

}


}


