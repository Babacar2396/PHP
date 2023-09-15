<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiants</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .table-bordered th,
        .table-bordered td {
            border: 3px solid;
        }
        i:hover{
        background-color: green;
        }

        .table-cols {
            margin-top: 2rem;
            margin-left: 5rem;
            width: 950px;
            height: 550px;
        }

        h1 {
            margin-top: 6rem;
            color: white;
            text-align: center;
        }

        .filter-container {
            margin-top: 5rem;
            margin-left: 1rem;
        }

        .filter-container select {
            margin-right: 0.5rem;
        }

        .green {
            color: green;
        }

        .red {
            color: red;
        }

        .btn {
            display: flex;
            text-align: center;
            justify-content: center;
            font-weight: bold;
        }

        #updateCoef:hover {
            background-color: green;
            border: 1px solid green;
        }
    </style>

    <script>
        // Fonction pour masquer le message d'erreur après un délai
        function hideErrorMessage() {
            var errorMessage = document.getElementById('error-message');
            errorMessage.style.display = 'none';
        }

        // Fonction pour afficher le message d'erreur avec un délai
        function showErrorMessage() {
            var errorMessage = document.getElementById('error-message');
            errorMessage.style.display = 'block';

            // Masquer le message d'erreur après 5 secondes (5000 millisecondes)
            setTimeout(hideErrorMessage, 2000);
        }
    </script>

</head>

<body>


    <?php
    require_once('../Vues/navbar.php');
    ?>

    <?php

    //$classe=$data['classe'];

    ?>

    <?php if (isset($_SESSION['error'])) : ?>
        <p class="error"><?php echo $_SESSION['error']; ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>


    <h1>Coefficients et Pondérations</h1>

    <div class="container">

        <div class="container py-1">

            <h1 class="text-center mb-2"><a href="/classes/liste/<?php echo $data['id'] ?>"><?php echo $data['classe']['nom_classe'] ?></a></h1>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Disciplines</th>
                                <th>Ressources</th>
                                <th>Examens</th>
                                <th></th>
                            </tr>
                            </thead>
                        <tbody>
                            <?php foreach ($data['disciplines'] as $disc) : ?>
                                <tr data-nom="<?php echo $disc['id_assoc']; ?>">
                                    <td><?php echo $disc['nom']; ?></td>
                                    <td><input type="number" name="ressource" data-nom="<?php echo $disc['id_assoc']; ?>_r" class="torecup" value="<?php echo $disc['ressource']; ?>" style="width: 100px;">
                                        <span class="error-message"></span>
                                    </td>
                                    <td><input type="number" min="10" name="examen" data-nom="<?php echo $disc['id_assoc']; ?>_e" class="torecup" value="<?php echo $disc['examen']; ?>" style="width: 100px;">
                                        <span class="error-message"></span>
                                    </td>
                                    <td>
                                        <button   data-nom="<?php echo $disc['id_assoc']; ?>"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="btn">
            <button id="updateCoef" type='button' class="btn btn-primary btn-large">Mettre A jour</button>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="http://localhost:8000/script.js"></script>

</body>

</html>