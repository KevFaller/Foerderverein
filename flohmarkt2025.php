
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./Media/Foerderverein_logo.ico">
    <meta name="description" content="Registrieren Sie sich für unseren Flohmarkt 2024">
    <meta name="keywords" content="Foerderverein,flohmarkt2025">
    <meta name="author" content="Kevin Faller">
    <title>Flohmarkt 2024</title>
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
        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Flohmarkt 2025</h2>
        <p class="mt-2 text-lg leading-8 text-gray-600">Hier können Sie sich für den Flohmarkt 2025 registrieren!</p>
        <p class="mt-2 text-lg leading-8 text-gray-600">Genauer Termin wird noch bekanntgegeben</p>
        <form action="flohmarkt2025.php" method="POST" class="mt-16">
          <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div>
              <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">Vorname</label>
              <div class="mt-2.5">
                <input type="text" name="vorname" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
            <div>
              <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Nachname</label>
              <div class="mt-2.5">
                <input type="text" name="nachname" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
            <div class="sm:col-span-2">
              <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
              <div class="mt-2.5">
                <input id="email" name="mail" type="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
            <div class="sm:col-span-2">
              <label for="handy" class="block text-sm font-semibold leading-6 text-gray-900">Handy</label>
              <div class="mt-2.5">
                <input type="text" name="handy" id="phone" autocomplete="organization" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
            <div class="sm:col-span-2">
              <label for="adresse" class="block text-sm font-semibold leading-6 text-gray-900">Adresse</label>
              <div class="mt-2.5">
                <input type="text" name="company" id="adress" autocomplete="organization" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
            <div class="sm:col-span-2">
              <div class="mt-2.5">
              <label for="tische" class="block text-sm font-semibold leading-6 text-gray-900">Anzahl Tische</label>
                <select onchange="setTables()" name="tische" id="tables" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="cake" class="block text-sm font-semibold leading-6 text-gray-900">Kuchen</label>
                <select onchange="setCake()" name="cake" id="cake" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="0">0</option>
                </select>
            </div>
            <div class="flex">
            <h1 class="text-lg">Insgesamt: </h1>&nbsp <p class="text-lg" id="price">8</p><span class="text-lg">€</span>
            <input type="hidden" id="total" name="price" value="0">
            </div><br>
            <div class="flex border-gray-900/10 pt-8">
            <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Reservierung absenden</button>
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
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $email = $_POST["mail"];
    $handy = $_POST["handy"];
    $adresse = $_POST["company"];
    $tische = $_POST["tische"];
    $kuchen = $_POST["cake"];
    $price = (int)$_POST["price"];
    $sql = "INSERT INTO Flohmarkt2025 (vorname, nachname, mail, handy, adresse, tische, kuchen, price) 
        VALUES ('$vorname', '$nachname', '$email', '$handy', '$adresse', '$tische', '$kuchen', '$price')";

    if ($connection->query($sql) === TRUE) {
          echo '

        <!-- Modal toggle -->
        <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
          Toggle modal
        </button>

        <!-- Main modal -->
        <div id="default-modal" tabindex="-1" aria-hidden="true" aria-modal="true" role="dialog" class="bg-gray-800 bg-opacity-50 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full flex">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Vielen Dank für die Registrierung
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <p class="text-lg leading-relaxed text-black dark:text-gray-400">
                            Folgende Daten wurden gespeichert:
                        </p>
                        <p class="text-lg leading-relaxed text-black dark:text-gray-400">
                        Name: '.$vorname.' '.$nachname.'<br>E-Mail: '.$email.'<br>Handy: '.$handy.'<br>Adresse: '.$adresse.'<br>Anzahl Tische: '.$tische.'<br>Kuchen: '.$kuchen.'
                        </p>
                    </div>
                </div>
            </div>
        </div>
        ';
        //echo "New record created successfully";
    } else {
        //echo "Error: " . $sql . "<br>" . $connection->error;
    }
    }
?>
<script src="./JS/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>