<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tsyklid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<?php
// h06
// Mattias Elmers
// 14.02.2025
echo "<h2>genereeri</h2>";
for($i = 1; $i <= 100; $i++){
  echo $i . ".";
  if ($i % 10 == 0) {
    echo "<br>";
  }
}

echo "<h2>Rida</h2>";

for($i = 1; $i <= 10; $i++){
  echo "*";
}

echo "<h2>Rida||</h2>";
for($i = 1; $i <= 10; $i++){
    echo "*<br>";
}
?>
<h2>ruut</h2>
<form method="get">
    külg <input type="number" name="nr1"><br>
    <input type="submit" value="ruut" class="btn btn-primary"><br>
</form>

<?php
if (isset($_GET["nr1"])) {
    $nr1 = $_GET["nr1"];
    for($i = 1; $i <= $nr1; $i++){
        for($j = 1; $j <= $nr1; $j++){
            echo "* ";
        }
        echo "<br>";
    }
}

echo "<h2>kahanevad arvud</h2>";

for($i = 10; $i >= 1; $i--){
    echo $i . "<br>";
}

echo "<h2>kolmega jagunevad</h2>";
for($i = 1; $i <= 100; $i++){
    if ($i % 3 == 0) {
        echo $i . "<br>";
    }
}

echo "<h2>Massiivid ja tsyklid</h2>";
$tydrukud = array('mari', 'kati', 'miku', 'miiu');
$poisid = array('juhan', 'jaanus','johannes' ,'matu');

echo "<h2>poiste tüdrukute paarid:</h2>";
for($kogus=0; $kogus<count($tydrukud); $kogus++){
    echo $tydrukud[$kogus].' - '.$poisid[$kogus].'<br>';
}



?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>