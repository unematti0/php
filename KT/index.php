<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="UTF-8">
  <title>Minu Bootstrapi Leht</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style01.css">
</head>
<body>

<?php
// lubatud lehed ja leht parameeter
$lubatud_lehed = array('index', 'minust', 'kontakt', 'admin');
$leht = isset($_GET['leht']) ? htmlspecialchars($_GET['leht']) : 'index';
  if (!in_array($leht, $lubatud_lehed)) {
    $leht = 'index';
}

// suvlaine pilt
$taustad = array("img/banner1.jpg", "img/banner2.jpg", "img/banner3.jpg");
$taust = $taustad[array_rand($taustad)];
?>

<!-- jubotron -->
<?php if ($leht !== 'admin'): ?>
<div class="jumbotron" style="background-image: url('<?php echo $taust; ?>');">
  <nav class="navbar navbar-expand-lg navbar-dark">
    
  <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Mattias Elmers</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link text-white" href="index.php?leht=index">Avaleht</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="index.php?leht=minust">Minust</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="index.php?leht=kontakt">Kontakt</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="index.php?leht=admin">Admin</a></li>
        </ul>
      </div>

    </div>
  </nav>

    <div class="container text-center">
      <h1 class="display-4">Praktika Hispaanias</h1>
      <p class="lead">Minu väispraktika HKHKs</p>
    </div>

</div>
<?php endif; ?>


<div class="container mt-4">
<?php
// postituste kuvamine
if ($leht == 'index') {
  if (is_dir("posts")) {
      $fail = glob("posts/*.txt");

    if (!empty($fail)) {
      foreach ($fail as $file) {
        $pealkiri = basename($file, ".txt");
          $sisu = file_get_contents($file);
          echo "<div class='post'>";
          echo "<h2>" . htmlspecialchars($pealkiri) . "</h2>";
          echo "<p>" . nl2br(htmlspecialchars($sisu)) . "</p>";
        // kas pilt on olemas
        foreach (array('jpg', 'jpeg', 'png', 'gif') as $laiend) {
            $pildifail = "posts/{$pealkiri}.$laiend";

          if (file_exists($pildifail)) {
              echo "<img src='$pildifail' alt='" . htmlspecialchars($pealkiri) . "' style='max-width:100%; height:auto;'>";
                break;
          }
        }
          echo "</div><hr>";
      }
    } else {
        echo "<p>Postitusi pole veel lisatud.</p>";
    }
  } else {
      echo "<p>Postitusi pole veel lisatud.</p>";
  }
} else {
    include($leht . ".php");
}
?>
</div>

<footer class="text-center mt-4">
 Mattias Elmers
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
