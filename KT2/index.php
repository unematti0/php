<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Praktika Maltal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>

  <!-- Läbipaistev navbar valge tekstiga -->
  <nav class="navbar navbar-expand-lg navbar-dark position-absolute top-0 start-0 end-0 bg-transparent">
    <div class="container">
      <a class="navbar-brand text-white" href="#">SinuNimi</a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link text-white" href="#">Avaleht</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#">Minust</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#">Kontakt</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="#">Admin</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Jumbotron -->
  <div class="d-flex align-items-center justify-content-center text-white text-center" style="height: 400px; background-image: url('img/banner1.jpg'); background-size: cover; background-position: center;">
    <div>
      <h1 class="display-4 fw-bold">Praktika Maltal</h1>
      <p class="lead">Minu välispraktika IKKIKis</p>
    </div>
  </div>

  <!-- Postitused -->
  <main class="container my-5">
    <div class="border-bottom py-3">
      <h5 class="fw-bold">Uurimistöö kõrgeim vorm</h5>
      <p class="text-muted">Inimene peab uurima, sest see on avastamise kõrgeim vorm. Probleeme nähvad 150 miili kõrguselt pisikesed.</p>
    </div>
    <div class="border-bottom py-3">
      <h5 class="fw-bold">Igaühele on antud piiratud arv südamelööke</h5>
      <p class="text-muted">Mina ei plaani ühtegi neist raisata.</p>
    </div>
    <div class="border-bottom py-3">
      <h5 class="fw-bold">Teadus pole veel selgeltnägemist valdanud</h5>
      <p class="text-muted">Me ennustame liiga palju järgmiseks aastaks, ent kaugelt liiga vähe järgmiseks kümneks.</p>
    </div>
    <div class="py-3">
      <h5 class="fw-bold">Ebaõnnestumine pole variant</h5>
      <p class="text-muted">Paljud ütlevad, et uurimine on meie saatus, kuid tegelikult on see meie kohustus tulevaste põlvkondade ees.</p>
    </div>
  </main>

  <!-- Jalus koos eraldusjoonega -->
  <footer class="text-center pt-4 mt-5 border-top">
    <p class="mb-4">&copy; SinuNimi</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>