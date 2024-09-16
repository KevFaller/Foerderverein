<?php
// Fehlerberichterstattung aktivieren
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start der Session
session_start();

// Verbindung zur Datenbank herstellen
include("./db.php");
include("./navigation.php");

// Initialisiere Nachrichten
$errorMessage = '';
$successMessage = '';

// Verarbeite das Formular, wenn es gesendet wird
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Prüfen, ob alle Felder gesetzt sind
    if (!empty($email) && !empty($oldPassword) && !empty($newPassword) && !empty($confirmPassword)) {
        // Abrufen des Benutzers aus der Datenbank
        $stmt = $connection->prepare("SELECT * FROM Member WHERE mail = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Prüfen, ob der Benutzer existiert
        if ($user) {
            // Prüfen, ob das alte Passwort korrekt ist
            if (password_verify($oldPassword, $user['Passwort'])) {
                // Prüfen, ob das neue Passwort mit der Bestätigung übereinstimmt
                if ($newPassword === $confirmPassword) {
                    // Passwort verschlüsseln und aktualisieren
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $stmt = $connection->prepare("UPDATE Member SET Passwort = ? WHERE mail = ?");
                    $stmt->bind_param("ss", $hashedPassword, $email);
                    if ($stmt->execute()) {
                        $successMessage = 'Passwort erfolgreich geändert!';
                    } else {
                        $errorMessage = 'Es gab einen Fehler beim Aktualisieren des Passworts: ' . $stmt->error;
                    }
                } else {
                    $errorMessage = 'Die neuen Passwörter stimmen nicht überein.';
                }
            } else {
                $errorMessage = 'Das alte Passwort ist falsch.';
            }
        } else {
            $errorMessage = 'Die E-Mail-Adresse ist nicht registriert.';
        }
    } else {
        $errorMessage = 'Bitte füllen Sie alle Felder aus.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./Media/Foerderverein_logo.ico">
    <meta name="description" content="Passwort ändern">
    <meta name="author" content="Kevin Faller">
    <title>Passwort ändern</title>
</head>
<body>

<!-- Anthrazitfarbener Hintergrund -->
<div class="min-h-screen bg-gray-800 flex items-center justify-center">
  <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full flex items-center">
    
    <!-- Logo links vom Formular -->
    <div class="hidden md:block mr-8">
      <img src="./Media/logo.jpg" alt="Logo" class="h-32 w-32">
    </div>

    <div class="w-full">
      <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Passwort ändern</h2>
      
      <!-- Fehlermeldung anzeigen, falls vorhanden -->
      <?php if ($errorMessage): ?>
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
              <strong>Fehler:</strong> <?php echo htmlspecialchars($errorMessage); ?>
          </div>
      <?php endif; ?>

      <!-- Erfolgsmeldung anzeigen, falls vorhanden -->
      <?php if ($successMessage): ?>
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
              <strong>Erfolg:</strong> <?php echo htmlspecialchars($successMessage); ?>
          </div>
      <?php endif; ?>

      <!-- Passwort-Ändern-Formular -->
      <form action="passwortAendern.php" method="POST" autocomplete="off">
        <div class="mb-4">
          <label for="email" class="block text-gray-700 font-medium mb-2">E-Mail</label>
          <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
          <label for="old_password" class="block text-gray-700 font-medium mb-2">Altes Passwort</label>
          <input type="password" name="old_password" id="old_password" autocomplete="current-password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
          <label for="new_password" class="block text-gray-700 font-medium mb-2">Neues Passwort</label>
          <input type="text" name="new_password" id="new_password" autocomplete="off" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-500" required>
        </div>
        <div class="mb-6">
          <label for="confirm_password" class="block text-gray-700 font-medium mb-2">Neues Passwort wiederholen</label>
          <input type="text" name="confirm_password" id="confirm_password" autocomplete="off" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-500" required>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-500">
          Passwort ändern
        </button>
      </form>

    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
