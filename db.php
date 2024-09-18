<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
//$servername = "localhost"; // Change this to your server name//
//$username = "root"; // Change this to your database username//
//$password = ""; // Change this to your database password "Testing1234!"//
$servername = "rdbms.strato.de";
$username = "dbu1371657";
$password = "MeinVerein12!";
$database = "dbs12879307";
// $database = "verein_database";
// $servername = "localhost";
// $username = "doptorbd_coin";
// $password = "doptorbd_coin";
// $database = "doptorbd_coin";

$connection = new mysqli($servername, $username, $password, $database);

// Check connection
// if ($connection->connect_error) {
//     die("Connection failed: " . $connection->connect_error);
// } else {
//     echo "Connected successfully";
// }
?>