<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>esimene php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      /* Jumbotron stiil */
      .jumbotron {
          position: relative;
          background: no-repeat center center;
          background-size: cover;
          color: #fff;
          height: 400px;
          display: flex;
          flex-direction: column;
          justify-content: center;
      }
      .jumbotron::after {
          content: "";
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(0,0,0,0.5);
          z-index: 1;
      }
      /* Veendu, et jumbotroni sees olev sisu oleks ülekatte kohal */
      .jumbotron > * {
          position: relative;
          z-index: 2;
      }
      /* Läbipaistev navbar ja positsioneerimine ülaossa */
      .navbar {
          background: transparent !important;
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          z-index: 3;
      }
      /* Footer stiil */
      footer {
          margin-top: 2rem;
          padding: 1rem 0;
      }
      footer hr {
          margin-bottom: 1rem;
      }
    </style>
  </head>
  <body>
    <?php
    // index.php

    // Bänneripiltide massiiv
    $bannerImages = [
        "img/banner1.jpg",
        "img/banner2.jpg",
        "img/banner3.jpg"
        // lisa soovi korral
    ];

    // Valime suvalise pildi massiivist
    $randomBanner = $bannerImages[array_rand($bannerImages)];

    // Loeme posts.txt failist postitused massiivi
    $posts = [];
    if (file_exists("posts.txt")) {
        $fileData = file("posts.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($fileData as $line) {
            // Eeldame, et failis on vorming "Pealkiri|Sisu"
            $parts = explode("|", $line);
            if (count($parts) == 2) {
                $posts[] = [
                    "title" => trim($parts[0]),
                    "content" => trim($parts[1])
                ];
            }
        }
    }

    // Määrame, milline leht kuvatakse
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    ?>

    <!-- Jumbotron koos navbariga ülaosas -->
    <div class="jumbotron" style="background-image: url('<?php echo $randomBanner; ?>');">
      <!-- Läbipaistev navbar positsioneeritud ülaossa -->
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Mattias Elmers</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                  data-bs-target="#navbarNav" aria-controls="navbarNav" 
                  aria-expanded="false" aria-label="Menüü avamine">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="text-white nav-link" href="index.php?page=home">Avaleht</a>
              </li>
              <li class="nav-item">
                <a class="text-white nav-link" href="index.php?page=news">minust</a>
              </li>
              <li class="nav-item">
                <a class="text-white nav-link" href="index.php?page=contact">Kontakt</a>
              </li>
              <li class="nav-item">
                <a class="text-white nav-link" href="admin.php">Admin</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Jumbotroni keskne sisu -->
      <div class="container text-center">
        <h1 class="display-4">Praktika Maltal</h1>
        <p class="lead">Minu väispraktika HKHKs</p>
      </div>
    </div>

    <!-- Pealehe sisu -->
    <div class="container mt-4">
        <?php
        switch ($page) {
            case 'home':
                echo '<h1 class="mb-4">Avaleht</h1>';
                if (!empty($posts)) {
                    foreach ($posts as $post) {
                        echo '<div class="mb-3">';
                        echo '<h3>' . htmlspecialchars($post['title']) . '</h3>';
                        echo '<p>' . nl2br(htmlspecialchars($post['content'])) . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>Ühtegi postitust ei leitud.</p>';
                }
                break;
            case 'news':
                echo '<h1>Uudised</h1>';
                echo '<p>Siia pane uudiste sisu.</p>';
                break;
            case 'contact':
                echo '<h1>Kontakt</h1>';
                echo '<p>Siia pane oma kontaktandmed.</p>';
                break;
            default:
                echo '<h1>Viga</h1>';
                echo '<p>Sellist lehte ei eksisteeri!</p>';
                break;
        }
        ?>
    </div>

    <!-- Footer -->
    <footer class="container text-center">
      <hr>
      <p>&copy; Mattias Elmers</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
