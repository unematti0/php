<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tekstifunktsioonid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>



  <form method="get">
    Tervituse nimi: <input type="text" name="nimi"><br>
    <input type="submit" value="tervita" class="btn btn-primary"><br>
  </form>
<?php
// h09
// Mattias Elmers
// 28.03.2025


if (isset($_GET['nimi'])){
echo "Tere, ".ucfirst(strtolower($_GET['nimi']));
}
?>
<form method="get">
    punktidega sõna: <input type="text" name="tekst"><br>
    <input type="submit" value="punktitan" class="btn btn-primary"><br>
  </form>
<?php
if (isset($_GET['tekst'])){
for ($i = 0; $i < strlen($_GET['tekst']); $i++){
    echo $_GET['tekst'][$i].".";
}
}
?>

<form method="get">
    ropus: <input type="text" name="ropp"><br>
    <input type="submit" value="asenda" class="btn btn-primary"><br>
</form>
<?php
if (isset($_GET['ropp'])) {
    $ropp = $_GET['ropp'];
    $asendatav = array('puts', 'lits', 'taun', 'ropp');
    $asendus = str_replace($asendatav, '****', $ropp);
    echo $asendus;
}
?>

<form method="get">
    nimi: <input type="text" name="nimi"><br>
    peremimi: <input type="text" name="perenimi"><br>
    <input type="submit" value="genereeri email" class="btn btn-primary"><br>
</form>
<?php
if (isset($_GET['nimi']) && isset($_GET['perenimi'])) {
    $imeliktaht = array('ä', 'ö', 'ü', 'õ', 'š', 'ž');
    $asendus2 = array('a', 'o', 'u', 'o', 's', 'z');
    $nimi = str_replace($imeliktaht, $asendus2, $_GET['nimi']);
    $perenimi = str_replace($imeliktaht, $asendus2, $_GET['perenimi']);
    echo $nimi . "." . $perenimi . "@hkhk.edu.ee";
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
