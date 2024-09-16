<?php
// Start der Sitzung, falls sie noch nicht aktiv ist
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Sitzung und alle Session-Daten löschen
$_SESSION = array(); // Alle Session-Variablen löschen

// Falls ein Cookie für die Sitzung existiert, diesen ebenfalls löschen
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Sitzung beenden
session_destroy();

// Weiterleitung zur Startseite oder Login-Seite
header("Location: index.php");
exit();
?>
