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

<?php 
$cla=$data['classe'];

$classe=[
    '1'=>'CIA',
    '2'=>'CP',
    '3'=>'CE1',
    '4'=>'CE2',
    '5'=>'CM1',
    '6'=>'CM2',
    '7'=>'6e',
    '8'=>'5e',
    '9'=>'4e',
    '10'=>'3e',
    '11'=>'2nd'
]
?>

<a href="/student/<?php echo $data['classe'];?>"><button type="button" class="btn btn-danger float-right mr-5 mt-4">
    +
</button></a>


<div class="container py-4">
    <h1 class="text-center mb-4"><?php echo $classe[$cla]; ?> (<?php echo $data['annee']['annee_scolaire']; ?>)</h1>
    <h2 class="text-center mb-4">Effectif: 33</h2> <?php ;?>
    <h3 class="text-center mb-4">Moyenne classe: 14</h3> <?php ;?>
    <div style="display:flex;" class="row">
        <div class="col">
            <a href="/niveau/classes/<?php echo $classe['classe']; ?>"><button>Retour</button></a>
            <button>Coef</button>
        </div>
        <div class="col" style="display:flex;">
            <div class="form-group" style="margin-left: 1rem;">
                <label for="select-disc">Discipline</label>
                <select id="select-dic" name="dic" class="form-control">
                    <option value="">Selectionner</option>
                </select>
            </div>
             <div class="form-group" style="margin-left: 1rem;">
                <label for="select-sm">Semestre</label>
                <select id="select-sm" name="semestre" class="form-control">
                    <option value="">Selectionner</option>
                </select>
            </div>
             <div class="form-group" style="margin-left: 1rem;">
                <label for="select-note">Note De</label>
                <select id="select-note" name="note" class="form-control">
                    <option value="">Selectionner</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row" id="classes-container">
        <?php foreach ($data['eleves'] as $eleve): ?>
                <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $eleve['nom']; ?></h5>
                        <h5 class="card-title"><?php echo $eleve['prenom']; ?></h5>
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