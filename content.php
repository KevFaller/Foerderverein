<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./Media/Foerderverein_logo.ico">
    <meta name="description" content="Beitraege">
    <meta name="keywords" content="Foerderverein, kuchenverkauf, flohmarkt2024">
    <meta name="author" content="Kevin Faller">
    <title>Beitrag</title>
</head>
<body>
    <?php
    include("db.php");
    include("navigation.php");
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM Beitrag WHERE id=$id";
        $result = mysqli_query($connection, $sql);
        $row= mysqli_fetch_assoc($result);
        $title = $row["title"];
        $text = $row["text"];
        $bild = $row["bild"];
        $autor = $row["autor"];
        $created = $row["created"];
        
        $defaultAuthorImage = "./Media/Foerderverein_logo.ico";
// Autorennamen aufteilen
    $autorParts = explode(' ', $autor);

    $vorname = $autorParts[0];

    // Bildpfad auf Basis des Vornamens erstellen
    $authorImagePath = "./Media/" . $vorname . ".jpg";

    // Prüfen, ob die Datei existiert, andernfalls Standardbild verwenden
    if (!file_exists($authorImagePath)) {
        $authorImagePath = $defaultAuthorImage;
    }
        // var_dump($authorImagePath);die();
        // print_r(mysqli_fetch_assoc($result)["text"]);
    };

    echo '
<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
  <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
      <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
          <header class="mb-4 lg:mb-6 not-format">
              <address class="flex items-center mb-6 not-italic">
                  <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                      <img class="mr-4 w-16 h-16 rounded-full" src="' . $authorImagePath . '" alt="./Media/logo.jpg">
                      <div>
                          <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">'.$autor.'</a>
                          <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">'.$created.'</time></p>
                      </div>
                  </div>
              </address>
              <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">'.$title.'</h1>
          </header>
          <figure><img src="'.$bild.'" alt="">
          </figure>
          <br>
          <p class="lead dark:text-white">'.$text.'</p>
      </article>
  </div>
</main>';
?>
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM Bilder WHERE id_beitrag = $id";
    $result = mysqli_query($connection, $sql);
    if ($result) {

    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 1) {
        echo '<h1 class="text-xl text-center pb-3 font-extrabold">Mehrere Bilder<h1>
     
        <div class="flex justify-center pb-5">
        
        <div id="default-carousel" class="relative w-full max-w-2xl" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">';
    }
    }
    ?>
         <!-- Item 1 -->
        <?php
        if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM Bilder WHERE id_beitrag = $id";
        
        $result = mysqli_query($connection, $sql);

        $num_rows = mysqli_num_rows($result);
        if($num_rows > 1){
        while($row = mysqli_fetch_assoc($result)) {
        if($row["id_beitrag"] = $_GET['id']) {
        $bild = $row["bild"];
    
        
        echo '<div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="'.$bild.'" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Beitrag Bild">
        </div>';
        }
    }   
}
}
        ?>
    </div>

    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
</div>
<aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800">
  <div class="px-4 mx-auto max-w-screen-xl">
      <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Empfohlene Artikel</h2>
      <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
        <?php
         $sql = "SELECT id,title,text,bild,autor,created FROM Beitrag";
        $result = mysqli_query($connection, $sql);
        $count=0;
        while($row = mysqli_fetch_assoc($result)) {
        if($firstId != $id && $count!=4) {
        $count++;
        $id = $row["id"];
        $title = $row["title"];
        $text = substr($row["text"],0,100);
        $bild = $row["bild"];
        $autor = $row["autor"];
        $created = $row["created"];
        echo '
          <article class="max-w-xs">
              <a href="#">
                  <img src="'.$bild.'" class="mb-5 rounded-lg" alt="Image 1">
              </a>
              <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                  <a href="./content.php?id='.$id.'">'.$title.'</a>
              </h2>
              <p class="mb-4 text-gray-500 dark:text-gray-400">'.$text.'...</p>
          </article>
          ';
          };
        };
          ?>
          
      </div>
  </div>
</aside>
<?php
    include("footer.php");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>