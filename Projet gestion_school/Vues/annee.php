<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Années scolaires</title>
 </head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<body>

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


    <div style="width: 30rem; margin-left:80rem; margin-top:3rem">
    <form action="/addannee" method="POST">
            <div class="form-group">
                <label for="annee">Année scolaire</label>
                <input type="text" class="form-control" name="annee" placeholder="Année scolaire" pattern="\d{4}-\d{4}" title="Veuillez entrer l'année au format xxxx-yyyy" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
    </form>
    </div>

    <div class="container py-4 ml-1">
        <h1 class="text-center mb-4">Années scolaires</h1>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="table-danger">
                        <tr>
                            <th>id_annee_scolaire</th>
                            <th>annee_scolaire</th>
                            <th>actif</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php foreach ($data['annees'] as $annee): ?>
            <tr>
                <td class="table-primary"><?php echo $annee['id_annee_scolaire']; ?></td>
                <td class="table-secondary"><?php echo $annee['annee_scolaire']; ?></td>
                <td class="table-success"><?php echo $annee['actif']; ?></td>
               <td>
                <div class="d-flex">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-<?php echo $annee['id_annee_scolaire']; ?>">Modifier</button>
                    <?php if ($annee['actif'] === 'non'): ?>
                        <form action="/active" method="POST">
                            <input type="hidden" name="activer" value="<?php echo $annee['id_annee_scolaire']; ?>">
                            <button type="submit" class="btn btn-primary mx-1">Activer</button>
                        </form>
                        <a><button class="btn btn-primary mx-1" disabled>Desactiver</button></a>
                    <?php else: ?>
                        <form action="/desactive" method="POST">
                            <input type="hidden" name="desactiver" value="<?php echo $annee['id_annee_scolaire']; ?>">
                            <button type="submit" class="btn btn-primary mx-1">Desactiver</button>
                        </form>
                        <a><button class="btn btn-primary mx-1" disabled>Activer</button></a>
                    <?php endif; ?>
                    <?php if ($annee['actif'] === 'non'): ?>
                        <form action="/delete" method="post">
                            <input type="hidden" name="delete" value="<?php echo $annee['id_annee_scolaire']; ?>">
                            <button class="btn btn-primary mx-1">Supprimer</button>
                        </form>
                    <?php else: ?>
                        <button class="btn btn-primary mx-1" disabled>Supprimer</button>
                    <?php endif; ?>
                </div>
                </td>

            </tr>
                    <div class="modal fade" id="modal-<?php echo $annee['id_annee_scolaire']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel-<?php echo $annee['id_annee_scolaire']; ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel-<?php echo $annee['id_annee_scolaire']; ?>">Modifier l'année scolaire</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/newyear" method="post">
                                        <div class="form-group">
                                            <label for="annee">Année scolaire</label>
                                            <input type="text" class="form-control" value="<?php echo $annee['annee_scolaire']; ?>" name="annee" placeholder="Nouvelle année scolaire" pattern="\d{4}-\d{4}" title="Veuillez entrer l'année au format xxxx-yyyy" required>
                                        </div>
                                        <input type="hidden" name="id_annee" value="<?php echo $annee['id_annee_scolaire']; ?>">
                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>
                    </tbody>
                    <!-- <tfoot>

                    <form action="/anneee" method="post">
                        <div class="form-group">  
                        <button type="submit" class="btn btn-primary">Previous</button>
                        </div>
                    </form>
                    <form action="/next" method="post">
                        <div class="form-group">  
                        <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </form>

                    </tfoot> -->
                </table>
            </div>
        </div>

    </div>

    <script>


        setTimeout(function() {
            var successAlert = document.querySelector('.alert-success');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
        }, 2000);

        setTimeout(function() {
            var errorAlert = document.querySelector('.alert-danger');
            if (errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 2000);


    </script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>