<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajafunktsioonid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<?php
// h08
// Mattias Elmers
// 06.03.2025

echo "Kuupäev:<br>";
echo date('d.m.Y G:i', time());
echo "<br>";
?>
<form method="get">
    <h2>sinu vanus</h2>
    <p>sisesta enda sünni aasta:</p>
    <input type="number" name="aasta" class="form-control"><br>
    <input type="submit" value="arvuta kui vana oled" class="btn btn-primary"><br>
</form>

<?php
if (isset($_GET["aasta"])) {
    $aasta = $_GET["aasta"];
    $vanus = date('Y') - $aasta;
    echo "Oled " . $vanus . " aastat vana<br>";
}

$tana = strtotime(date('Y-m-d'));
$Kool_lopp = strtotime("2025-06-10");
$paevad = ($Kool_lopp - $tana) / (60 * 60 * 24);

echo "Kooli aasta lõpuni on jäänud " . floor($paevad) . " päeva!";

echo "<h2>aastaaeg</h2>";
$kuu = date('n');
if ($kuu >= 3 && $kuu <= 5) {
    echo '<img src="img/kevad.png" alt="icon" />';
} elseif ($kuu >= 6 && $kuu <= 8) {
    echo '<img src="img/suvi.png" alt="icon" />';
} elseif ($kuu >= 9 && $kuu <= 11) {
    echo '<img src="img/sügis.png" alt="icon" />';
} else {
    echo '<img src="img/talv.png" alt="icon" />';
}
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


