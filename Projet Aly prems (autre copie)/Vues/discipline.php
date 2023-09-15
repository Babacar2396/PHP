<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiants</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<style>
    .discipline-column {
        padding-left: 50px;
        padding-right: 50px;
    }

    .no-disciplines-message {
        color: red;
    }

    .discipline-column.unchecked {
        color: red;
    }

    .btn-large {
        font-size: 30px;
        padding: 10px 50px;
        margin-top: 50px;
    }

    label {
        font-size: 20px;
    }

    .form-control-lg {
        font-size: 20px;
    }

    #disciplines-container {
        font-size: 20px;
    }
</style>

<body>

<?php require_once('../Vues/navbar.php'); ?>

    <div class="container text-center mt-3">
        
        <h1>Gestion des Disciplines</h1>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="select-niveau">Niveau</label>
                    <select id="select-niveau" name="niveau" class="form-control form-control-lg">
                        <option value="">Sélectionner un niveau</option>
                        <?php foreach ($data['niveaux'] as $niveau) { ?>
                            <option value="<?php echo $niveau['id_niveau']; ?>"><?php echo $niveau['nom_niveau']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                    <div class="form-group">
                        <label for="select-groupe">Groupe de Discipline</label>
                        <select id="select-groupe" name="groupe" class="form-control form-control-lg">
                            <option value="">Sélectionner un groupe</option>
                            <option value="new">Nouveau</option>
                            <?php foreach ($data['groupes'] as $groupe) { ?>
                                <option value="<?php echo $groupe['id_groupe']; ?>"><?php echo $groupe['libelle']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="input-group" id="newgrp-container" style="display: none;">
                            <input type="text" class="form-control form-control-lg" name="newgrp" id="disc" placeholder="Ajouter un groupe de discipline">
                            <div class="input-group-append">
                                <button id="addGrp" class="btn btn-primary" type="button">ADD</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="select-classes">Classe</label>
                        <select id="select-classes" name="classe" class="form-control form-control-lg">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="disc">Discipline</label>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" name="module" id="disci" placeholder="Ex: Maths">
                            <div class="input-group-append">
                                <button id="addDisc" class="btn btn-primary" type="button">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="form-group">
                    
                        <label for="disciplines-label" id="labs">Disciplines des classes</label>
                        <div style="color: red;">Decocher une discipline pour la supprimer de la classe</div>
                        <div style="margin-top: 50px; background-color: aqua; width: 1100px; height: 300px;" id="disciplines-container" class="row justify-content-center">
                        </div>
                         <button id="update-button" class="btn btn-primary btn-large" style="margin-right: -1400px;">Update</button>
                   
                    </div>
                    </div>
                </div>
            </div>
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="http://localhost:8000/script.js"></script>


</body>
</html>
