<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>esimene php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <?php
// admin.php

// Kui vorm on esitatud (uue postituse lisamiseks)
if (isset($_POST['new_title']) && isset($_POST['new_content'])) {
    $newTitle = trim($_POST['new_title']);
    $newContent = trim($_POST['new_content']);
    
    // Kontrollime, et väljad pole tühjad
    if ($newTitle !== "" && $newContent !== "") {
        // Lisame uue rea posts.txt faili
        $newLine = $newTitle . "|" . $newContent . "\n";
        file_put_contents("posts.txt", $newLine, FILE_APPEND);
        $message = "Uus postitus lisatud!";
    } else {
        $message = "Pealkiri või sisu puudub!";
    }
}

// Kui soovitakse kustutada postitust (GET meetod ?delete=indeks)
if (isset($_GET['delete'])) {
    $deleteIndex = (int) $_GET['delete'];
    
    if (file_exists("posts.txt")) {
        $fileData = file("posts.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        // Kui selline indeks on olemas, kustutame
        if (isset($fileData[$deleteIndex])) {
            unset($fileData[$deleteIndex]);
            // Salvestame faili uuesti
            file_put_contents("posts.txt", implode("\n", $fileData) . "\n");
            $message = "Postitus kustutatud!";
        } else {
            $message = "Vigane indeks – postitust ei leitud.";
        }
    }
}

// Loeme postitused uuesti, et neid admin-lehel kuvada
$posts = [];
if (file_exists("posts.txt")) {
    $fileData = file("posts.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($fileData as $line) {
        $parts = explode("|", $line);
        if (count($parts) == 2) {
            $posts[] = [
                "title" => trim($parts[0]),
                "content" => trim($parts[1])
            ];
        }
    }
}

?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Admin leht</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h1>Administraatori leht</h1>
    
    <!-- Tagasi avalehele -->
    <p><a href="index.php">← Avalehele</a></p>
    
    <?php
    // Kuvame teateid (kui on)
    if (!empty($message)) {
        echo '<div class="alert alert-info">' . htmlspecialchars($message) . '</div>';
    }
    ?>
    
    <!-- Vorm uue postituse lisamiseks -->
    <form method="post" class="mb-5">
        <div class="mb-3">
            <label for="new_title" class="form-label">Pealkiri</label>
            <input type="text" name="new_title" id="new_title" class="form-control">
        </div>
        <div class="mb-3">
            <label for="new_content" class="form-label">Sisu</label>
            <textarea name="new_content" id="new_content" rows="3" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Lisa postitus</button>
    </form>
    
    <!-- Olemasolevate postituste loetelu -->
    <h2>Olemasolevad postitused</h2>
    <?php if (!empty($posts)): ?>
        <ul class="list-group">
            <?php foreach ($posts as $index => $post): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong><?php echo htmlspecialchars($post['title']); ?></strong><br>
                        <small><?php echo nl2br(htmlspecialchars($post['content'])); ?></small>
                    </div>
                    <a href="?delete=<?php echo $index; ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Kas oled kindel, et soovid kustutada?')">
                       Kustuta
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Ühtegi postitust ei leitud.</p>
    <?php endif; ?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
