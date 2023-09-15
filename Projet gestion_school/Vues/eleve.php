<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des classes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

<?php
    require_once('../Vues/navbar.php');
?>


<a href="/student"><button type="button" class="btn btn-danger float-right mr-5 mt-4">
    +
</button></a>


<?php

$classe=$data['classe'];

?>


<div class="container py-4">
    <h1 class="text-center mb-4">Eleves de <?php echo $classe; ?></h1>
    <div class="row" id="classes-container">
        <?php foreach ($data['eleves'] as $eleve): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $eleve['nom']; ?></h5>
                        <h5 class="card-title"><?php echo $eleve['prenom']; ?></h5>
                        <!-- <a href="#" class="btn btn-success mt-4">Notes</a> -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>

</html>