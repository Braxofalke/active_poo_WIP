<?php

include_once('./database.php');

/**
 * Executes a query to retrieve all records from a specified table in the database.
 *
 * @param PDO $db The database connection object.
 * @param string $tableName The name of the table to query.
 * @return array An array containing all records from the specified table.
 */
function queryAll($db, $tableName){
    $sql = "SELECT * FROM $tableName";
    $request = $db->prepare($sql);
    $request->execute();
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


?>
