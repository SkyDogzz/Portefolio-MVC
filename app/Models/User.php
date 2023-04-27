<?php

namespace App\Models;

use PDO;

class User extends DBModel
{
    protected $table = 'users';

    public function authenticate($email, $password)
    {
        $user = $this->findOneByEmail($email);

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user['password'])) {
            return false;
        }

        return $user;   
    }

    private function findOneByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            return false;
        }
        return $result;
    }
}