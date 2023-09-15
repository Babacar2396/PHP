<?php

namespace Models;

use App\Model;

class AdminModel extends Model
{
    private $username;
    private $password;

    public function __construct()
    {
        parent::__construct();
    }

    public function Authentifier($username, $password)
    {
        $query = "SELECT username, password FROM Admin WHERE username = :username";
        $stmt = $this->bd->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $admin = $stmt->fetch();

        if ($admin && $admin['password'] === $password) {
            return true;
        } else {
            return false;
        }
    }
    
}

