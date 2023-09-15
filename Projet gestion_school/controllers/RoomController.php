<?php

class RoomController {
    public function Modifier(array $data)
    {
        
        if(array_key_exists('ressource', $data)){
            echo "1 er test";
            $requete = "UPDATE ClasseDiscipline SET ressource = :ressource WHERE id = :id";
            $statement = $this->pdo->prepare($requete);
            $statement->execute($data);
        }
        if(array_key_exists('examen', $data)){
            echo "2iem test";
            $requete = "UPDATE ClasseDiscipline SET examen = :examen WHERE id = :id";
            $statement = $this->pdo->prepare($requete);
            $statement->execute($data);
        }
    }
}
