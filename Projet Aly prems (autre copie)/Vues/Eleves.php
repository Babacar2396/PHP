<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiants</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiants</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<style>
body {
  margin:0;
  padding:0;
  background:#002b36;
  font-family: roboto, sans-serif;

}
.fadel{
    display: flex;
    justify-content: center;
}
    </style>
</head>
<body>
<a href="/student/getNiveauByIdclasse/<?= $id ?>" class="btn btn-success me-2 position-relative"
    style="top: 5rem;left: 90%;background-color: white;color:black">ajouter un éléve</a>
  <div class="ml-3 position-relative " style="top: 3rem; ">
    <a style="background-color: white;color:black" href="/niveau/classe/<?= $id ?>" class="active_status btn btn-success">retour</a>
    <a style="background-color: white;color:black" href="/classe/coef/<?= $id ?>" class="active_status btn btn-success">Coef</a>
  </div>
  <div class="fs-5 fw-bolder navbar navbar-light w-25 position-relatve p-3 mb-3" style="left: 22rem;top: 2rem;color:white;">
    <span class="mr-3"> CP(2019-2020)</span>
    <span class="mr-3"> effectif : CP</span>
    <span class="mr-3"> moyenne classe : 13</span>
  </div>
  <div class="d-flex position-relative justify-content-between p-3 w-100 " style="top: 5rem;color:white;">
    <div class="d-flex position-relative justify-content-around w-75 " style="left:11rem;">
      <div class="mb-3">
        <span class="input-group" id="basic-addon1">Discipline:</span>
        <select class="form-select" aria-label="Default select example" id="idDiscSelect">
          <option selected>choisir</option>
          <?php foreach ($discipline as $d): ?>
            <option value="<?= $d['id_disc'] ?>"><?= $d['nom_disc'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-3">
        <span class="input-group" id="basic-addon1">Semestre:</span>
        <select class="form-select" aria-label="Default select example" id="idSemestreSelect">
          <option selected>choisir</option>
          <?php foreach ($periode as $p): ?>
            <option value="<?= $p['id_periode'] ?>"><?= $p['libelle'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-3">
        <span class="input-group" id="basic-addon1">Note De :</span>
        <select class="form-select" aria-label="Default select example" id="idNoteSelect" disabled>
          <option selected>choisir</option>
          <option class="1">ressource</option>
          <option class="2">composition</option>

        </select>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center position-relative  mt-3 flex-column align-items-center w-75"
    style="top: 2rem;left: 12rem;color:white;">
    <form action="">
      <table class="table" style="width: 90vw;">
        <thead style="background-color: white;" >
          <tr>
            <th class="border border-dark col-4">Prenom</th>
            <th class="border border-dark col-4">Nom</th>
            <th class="border border-dark col-4">Note</th>
          </tr>
        </thead>
        <tbody style="background-color: white;">
          <?php foreach ($data as $d): ?>
            <tr>
              <td class="border border-dark  col-4">
                <?= $d['prenom'] ?>
              </td>
              <td class="border border-dark  col-4">
                <?= $d['nom'] ?>
              </td>
              <td class="border border-dark col-4 d-flex w-100">
                <input type="number" class="form-control w-50" aria-label="Username" aria-describedby="basic-addon1">
                <span>/10</span>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <div class="fadel">
      <button style="background-color: white;" class="btn btn-outline-success w-10 position-relative " style="left:50rem" type="button">Mettre A jour
      </button>
      </div>
      
    </form>
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="http://localhost:8000/script.js"></script>


</body>
</html>
