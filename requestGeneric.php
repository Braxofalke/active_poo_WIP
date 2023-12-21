<?php

include_once('./database.php');

function queryAll($db, $tableName){
    $sql = "SELECT * FROM $tableName";
    $request = $db->prepare($sql);
    $request->execute();
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


?>
