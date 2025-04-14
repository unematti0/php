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
// === Configuration ===
// Allowed pages and navigation labels in one spot
$allowedPages = ['index', 'minust', 'kontakt', 'admin'];
$navItems = [
  'index'   => 'Avaleht',
  'minust'  => 'Minust',
  'kontakt' => 'Kontakt',
  'admin'   => 'Admin'
];

// Get the requested page or default to 'index'
$page = isset($_GET['leht']) ? htmlspecialchars($_GET['leht']) : 'index';
if (!in_array($page, $allowedPages)) {
  $page = 'index';
}

// Select a random banner image
$banners = ["img/banner1.jpg", "img/banner2.jpg", "img/banner3.jpg"];
$banner = $banners[array_rand($banners)];
?>

<!-- Jumbotron Section with Navigation -->
<div class="jumbotron" style="background-image: url('<?php echo $banner; ?>');">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Mattias Elmers</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <?php foreach ($navItems as $key => $label): ?>
            <li class="nav-item">
              <a class="text-white nav-link" href="index.php?leht=<?php echo $key; ?>">
                <?php echo $label; ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container text-center">
    <h1 class="display-4">Praktika Hispaanias</h1>
    <p class="lead">Minu väispraktika HKHKs</p>
  </div>
</div>

<!-- Main Content -->
<div class="container mt-4">
  <?php if ($page === 'index'): ?>
    <?php if (is_dir("posts")): ?>
      <?php foreach (glob("posts/*.txt") as $file):
              $title = basename($file, ".txt");
              $content = file_get_contents($file);
      ?>
        <div class="post">
          <h2><?php echo htmlspecialchars($title); ?></h2>
          <p><?php echo nl2br(htmlspecialchars($content)); ?></p>
          <?php 
          // Check for an associated image with common extensions
          foreach (['jpg', 'jpeg', 'png', 'gif'] as $ext) {
            $imageFile = "posts/{$title}.$ext";
            if (file_exists($imageFile)) {
              echo "<img src='$imageFile' alt='" . htmlspecialchars($title) . "' style='max-width:100%; height:auto;'>";
              break;
            }
          }
          ?>
        </div>
        <hr>
      <?php endforeach; ?>
    <?php else: ?>
      <p>Postitusi pole veel lisatud.</p>
    <?php endif; ?>
  <?php else: ?>
    <?php include($page . ".php"); ?>
  <?php endif; ?>
</div>

<footer>
  &copy; Mattias Elmers
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>