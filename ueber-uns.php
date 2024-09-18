<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./Media/Foerderverein_logo.ico">
    <meta name="description" content="Finden Sie alle Infos zu dem Kuchenverkauf 2024">
    <meta name="keywords" content="Foerderverein, kuchenverkauf, flohmarkt2024">
    <meta name="author" content="Kevin Faller">
    <title>Vorstand</title>
</head>
<body>
<?php
// error_reporting(E_ALL); ini_set('display_errors', 1);
include("./db.php");
include("./navigation.php");
    ?>

<div class="bg-gray-900 py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 text-center lg:px-8">
    <div class="mx-auto max-w-2xl">
      <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Vorstand</h2>
    </div>
    <ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-6 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3 lg:gap-8">
    <?php
    $sql = "SELECT * FROM Member WHERE vorstand = 1";
    $result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($result)) {
    
    $bild = $row["Media"];
    $vorname = $row["vorname"];
    $nachname = $row["nachname"];
    $position = $row["position"];
    $mail = $row["mail"];
    
    echo '
    <li class="rounded-2xl bg-gray-800 px-8 py-10">
        <img class="mx-auto h-48 w-48 rounded-full md:h-56 md:w-56" src="'.$bild.'" alt="">
        <h3 class="mt-6 text-base font-semibold leading-7 tracking-tight text-white">'.$vorname.' '.$nachname.'</h3>
        <p class="text-sm leading-6 text-gray-400">'.$position.'</p>
        <ul role="list" class="mt-6 flex justify-center gap-x-6">
          <li>
            <a href="mailto:'.$mail.'" class="text-sm leading-6 text-blue-400 hover:underline">'.$mail.'</a>
          </li>
        </ul>
      </li>';
    }
      ?>
    </ul>
  </div>
</div>
<?php
include("./footer.php");
// Check if the form is submitted

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>