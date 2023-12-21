<?php

require_once('constants_1.php');

function getDb() {
    try {
        $dsn = "mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DB_NAME;
        $db = new PDO($dsn, DB_USER, DB_PASSWORD);
        return $db;
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}

?>
