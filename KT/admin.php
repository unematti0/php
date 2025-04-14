<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="UTF-8">
  <title>Admin - Lisa postitus</title>
  <!-- Bootstrap CSS (optional for basic styling) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<a href="index.php"><-- Avalehele tagasi</a>

<h2>Lisa uus postitus</h2>

<form method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label>Pealkiri:</label>
    <input type="text" name="title" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Sisu:</label>
    <textarea name="content" rows="5" class="form-control" required></textarea>
  </div>
  <div class="mb-3">
    <label>Pilt (valikuline):</label>
    <input type="file" name="image" accept="image/*" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Lisa postitus</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Clean input
  $title = trim($_POST["title"]);
  $content = trim($_POST["content"]);
  // Make a safe filename
  $safeTitle = preg_replace('/[^a-z0-9-_]/i', '_', strtolower($title));
  if (!is_dir("posts")) mkdir("posts");

  // Save the post as a text file
  file_put_contents("posts/{$safeTitle}.txt", $content);

  // Handle image if uploaded
  if (!empty($_FILES["image"]["tmp_name"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
    $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["image"]["tmp_name"], "posts/{$safeTitle}.$ext");
  }
  echo "<p>Uus postitus lisatud!</p>";
}
?>

<!-- Optionally include Bootstrap JS for form components -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
