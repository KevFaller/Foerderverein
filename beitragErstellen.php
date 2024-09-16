<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./Media/Foerderverein_logo.ico">
    <meta name="description" content="Registrieren Sie sich für unseren Flohmarkt 2024">
    <meta name="keywords" content="Foerderverein, kuchenverkauf, flohmarkt2024">
    <meta name="author" content="Kevin Faller">
    <title>Beitrag Erstellen</title>
</head>
<body>
<!-- Navigation -->
<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
include("./db.php");
include("./navigation.php");
echo '
<div class="relative bg-white">
  <div class="lg:absolute lg:inset-0 lg:left-1/2">
    <img class="h-64 w-full bg-gray-50 object-cover sm:h-80 lg:absolute lg:h-[70%]" src="./Media/logo.jpg" alt="Flohmarkt bild">
  </div>
  <div class="pb-24 pt-16 sm:pb-32 sm:pt-24 lg:mx-auto lg:grid lg:max-w-7xl lg:grid-cols-2 lg:pt-32">
    <div class="px-6 lg:px-8">
      <div class="mx-auto max-w-xl lg:mx-0 lg:max-w-lg">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Beitrag Erstellen</h2>
        <p class="mt-2 text-lg leading-8 text-gray-600">Hier können Sie einen Beitrag posten!</p>
        <form action="beitragErstellen.php" method="POST" class="mt-16" enctype="multipart/form-data">
          <div class="grid gap-x-8 gap-y-6">
            <div>
              <label for="autor" class="block text-sm font-semibold leading-6 text-gray-900">Autor</label>
              <div class="mt-2.5">
                <input type="text" name="autor" id="autor" autocomplete="given-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
            <div>
              <label for="title" class="block text-sm font-semibold leading-6 text-gray-900">Title</label>
              <div class="mt-2.5">
                <input type="text" name="title" id="title" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
            <div>
              <label for="text" class="block text-sm font-semibold leading-6 text-gray-900">Beschreibung</label>
              <div class="mt-2.5">
                <textarea type="text" name="text" id="text" rows="5" cols="30" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </textarea>
                </div>
            </div>
            <div>
        <label for="images" class="block text-sm font-semibold leading-6 text-gray-900">Bilder hochladen</label>
        <input type="file" name="images[]" id="images" multiple="multiple" class="block w-full text-sm text-gray-900 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
    </div>
          <div class="flex border-gray-900/10 pt-8">
            <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Beitrag Posten</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>';

include("./footer.php");
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $autor = $_POST["autor"];
    $title = $_POST["title"];
    $text = $_POST["text"];
    $bild = "./Media/" . $_FILES['images']['name'][0]; 
    $sql = "INSERT INTO Beitrag (title, text, bild, autor) 
        VALUES ('$title','$text', '$bild', '$autor')";

    if ($connection->query($sql) === TRUE) {
        $id_beitrag = $connection->insert_id;
        if (isset($_FILES['images'])) {
        $total = count($_FILES['images']['name']);

        for ($i = 0; $i < $total; $i++) {
            $tmpFilePath = $_FILES['images']['tmp_name'][$i];
            if ($tmpFilePath != "") {
                // Setup your new file path
                $actual_bild = "./Media/" . $_FILES['images']['name'][$i];
                $sql = "INSERT INTO Bilder (id_beitrag, bild) 
                VALUES ('$id_beitrag','$actual_bild')";
                if ($connection->query($sql) === TRUE ) {
                $newFilePath = "./Media/" . $_FILES['images']['name'][$i];
                }
                // Move the file to your server
                if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                    //echo "Uploaded: " . $_FILES['images']['name'][$i] . "<br>";
                } else {
                    //echo "Error uploading: " . $_FILES['images']['name'][$i] . "<br>";
                }
            }
        }
    }
         
        //echo "New record created successfully";
    } else {
        //echo "Error: " . $sql . "<br>" . $connection->error;
    }
    }
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>