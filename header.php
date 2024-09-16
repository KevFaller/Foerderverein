<?php

    $sql = "SELECT id,title,text,bild,autor,created FROM Beitrag Order by created DESC LIMIT 1";
    $result = mysqli_query($connection, $sql);

    // Fetch the row
    $row = mysqli_fetch_assoc($result);
    
    // Access column values from the fetched row
    $id_post = $row["id"];
    $title = $row["title"];
    $text = $row["text"];
    $text = substr($text, 0, 200);
    $bild = $row["bild"];
    $autor = $row["autor"];
    $created = $row["created"];
    
echo '
<div class="relative isolate pt-14">
    <svg class="absolute inset-0 -z-10 h-full w-full stroke-gray-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
      <defs>
        <pattern id="83fd4e5a-9d52-42fc-97b6-718e5d7ee527" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
          <path d="M100 200V.5M.5 .5H200" fill="none" />
        </pattern>
      </defs>
      <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
        <path d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z" stroke-width="0" />
      </svg>
      <rect width="100%" height="100%" stroke-width="0" fill="url(#83fd4e5a-9d52-42fc-97b6-718e5d7ee527)" />
    </svg>
    <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:flex lg:items-center lg:gap-x-10 lg:px-8 lg:py-40">
      <div class="mx-auto max-w-2xl lg:mx-0 lg:flex-auto">
        <div class="flex">
        </div>
        <h1 class="mt-10 max-w-lg text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl"> '.$title.' </h1>
        <p class="mt-6 text-lg leading-8 text-gray-600">'.$text.' ...</p>
        <div class="mt-10 flex items-center gap-x-6">
          <a href="./content.php?id='.$id_post.'" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Weiter lesen</a>
        </div>
      </div>
      <div class="mt-16 sm:mt-24 lg:mt-0 lg:flex-shrink-0 lg:flex-grow max-w-xl">
            <img src="'.$bild.'" alt="Photo" />
          
      </div>
    </div>
  </div>'
  ?>