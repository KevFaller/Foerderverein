<?php

//$servername = "localhost"; // Change this to your server name//
//$username = "root"; // Change this to your database username//
//$password = ""; // Change this to your database password "Testing1234!"//
//$database = "verein_database"; // Change this to your database name "verein_database"
$servername = "rdbms.strato.de"; // Change this to your server name//
$username = "dbu1371657"; // Change this to your database username dbu1371657//
$password = "MeinVerein12!"; // Change this to your database password "Testing1234!"//
$database = "dbs12879307"; // Change this to your database name "verein_database"
// Using object-oriented style to connect to MySQL
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
/*if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} else {
    echo "Connected successfully";
}*/
?>