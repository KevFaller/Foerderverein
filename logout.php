<?php
// Starten oder Fortsetzen der Session
session_start();

// Alle Session-Variablen löschen
session_unset();

// Die Session zerstören
session_destroy();

// Weiterleitung zur Login-Seite nach dem Logout
header('Location: login.php');
exit();
?>
