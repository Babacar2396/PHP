<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscriptions</title>
 </head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<body>

    <?php
      require_once('../Vues/navbar.php');
  ?>


    <div class="container py-4 ml-1">
        <h1 class="text-center mb-4">Inscriptions</h1>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="table-danger">
                        <tr>
                            <th>nom_eleve</th>
                            <th>prenom_eleve</th>
                            <th>type</th>
                            <th>classe</th>
                            <th>annee</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $insc): ?>
                        <tr>
                            <td class="table-secondary"><?php echo $insc['nom_eleve']; ?></td>
                            <td class="table-secondary"><?php echo $insc['prenom_eleve']; ?></td>
                            <td class="table-secondary"><?php echo $insc['type_eleve']; ?></td>
                            <td class="table-success"><?php echo $insc['classe']; ?></td>
                            <td class="table-success"><?php echo $insc['annee']; ?></td>
                            <td>
                                <button>modifier</button>
                                <button>supprimer</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>

