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

     <?php if (isset($_SESSION['error'])): ?>
        <p class="error"><?php echo $_SESSION['error']; ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

<div class="container">

<!-- <div class="filter-container">

<label for="filter-class">Classe :</label>
<select id="filter-class">
    <option value="">Toutes les classes</option>
    <option value="2nd S">2ndS</option>
    <option value="3e">3e</option>
    <option value="2nd L">2ndSTEG</option>
    <option value="CM2 A">TleS1</option>

</select>

<button class="btn btn-primary" id="btn-filter">Filtrer</button>
</div> -->

<div class="container py-4">
    
<h1 class="text-center mb-4">Listes des élèves</h1>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
            </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Date de naissance</th>
                        <th>Lieu de naissance</th>
                        <th>Numéro</th>
                        <th>Sexe</th>
                        <th>Niveau</th>
                        <th>Classe</th>
                        <th>actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($data['eleves'] as $eleve):?>
                        <tr>
                            <td><?php echo $eleve['prenom']; ?></td>
                            <td><?php echo $eleve['nom']; ?></td>
                            <td><?php echo $eleve['date_born']; ?></td>
                            <td><?php echo $eleve['lieu_born']; ?></td>
                            <td><?php echo $eleve['numero']; ?></td>
                            <td><?php echo $eleve['sexe']; ?></td>
                            <td><?php echo $eleve['niveau']; ?></td>
                            <td><?php echo $eleve['classe']; ?></td>
                            <td>
                                <button>modifier</button>
                                <button>archiver</button>
                            </td>
                        </tr>
                    <?php endforeach ?>

                    </tbody>
                </table>
        </div>
    </div>

</div>


</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>

</script>

</body>

</html>

