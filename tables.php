<?php

class Tables {
    private $db;

    public function __construct(PDO $db) {
    $this->db = $db;
    }

    public function displayTable($tableName) {
        $sql = "SELECT * FROM $tableName";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}
