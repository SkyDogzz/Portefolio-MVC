<?php

namespace App\Models;

use PDO;

class Contact extends DBModel
{
    protected $table = 'contact';

    public function save(array $data)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO $this->table (subject, message, email) VALUES (:subject, :message, :email)"
        );

        $stmt->bindParam(':subject', $data['subject'], PDO::PARAM_STR);
        $stmt->bindParam(':message', $data['message'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);

        return $stmt->execute();
    }
}
