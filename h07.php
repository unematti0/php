<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>funktsioonid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <?php

// h07
// Mattias Elmers
// 03.03.2025
echo "<h2>Tervitus</h2>";
function tervita(){
    echo "Tere päiksekesekene!";	
}
echo tervita();

echo "<h2>Liitu uudiskirjaga</h2>";

function vorm(){
    echo '<form method="get">';
    echo 'vormi küsimus: <input type="text" name="vastus" class="form-control"><br>';
    echo '<input type="submit" value="vastus" class="btn btn-primary"><br>';
    echo '</form>';
}

vorm();

echo "<h2>kasutajanimi ja email</h2>";


?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

