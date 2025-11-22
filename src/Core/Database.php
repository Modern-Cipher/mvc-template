<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
    private $dbh;
    private $error;

    public function __construct() {
        // Load .env variables manually if not using a library yet, or assume $_ENV is populated
        $host   = $_ENV['DB_HOST'] ?? 'db';
        $dbname = $_ENV['DB_NAME'] ?? 'db';
        $user   = $_ENV['DB_USER'] ?? 'db';
        $pass   = $_ENV['DB_PASS'] ?? 'db';

        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8';
        
        try {
            $this->dbh = new PDO($dsn, $user, $pass, [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            die("Connection Failed: " . $this->error);
        }
    }

    public function connect() {
        return $this->dbh;
    }
}