<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./Media/Foerderverein_logo.ico">
    <meta name="description" content="Die Ofizielle Website von unserem Foerderverein">
    <meta name="keywords" content="Foerderverein, kuchenverkauf, flohmarkt2024">
    <meta name="author" content="Kevin Faller">
    <title>Foerderverein Kita Loewenbergpark</title>
</head>
<body>
<!-- Navigation -->
<?php
include("db.php");
include("navigation.php");
include("header.php");
include("blog.php");
include("footer.php");

?>
<?php
/*
$servername = "localhost"; // Change this to your server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password "Testing1234!"
$database = "verein_database"; // Change this to your database name "dbs12598121"

// Using object-oriented style to connect to MySQL
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} else {
    echo "Connected successfully";
}*/
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>