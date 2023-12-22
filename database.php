<?php

require_once('./constants_1.php');

class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $dsn = "mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DB_NAME;
        $this->connection = new PDO($dsn, DB_USER, DB_PASSWORD);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (!self::$instance) {
        self::$instance = new Database();
    }
    return self::$instance;
}

    public function getConnection() {
        return $this->connection;
    }
}
