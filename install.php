<?php

/**
 * Open a connection via PDO to create a
 * new database and table with structure.
 *
 */

require "config.php";

try {
    $connection = new PDO($dsn, $username, $password, $options);
    $sql = file_get_contents("data/init.sql");
    echo "Database and table users created successfully.";
} catch(PDOException $error) {
    echo "<br>" . $error->getMessage();
}