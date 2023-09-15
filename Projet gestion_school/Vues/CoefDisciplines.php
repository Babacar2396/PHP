<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiants</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    .table-bordered th,
    .table-bordered td {
    border: 3px solid;
}

.table-cols {
    margin-top: 2rem;
    margin-left: 5rem;
    width: 950px;
    height: 550px;
}
h1{
    margin: 2rem;
}
.filter-container {
    margin-top: 5rem;
    margin-left: 1rem;
}

.filter-container select {
    margin-right: 0.5rem;
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

$classe=$data['classe'];

?>

     <?php if (isset($_SESSION['error'])): ?>
        <p class="error"><?php echo $_SESSION['error']; ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

<div class="container">

<div class="container py-4">
    
<h1 class="text-center mb-4"><a href="/classes/liste/<?php echo $classe ?>"><?php echo $classe ?></a></h1>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
            </div>

                <table style="background-color: transparente;" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Disciplines</th>
                        <th>Ressources</th>
                        <th>Examens</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        
                    <?php foreach ($data['disciplines'] as $disc):?>
                        <tr data-nom="<?php echo $disc['nom'];?>">
                            <td><?php echo $disc['nom']; ?></td>
                            <td>
                                <input type="number" min="0" max="10" class="resource" name="<?php echo $disc['id'];?>">
                            </td>
                            <td>
                                <input type="number" min="0" max="10" class="examen" name="<?php echo $disc['id'];?>">
                            </td>
                            <td>
                                <button style="background-color: red;" class="supprimer"  data-id-discipline="<?php echo $disc['id']; ?>">X</button>
                            </td>
                            
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>
    <button id="updateCoef" style="margin-left: 25rem; width: 15rem; height: 5rem; font-size: 2rem;" class="btn btn-primary btn-large">Mettre A jour</button>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="http://localhost:4000/script.js"></script>

</body>

</html>
