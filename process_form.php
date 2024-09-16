<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $email = $_POST["mail"];
    $handy = $_POST["handy"];
    $adresse = $_POST["company"];
    $tische = $_POST["tische"];
    $kuchen = $_POST["cake"];

    // Do something with the form data (e.g., save to a database)
    // Here you can perform validation, sanitization, and other processing tasks
    
    // For demonstration, let's simply display the submitted data
    echo "<h2>Submitted Form Data:</h2>";
    echo "<p>Vorname: $vorname</p>";
    echo "<p>Nachname: $nachname</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Handy: $handy</p>";
    echo "<p>Adresse: $adresse</p>";
    echo "<p>Anzahl Tische: $tische</p>";
    echo "<p>Kuchen: $kuchen</p>";
}
?>
