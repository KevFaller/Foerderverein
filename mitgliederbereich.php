<?php
// Fehlerberichterstattung aktivieren
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start der Session, falls noch nicht gestartet
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Überprüfen, ob der Benutzer eingeloggt ist
if (!isset($_SESSION['user_id'])) {
    // Wenn der Benutzer nicht eingeloggt ist, weiterleiten
    header("Location: login.php");
    exit();
}

// Verbindung zur Datenbank herstellen
include("./db.php");
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./Media/Foerderverein_logo.ico">
    <meta name="description" content="Mitgliederbereich des Fördervereins Kita Löwenbergpark">
    <meta name="author" content="Kevin Faller">
    <title>Mitgliederbereich des Fördervereins Kita Löwenbergpark</title>
</head>
<body>
<!-- Navigation -->
<?php include("./navigation.php"); ?>

<!-- Hauptbereich -->
<div class="relative bg-white">
    <!-- Logo oben rechts -->
    <div class="absolute top-0 right-0 m-4">
        <img class="h-20 w-auto" src="./Media/logo.jpg" alt="Logo">
    </div>

    <div class="py-24 sm:py-32 lg:mx-auto lg:max-w-7xl">
        <div class="mx-auto max-w-xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900">Mitgliederbereich</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Willkommen im Mitgliederbereich! Hier können Sie neue Beiträge erstellen und verwalten.</p>
        </div>

        <!-- Kachel-Anordnung -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4 mt-8">
            <!-- Kachel: Beitrag erstellen -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900">Beitrag erstellen</h3>
                <p class="mt-2 text-gray-600">Erstellen Sie einen neuen Beitrag für die Webseite.</p>
                <a href="beitragErstellen.php" class="mt-4 block bg-blue-600 text-white px-4 py-2 rounded-lg text-center hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Beitrag erstellen</a>
            </div>

            <!-- Kachel: Passwort ändern -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900">Passwort ändern</h3>
                <p class="mt-2 text-gray-600">Ändern Sie Ihr Passwort für mehr Sicherheit.</p>
                <a href="passwortAendern.php" class="mt-4 block bg-green-600 text-white px-4 py-2 rounded-lg text-center hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Passwort ändern</a>
            </div>

            <!-- Platz für weitere Kacheln -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900">Weitere Funktionen</h3>
                <p class="mt-2 text-gray-600">Hier können Sie weitere Funktionen hinzufügen.</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900">Weitere Funktionen</h3>
                <p class="mt-2 text-gray-600">Hier können Sie weitere Funktionen hinzufügen.</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-900">Weitere Funktionen</h3>
                <p class="mt-2 text-gray-600">Hier können Sie weitere Funktionen hinzufügen.</p>
            </div>
        </div>
    </div>
</div>

<?php include("./footer.php"); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
