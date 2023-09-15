<?php
    session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Page de connexion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://localhost:4000/script.js"></script>
   <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-container {
            max-width: 600px;
            width: 100%;
            height: 550px;
            padding: 20px;
            margin-top: -15rem;
            border: 1px solid white;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            font-size: 50px;
            padding-bottom: 2rem;
        }

        .login-container .form-group label {
            font-size: 25px;
        }

        .login-container .form-control {
            font-size: 25px;
        }

        .login-container .btn {
            font-size: 25px;
            margin-top: 3rem;
            margin-left: 8.5rem;
            width: 50%;
            text-align: center;
        }
    </style>
</head>

<body class="img js-fullheight" style="background-image: url('bg.jpg'); background-size: cover;">

    <div class="login-container">
        <h2 class="text-center">Connexion</h2>
        <form action="http://localhost:4000/niveau" method="post">
            <div class="form-group">
                <label style="font-size: 2rem;" for="username">Nom d'utilisateur</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Entrez votre nom d'utilisateur">
            </div>
            <div class="form-group">
                <label style="font-size: 2rem;" for="password">Mot de passe</label>
                <input type="password" class="form-control" name ="password" id="password" placeholder="Entrez votre mot de passe">
            </div>
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>

</body>

</html>
