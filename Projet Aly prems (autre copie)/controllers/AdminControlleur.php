<?php

namespace Controllers;
session_start();
use Models\AdminModel;


class AdminControlleur
{
    public function connectel()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $adminModel = new AdminModel();

            $authenticated = $adminModel->Authentifier($username, $password);

            if ($authenticated) {
                $_SESSION['success']='Bienvenue';
                header('Location: /niveau');
                exit();

            } else {
                $_SESSION['error'] = 'Nom d\'utilisateur ou mot de passe invalide.';
                header('Location: /');
                exit();
            }
        }
    }

    public function logout()
    {
        header('Location: /');
        exit();
    }


}

