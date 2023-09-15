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


<button type="button" class="btn btn-danger float-right mr-5 mt-4" data-toggle="modal" data-target="#modalAjout">
    +
</button>


<?php

$niveauId=$data['id'];


switch ($niveauId) {
    case '1':
        $niveau = 'Elementaires';
        break;

    case '2':
        $niveau = 'Moyens';
        break;

    case '3':
        $niveau = 'Secondaires';
        break;

    default:
        break;
}

?>

<?php if (isset($_SESSION['success'])) : ?>
    <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>
<?php if (isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
<?php unset($_SESSION['error']); ?>
<?php endif; ?>



<div class="container py-4">
    <h1 class="text-center mb-4">Classes <?php echo $niveau; ?></h1>
    <div class="row" id="classes-container">
        <?php foreach ($data['classes'] as $classe): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $classe['nom_classe']; ?></h5>
                        <a href="/classes/liste/<?php echo $classe['nom_classe']; ?>" class="btn btn-primary mt-4">Eleves</a> 
                        <a href="/classes/coef/<?php echo $classe['nom_classe']; ?>" class="btn btn-primary mt-4">Disciplines</a>      
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="modal fade" id="modalAjout" tabindex="-1" role="dialog" aria-labelledby="modalAjoutLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAjoutLabel">Ajouter une classe </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/addclasse" method="post">
                    <div class="form-group">
                        <label for="nomClasse">Nom de la classe</label>
                        <input type="text" class="form-control" id="nomClasse" name="nom_classe" required>
                    </div>
                    <div class="form-group">
                        <label for="niveau">Niveau d'études</label>
                        <select class="form-control" id="niveau" name="niveau">
                            <option value="<?php echo $niveau; ?>" selected>
                                <?php echo $niveau; ?>
                            </option>
                        </select>
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



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>

</html>