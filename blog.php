<div class="bg-white py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl text-center">
      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Weitere Artikel</h2>
      <p class="mt-2 text-lg leading-8 text-gray-600">vom Förderverein Kita Löwenbergpark.</p>
    </div>
    <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
    <?php
    // Hier wird der Pfad zum Standardbild gesetzt
    $defaultAuthorImage = "./Media/Foerderverein_logo.ico";

    // SQL-Abfrage, um alle Beiträge abzurufen
    $sql = "SELECT id, title, text, bild, autor, created FROM Beitrag";
    $result = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $id_post = $row["id"];
        $title = $row["title"];
        $text = substr($row["text"], 0, 100);
        $bild = $row["bild"];
        $autor = $row["autor"];
        $created = $row["created"];

        // Autorennamen aufteilen
        $autorParts = explode(' ', $autor);
        $vorname = $autorParts[0];

        // Bildpfad auf Basis des Vornamens erstellen
        $authorImagePath = "./Media/" . $vorname . ".jpg";

        // Prüfen, ob die Datei existiert, andernfalls Standardbild verwenden
        if (!file_exists($authorImagePath)) {
            $authorImagePath = $defaultAuthorImage;
        }

        echo '
          <article class="flex flex-col items-start justify-between">
            <div class="relative w-full">
              <img src="' . $bild . '" alt="photo" class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
              <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
            </div>
            <div class="max-w-xl">
              <div class="mt-8 flex items-center gap-x-4 text-xs">
                <time datetime="' . $created . '" class="text-gray-500">' . $created . '</time>
              </div>
              <div class="group relative">
                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                  <a href="./content.php?id=' . $id_post . '">
                    <span class="absolute inset-0"></span>
                    ' . $title . '
                  </a>
                </h3>
                <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">' . $text . '</p>
              </div>
              <div class="relative mt-8 flex items-center gap-x-4">
                <img src="' . $authorImagePath . '" alt="./Media/logo.jpg" class="h-10 w-10 rounded-full bg-gray-100">
                <div class="text-sm leading-6">
                  <p class="font-semibold text-gray-900">
                    <a href="#">
                      <span class="absolute inset-0"></span>
                      ' . $autor . '
                    </a>
                  </p>
                </div>
              </div>
            </div>
          </article>';
    }
    ?>
      <!-- More posts... -->
    </div>
  </div>
</div>
