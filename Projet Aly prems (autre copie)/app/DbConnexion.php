<?php

namespace App;
use PDO;
use Exception;


class DbConnexion
{
    function connexion(){

        $serveur = 'localhost';
        $dbname = 'gestion_school';
        $login = 'root';
        $password = 'Bichri@2396';

        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

        try {
            return new PDO("mysql:host=$serveur;dbname=$dbname", $login, $password, $options);

        } catch (Exception $e) {
            die ('Erreur de connexion : '.$e->getMessage());

        }
    }
}
