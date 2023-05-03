<?php

namespace App\Models;

use PDO;
use Exception;
use Dotenv\Dotenv;

class DBModel
{
    protected $table;
    protected $db;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $name = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];
        
        $this->db = new PDO("mysql:host=$host;dbname=$name", $user, $password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //comment ne pas recreer une instance avec un Singleton
        // $this->db = DB::getInstance();
        
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
