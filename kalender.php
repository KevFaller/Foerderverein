<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./Media/Foerderverein_logo.ico">
    <meta name="description" content="Die Ofizielle Website von unserem Foerderverein">
    <meta name="keywords" content="Foerderverein, Infos, Kindergarten">
    <meta name="author" content="Kevin Faller">
    <title>Infos vom Foerderverein Kita Loewenbergpark</title>
</head>
<body>
<!-- Navigation -->
<?php
include("db.php");
include("navigation.php");
//include("header.php");
?>


<!-- Kalender-Import-Anleitungen -->
<div class="container mx-auto p-4">
    <div class="bg-white p-6 rounded shadow-md mb-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Kalender Import-Anleitungen</h2>
        
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Kalender-Link</h3>
            <p class="mt-2">Hier ist der Kalender-Link, den du kopieren und in verschiedenen Kalender-Anwendungen verwenden kannst:</p>
            <pre class="bg-gray-800 text-white p-4 rounded mt-2">
https://calendar.google.com/calendar/ical/fordervereinlowenbergpark%40gmail.com/public/basic.ics
            </pre>
        </div>

        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Import in den iPhone Kalender</h3>
            <ol class="list-decimal list-inside pl-4">
                <li>Öffne die <strong>Kalender-App</strong> auf deinem iPhone.</li>
                <li>Tippe auf <strong>Kalender hinzufügen</strong> oder gehe zu <strong>Kalender</strong> > <strong>Bearbeiten</strong> > <strong>Neuer Kalender hinzufügen</strong>.</li>
                <li>Wähle <strong>Kalender abonnieren</strong>.</li>
                <li>Gib den Kalender-Link in das Feld <strong>Server</strong> ein.</li>
                <li>Tippe auf <strong>Abonnieren</strong> und folge den Anweisungen, um den Kalender hinzuzufügen.</li>
            </ol>
        </div>

        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Import in den Google Kalender</h3>
            <ol class="list-decimal list-inside pl-4">
                <li>Öffne [Google Kalender](https://calendar.google.com).</li>
                <li>Klicke auf das Pluszeichen neben <strong>Weitere Kalender</strong> auf der linken Seite.</li>
                <li>Wähle <strong>Per URL hinzufügen</strong> aus.</li>
                <li>Füge den Kalender-Link in das Feld <strong>Kalender-URL</strong> ein.</li>
                <li>Klicke auf <strong>Hinzufügen</strong>, um den Kalender zu importieren.</li>
            </ol>
        </div>

        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Import in den Android Kalender</h3>
            <ol class="list-decimal list-inside pl-4">
                <li>Öffne die <strong>Google Kalender-App</strong> auf deinem Android-Gerät.</li>
                <li>Tippe auf das Menü-Symbol (drei Striche) und gehe zu <strong>Kalender hinzufügen</strong>.</li>
                <li>Wähle <strong>Kalender abonnieren</strong> oder <strong>Per URL hinzufügen</strong> aus.</li>
                <li>Füge den Kalender-Link in das Feld <strong>Kalender-URL</strong> ein.</li>
                <li>Tippe auf <strong>Abonnieren</strong>, um den Kalender hinzuzufügen.</li>
            </ol>
        </div>
    </div>
<!-- Kalender Beispielbild -->
<div class="mb-8 text-center">
    <h3 class="text-3xl font-extrabold text-gray-900 mb-6">
        So könnte es auf einem iPhone Kalender aussehen
    </h3>
    <div class="relative inline-block bg-white p-6 rounded-lg shadow-lg overflow-hidden max-w-md mx-auto">
        <img src="./Media/KalenderBeispiel.jpeg" alt="Kalender Beispiel" class="w-full h-auto object-cover rounded-lg">
        <div class="absolute inset-0 bg-black opacity-30"></div>
        <div class="relative text-center text-white p-4">
            <p class="text-lg font-medium">Beispielansicht eines Kalendereintrags auf einem iPhone</p>
        </div>
    </div>
</div>


</div>

<?php
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