<?php

namespace App\Models;

use PDO;
use Exception;

class DBModel
{
    protected $table;
    protected $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=mydatabase', 'username', 'password');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function all()
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            throw new Exception('Record not found.');
        }
        return $result;
    }

    // ... other common database operations such as insert, update, delete, etc.
}
