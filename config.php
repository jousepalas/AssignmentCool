<?php

/**
 * Configuration for database connection
 *
 */

$host       = "mysql";
$username   = "root";
$password   = "root";
$dbname     = "coolblue";
$dsn        = "mysql:host=$host;dbname=$dbname";
$port       = 3306;
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );