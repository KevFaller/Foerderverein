<?php
// Fehlerberichte aktivieren
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Datenbankverbindung einbinden
include("db.php");

// SQL-Query zur Berechnung der Anzahl der Anmeldungen, Anzahl der Kuchen und Gesamtumsatz
$sql = "
    SELECT 
        COUNT(*) AS anmeldungen, 
        SUM(kuchen) AS kuchen, 
        SUM(price) AS gesamtumsatz
    FROM 
        Flohmarkt2025
";

// Abfrage ausführen
$result = mysqli_query($connection, $sql);

// Fehlerbehandlung bei der Abfrage
if (!$result) {
    die('Fehler bei der Datenbankabfrage: ' . mysqli_error($connection));
}

// Daten abrufen
$data = mysqli_fetch_assoc($result);

// Überprüfen, ob Daten vorhanden sind
if ($data) {
    $anmeldungen = $data['anmeldungen'];
    $kuchen = $data['kuchen'];
    $gesamtumsatz = $data['gesamtumsatz'];
} else {
    $anmeldungen = 0;
    $kuchen = 0;
    $gesamtumsatz = 0;
}

// HTML-Ausgabe der Daten
echo '
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h3 class="text-xl font-semibold text-gray-900">Flohmarkt 2025 Infos</h3>
        <p class="mt-2 text-gray-600">Übersicht über die Flohmarkt 2025.</p>
        <div class="mt-4 bg-gray-100 p-4 rounded-lg shadow-inner">
            <ul class="list-disc pl-5">
                <li>Anzahl der Anmeldungen: ' . htmlspecialchars($anmeldungen) . '</li>
                <li>Anzahl der Kuchen: ' . htmlspecialchars($kuchen) . '</li>
                <li>Gesamtumsatz: €' . htmlspecialchars(number_format($gesamtumsatz, 2)) . '</li>
            </ul>
        </div>
    </div>';
?>
