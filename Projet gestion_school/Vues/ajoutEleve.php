<?php

session_start();

$currentNiveau = isset($_SESSION['current_niveau']) ? $_SESSION['current_niveau'] : '';
$currentClasse = isset($_SESSION['current_classe']) ? $_SESSION['current_classe'] : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiants</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<style>
    .btn-large {
        font-size: 30px;
        padding: 10px 50px;
        margin-top: 50px;
    }
</style>

<body>
    <?php require_once('../Vues/navbar.php'); ?>

    <div class="container text-center">
        <div class="rounded-circle mx-auto mt-5"
            style="width: 200px; height: 200px; background-image: url('http://localhost:4000/luffy.jpg'); background-size: cover;"></div>
        <h4>Charger une image</h4>
        <form action="/newEleve" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" name="prenom" id="prenom"
                            placeholder="Entrez le prénom">
                    </div>
                    <div class="form-group">
                        <label for="date_naissance">Date de naissance</label>
                        <input type="date" name="born" class="form-control" id="date_naissance">
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrez le nom">
                    </div>
                    <div class="form-group">
                        <label for="lieu">Lieu de naissance</label>
                        <input type="text" class="form-control" name="lieu" id="lieu"
                            placeholder="Entrez le lieu de naissance">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="num">Numéro</label>
                        <input type="text" class="form-control" name="num" id="num"
                            placeholder="Entrez le numéro de l'élève">
                    </div>
                    <div class="form-group">
                        <label for="niveau">Niveau</label>
                        <select id="select-niveau" name="niveau" onchange="chargerClasses()">
                            <option value="">Sélectionner un niveau</option>
                            <?php
                            $serveur = 'localhost';
                            $dbname = 'GestionNotes';
                            $login = 'root';
                            $password = 'Elzond@00';

                            $connexion = new PDO("mysql:host=$serveur;dbname=$dbname", "$login", "$password");

                            $requete = $connexion->query("SELECT id_niveau, nom_niveau FROM Niveaux");

                            $niveaux = $requete->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($niveaux as $niveau) {
                                echo '<option value="' . $niveau['id_niveau'] . '">' . $niveau['nom_niveau'] . '</option>';
                            }

                            $connexion = null;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sexe">Sexe</label>
                        <select class="form-control" name="sexe" id="sexe">
                            <option>Choisir un genre</option>
                            <option value="masculin">masculin</option>
                            <option value="feminin">feminin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="classe">Classe</label>
                        <select id="select-niveau" name="classe" onchange="chargerClasses()">
                            <option value="">Sélectionner un niveau</option>
                            <?php
                            $serveur = 'localhost';
                            $dbname = 'GestionNotes';
                            $login = 'root';
                            $password = 'Elzond@00';

                            $connexion = new PDO("mysql:host=$serveur;dbname=$dbname", "$login", "$password");

                            $requete = $connexion->query("SELECT id_classe, nom_classe FROM Classes");

                            $niveaux = $requete->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($niveaux as $niveau) {
                                echo '<option value="' . $niveau['id_classe'] . '">' . $niveau['nom_classe'] . '</option>';
                            }

                            $connexion = null;
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-large">Inscrire</button>

        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="http://localhost:4000/script.js"></script>

</body>
</html>

