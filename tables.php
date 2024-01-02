<?php

/**
 * Class Tables
 *
 * This class is used for interacting with database tables.
 */
class Tables {
    private $db;

    public function __construct(PDO $db) {
    $this->db = $db;
    }

    /**
     * Retrieves and displays all rows from the specified database table.
     *
     * @param string $tableName The name of the table to fetch the data from.
     *
     * @return void
     */
    public function displayTable($tableName) {
        $sql = "SELECT * FROM $tableName";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}
