<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./Media/Foerderverein_logo.ico">
    <meta name="description" content="Finden Sie heraus, wie man Mitglied werden kann">
    <meta name="keywords" content="Mitglied werden,Mitgliedschaft,Foerderverein, kuchenverkauf, flohmarkt2024">
    <meta name="author" content="Kevin Faller">
    <title>Mitglied werden</title>
</head>
<body>
<?php
// error_reporting(E_ALL); ini_set('display_errors', 1);
include("./db.php");
include("./navigation.php");

// Holen des Bildes aus der Datenbank
$sql = "SELECT foto FROM About WHERE id = 1";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$bild = $row["foto"];

// Header
echo '<div class="bg-gray-900 py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto lg:mx-0">
      <h2 class="text-xl text-center font-bold tracking-tight text-white sm:text-6xl">Mitgliedschaft</h2>
    </div>
  </div>
</div>';

echo '<div class="bg-white px-6 lg:px-8">
  <div class="mx-auto max-w-3xl text-base leading-7 text-gray-700">';

// Anzeige des PDF im iframe
echo '
    <div class="mt-16">
      <iframe src="./Dokumente/Foerderverein_Aufnahmeantrag.pdf" width="100%" height="600px" class="rounded-lg border border-gray-300"></iframe>
    </div>
    <div class="mt-8 text-center">
      <a href="./Dokumente/Foerderverein_Aufnahmeantrag.pdf" download="Mitgliedsantrag.pdf" class="inline-block px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700">
        Download Mitgliedsantrag
      </a>
    </div>';

// // Bild aus der Datenbank anzeigen
// echo '<figure class="mt-16">
//       <img class="aspect-video rounded-xl bg-gray-50 object-cover" src="'.$bild.'" alt="Mitglied werden Bild">
//       <figcaption class="mt-4 flex gap-x-2 text-sm leading-6 text-gray-500">
//         <svg class="mt-0.5 h-5 w-5 flex-none text-gray-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
//           <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd" />
//         </svg>
//       </figcaption>
//     </figure>';

// // Textauszüge aus der Datenbank anzeigen
// $sql = "SELECT id, title1, text1, title2, text2, title3, text3 FROM About";
// $result = mysqli_query($connection, $sql);

// while ($row = mysqli_fetch_assoc($result)) {
//     $title1 = $row["title1"];
//     $text1 = $row["text1"];
//     $title2 = $row["title2"];
//     $text2 = $row["text2"];
//     $title3 = $row["title3"];
//     $text3 = $row["text3"];

//     echo '
//       <h2 class="mt-16 text-2xl font-bold tracking-tight text-gray-900">'.$title1.'</h2>
//       <p class="mt-6">'.$text1.'</p>
//       <h2 class="mt-16 text-2xl font-bold tracking-tight text-gray-900">'.$title2.'</h2>
//       <p class="mt-6">'.$text2.'</p>
//       <h2 class="mt-16 text-2xl font-bold tracking-tight text-gray-900">'.$title3.'</h2>
//       <p class="mt-6">'.$text3.'</p>';
// }

echo '</div></div>';

include("./footer.php");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
