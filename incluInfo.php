<?php
// Aktuelles Datum für die Abfrage
$current_date = date("Y-m-d");

// SQL-Query zum Abrufen aller zukünftigen Informationen sortiert nach Datum (die ältesten zuerst)
$sql = "SELECT id, title, date, image, autor FROM Infos WHERE date >= '$current_date' ORDER BY date ASC";
$result = mysqli_query($connection, $sql);

// Prüfen, ob Ergebnisse zurückgegeben wurden
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="container mx-auto p-4">'; // Container für die Kacheln untereinander

        // Schleife durch alle Ergebnisse
        while ($row = mysqli_fetch_assoc($result)) {
            $id_post = htmlspecialchars($row["id"]); // Schutz vor XSS
            $title = htmlspecialchars($row["title"]); // Schutz vor XSS
            $date = $row["date"];
            $image = htmlspecialchars($row["image"]); // Schutz vor XSS
            $autor = htmlspecialchars($row["autor"]); // Schutz vor XSS

            // Formatierung des Datums
            $formatted_date = date("d.m.Y", strtotime($date));

            echo '
            <div class="bg-white p-4 rounded-lg shadow-md mb-4"> <!-- Kacheln untereinander -->
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img src="'.htmlspecialchars($image).'" alt="Bild" class="w-24 h-24 object-cover rounded-full">
                    </div>
                    <div class="ml-4">
                        <h2 class="text-xl font-bold text-gray-900">'.$title.'</h2>
                        <p class="text-gray-600">Datum: '.$formatted_date.'</p>
                        <p class="text-gray-600">Autor: '.$autor.'</p>
                    </div>
                </div>
            </div>';
        }

        echo '</div>'; // Ende des Containers
    } else {
        echo '<p class="text-center text-gray-600">Keine zukünftigen Daten gefunden.</p>';
    }
} else {
    die('Fehler bei der Datenbankabfrage: ' . mysqli_error($connection));
}
?>
