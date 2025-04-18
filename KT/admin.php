<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="UTF-8">
  <title>Admin – Postitused</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

<a href="index.php" class="btn btn-secondary mb-4"><--- Avalehele tagasi</a>

<h2>Lisa uus postitus</h2>
<form method="post" enctype="multipart/form-data" class="mb-5">
    <div class="mb-3">
        <label class="form-label">Pealkiri:</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Sisu:</label>
        <textarea name="content" rows="5" class="form-control" required></textarea>
    </div>

<div class="mb-3">
        <label class="form-label">Pilt (valikuline):</label>
        <input type="file" name="image" accept="image/*" class="form-control">
  </div>

  <button type="submit" name="add" class="btn btn-primary">Lisa postitus</button>
</form>

<?php
// kausta kontroll
if (!is_dir("posts")) {
    mkdir("posts");
}
$faili_laiendid = array('jpg', 'jpeg', 'png', 'gif');

// postituse lisamine
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add"])) {
    
  $pealkiri = trim($_POST["title"]);
    $sisu = trim($_POST["content"]);

  // faili nimi läbi pealkirja
  $nimi_failile = preg_replace('/[^a-zA-Z0-9-_]/', '_', strtolower($pealkiri));
  
  file_put_contents("posts/{$nimi_failile}.txt", $sisu);
  
  // kui latakse pilt on see samaa
  if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
      
    $laiend = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["image"]["tmp_name"], "posts/{$nimi_failile}.$laiend");
  }
  echo "<div class='alert alert-success'>Uus postitus lisatud!</div>";
}

// kustutamise algus
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete"])) {
    $kustuta = $_POST["delete"];
    $teksti_fail = "posts/{$kustuta}.txt";
      
    if (file_exists($teksti_fail)) {
        unlink($teksti_fail);
  }
  // pildi ksutus
  foreach ($faili_laiendid as $laiend) {
      $pilt = "posts/{$kustuta}.$laiend";
        if (file_exists($pilt)) {
          unlink($pilt);
    }
  }
  echo "<div class='alert alert-danger'>Postitus kustutatud!</div>";
}
// kustutuse lõpp

// olemasolevad postitused nuppuga
$posts = glob("posts/*.txt");
if (!empty($posts)) {
echo "<h2>Olemasolevad postitused</h2>";
echo "<ul class='list-group'>";

    foreach ($posts as $post) {
      $pealkiri = basename($post, ".txt");
      echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
      echo htmlspecialchars($pealkiri);
      echo "<form method='post' style='margin: 0;'>";
      echo "<input type='hidden' name='delete' value='" . htmlspecialchars($pealkiri) . "'>";
      echo "<button type='submit' class='btn btn-danger btn-sm'>Kustuta</button>";
      echo "</form>";
      echo "</li>";
  }
echo "</ul>";
} else {
      echo "<p>Postitusi pole veel lisatud.</p>";
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
