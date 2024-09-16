<?php
// Fehlerberichterstattung aktivieren
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start der Session
session_start();

// Verbindung zur Datenbank herstellen
include("./db.php");

// Initialisiere Nachrichten
$errorMessage = '';
$successMessage = '';

// Verarbeite das Formular, wenn es gesendet wird
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prüfen, ob E-Mail gesetzt ist
    if (!empty($email)) {
        // Abrufen des Benutzers aus der Datenbank
        $stmt = $connection->prepare("SELECT * FROM Member WHERE mail = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Prüfen, ob der Benutzer existiert
        if ($user) {
            // Prüfen, ob ein Passwort vorhanden ist
            if (!empty($user['Passwort'])) {
                // Passwort verifizieren
                if (password_verify($password, $user['Passwort'])) {
                    // Passwort stimmt überein
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['BeitragPosten'] = $user['BeitragPosten'];
                    header('Location: ./mitgliederbereich.php'); // Weiterleitung zur geschützten Seite
                    exit();
                } else {
                    $errorMessage = 'Das Passwort ist falsch!';
                }
            } else {
                // Kein Passwort vorhanden - Benutzer legt ein neues Passwort fest
                if (!empty($password)) {
                    // Passwort verschlüsseln und speichern
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $connection->prepare("UPDATE Member SET Passwort = ? WHERE mail = ?");
                    $stmt->bind_param("ss", $hashedPassword, $email);
                    if ($stmt->execute()) {
                        $successMessage = 'Passwort erfolgreich erstellt! Sie können sich jetzt anmelden.';
                    } else {
                        $errorMessage = 'Es gab einen Fehler beim Speichern des Passworts: ' . $stmt->error;
                    }
                } else {
                    $errorMessage = 'Bitte ein neues Passwort eingeben.';
                }
            }
        } else {
            // E-Mail existiert nicht
            $errorMessage = 'Die E-Mail-Adresse ist nicht registriert.';
        }
    } else {
        $errorMessage = 'Bitte geben Sie Ihre E-Mail-Adresse ein.';
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
    <meta name="description" content="Login zur Verwaltung der Webseite">
    <meta name="author" content="Kevin Faller">
    <title>Login</title>
</head>
<body>

<!-- Anthrazitfarbener Hintergrund -->
<div class="min-h-screen bg-gray-800 flex items-center justify-center">
  <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full flex items-center">
    
    <!-- Logo links vom Login-Formular -->
    <div class="hidden md:block mr-8">
      <img src="./Media/logo.jpg" alt="Logo" class="h-32 w-32">
    </div>

    <div class="w-full">
      <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h2>
      
      <!-- Fehlermeldung anzeigen, falls vorhanden -->
      <?php if ($errorMessage): ?>
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
              <strong>Error:</strong> <?php echo htmlspecialchars($errorMessage); ?>
          </div>
      <?php endif; ?>

      <!-- Erfolgsmeldung anzeigen, falls vorhanden -->
      <?php if ($successMessage): ?>
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
              <strong>Erfolg:</strong> <?php echo htmlspecialchars($successMessage); ?>
          </div>
      <?php endif; ?>

      <!-- Login-Formular -->
      <form action="login.php" method="POST">
        <div class="mb-4">
          <label for="email" class="block text-gray-700 font-medium mb-2">E-Mail</label>
          <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-500" required>
        </div>
        <div class="mb-6">
          <label for="password" class="block text-gray-700 font-medium mb-2">Passwort</label>
          <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-500" required>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-500">
          Anmelden
        </button>
      </form>

      <!-- Link zur Registrierung -->
      <p class="mt-4 text-center text-gray-600">
          Noch kein Konto? <a href="mitglied.php" class="text-blue-600 hover:text-blue-700">Registrieren</a>
      </p>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
