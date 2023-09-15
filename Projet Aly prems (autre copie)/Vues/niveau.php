

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des classes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .classe-color-1 {
            background-color: violet;
        }

        .classe-color-2 {
            background-color: #00ff00; 
        }
        .classe-color-3 {
            background-color: yellow; 
        }
        .classe-color-4 {
            background-color: orangered; 
        }
        .classe-color-5 {
            background-color: brown; 
        }
        .classe-color-6 {
            background-color: grey; 
        }

    </style>
</head>

<body>

<?php if (isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>


 <?php
    require_once('../Vues/navbar.php');
?> 

<?php if (isset($_SESSION['success'])) : ?>
    <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>
<?php if (isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
<?php unset($_SESSION['error']); ?>
<?php endif; ?>

<button type="button" class="btn btn-danger float-right mr-5 mt-4" data-toggle="modal" data-target="#modalAjout">
    +
</button>

<div class="modal fade" id="modalAjout" tabindex="-1" role="dialog" aria-labelledby="modalAjoutLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAjoutLabel">Ajouter un niveau d'études</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/addniveau" method="post">
                    <div class="form-group">
                        <label for="nomNiveau">Nom du niveau d'études</label>
                        <input type="text" class="form-control" id="nomNiveau" name="nom_niveau" required>
                    </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
           
        </div>
    </div>
</div>


<div class="container py-4">
    <h1 class="text-center mb-4">Niveaux d'études</h1>
    <div class="row" id="niveaux-container">
        <?php foreach ($data['niveaux'] as $niveau): ?>
            <div class="col-md-4 mb-4">
                <div class="card classe-color-<?php echo $niveau['id_niveau']; ?>" style="height: 100%">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $niveau['nom_niveau']; ?></h5>
                        <a href="/niveau/classes/<?php echo $niveau['id_niveau']; ?>" class="btn btn-primary mt-4">Classes</a>      
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="http://localhost:8000/script.js"></script>
    
</body>

</html>
