<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDD AFPA</title>
    <link rel="shortcut icon" href="/assets/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="coloursAndStyle.css">
    
</head>

<body>
    <header>
        <h1 class="gradient-text">Base de données AFPA</h1>
    </header>

    <main> 
        <?php
        
        require_once('constants_1.php');
        require_once('database.php');
        require_once('requestGeneric.php');

        
        $db = getDb();

        /**
         * Database Connection
         *
         * This variable represents the connection to the database. It is used to interact with the database and execute SQL queries.
         *
         * @var mysqli $db The mysqli object that represents the database connection.
         */
        if ($db) {

            if (isset($_GET['table']) && in_array($_GET['table'], DB_TABLE_NAMES)) {
                $tableName = $_GET['table'];

                

                displayTable($db, $tableName);
            } else {



                echo "<form action=\"\" method=\"get\" class=\"styled-form\">";
                echo "<label for=\"tableSelector\">Choisissez une table :</label>";
                echo "<select name=\"table\" id=\"tableSelector\" class=\"custom-dropdown\">";
                foreach (DB_TABLE_NAMES as $table) {
                    echo "<option value=\"$table\">$table</option>";
                }
                echo "</select>";
                echo "<input type=\"submit\" value=\"Afficher la table\">";
                echo "</form>";
            }
        } else {
            echo "<p>La connexion à la base de données a échoué.</p>";
        }


        /**
         * Display Table
         *
         * This function displays a table generated from the data queried from the specified table.
         *
         * @param mysqli $db The mysqli object that represents the database connection.
         * @param string $tableName The name of the table to query data from.
         *
         * @return void
         */
        function displayTable($db, $tableName)
        {
            $data = queryAll($db, $tableName);
            echo "<h2>$tableName</h2>";
            echo "<table class=\"colored-table\">";
            echo "<tr>";
            foreach ($data[0] as $key => $value) {
                echo "<th class=\"first-row-header\">$key</th>";
            }
            echo "</tr>";


            /**
             * Represents the variable $data.
             *
             * This variable stores data of an unspecified type.
             * It is used to hold information that can be accessed and manipulated in a PHP program.
             *
             * @var mixed $data The data stored in the variable.
             */
            foreach ($data as $row) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
        
            echo "</table>";
        }
        ?>        
    </main>
</body>

</html>
