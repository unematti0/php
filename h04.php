<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>h04</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<?php
// h04
// Mattias Elmers
// 19.02.2025

?>

<h2>jagamine</h2>
<form method="get">
    nr1 <input type="number" name="nr1"><br>
    nr2 <input type="number" name="nr2"><br>
    <input type="submit" value="arvuta" class="btn btn-primary"><br>
</form>

<?php
if (isset($_GET["nr1"]) && isset($_GET["nr2"])) {
    $nr1 = $_GET["nr1"];
    $nr2 = $_GET["nr2"];
    if (empty($nr1) && empty($nr2)) {
        echo "Palun sisestage mõlemad arvud<br>";
    } elseif (empty($nr1)) {
        echo "Nulliga ei saa jagada<br>";
    } elseif (empty($nr2)) {
        echo "Nulliga ei saa jagada<br>";
    } else {
        printf("%d / %d = %.2f <br>", $nr1, $nr2, $nr1/$nr2);
    }
}
?>

<h2>Kumb on vanem</h2>
<form method="get">
    kasutaja 1 vanus: <input type="number" name="kasutaja1"><br>
    kasutaja 2 vanus: <input type="number" name="kasutaja2"><br>
    <input type="submit" value="arvuta" class="btn btn-primary"><br>
</form>

<?php
if (isset($_GET["kasutaja1"]) && isset($_GET["kasutaja2"])) {
    $k1 = $_GET["kasutaja1"];
    $k2 = $_GET["kasutaja2"];
    if (empty($k1) && empty($k2)) {
        echo "Palun sisestage mõlemad arvud<br>";
    } elseif (empty($k1)) {
        echo "sisesta esimene arv<br>";
    } elseif (empty($k2)) {
        echo "sisesta teine arv<br>";
    } elseif ($k1 > $k2) {
        echo "kasutaja 1 on vanem<br>";
    } elseif ($k1 < $k2) {
        echo "kasutaja 2 on vanem<br>";
    } else {
        echo "kasutajad on sama vanad<br>";
    }
}
?>

<h2>ristkülik või ruut</h2>
<form method="get">
    külg1: <input type="number" name="kulg1"><br>
    külg2: <input type="number" name="kulg2"><br>
    külg3: <input type="number" name="kulg3"><br>
    külg4: <input type="number" name="kulg4"><br>
    <input type="submit" value="arvuta" class="btn btn-primary"><br>
</form>

<?php
if (isset($_GET["kulg1"]) && isset($_GET["kulg2"]) && isset($_GET["kulg3"]) && isset($_GET["kulg4"])) {
    $k1 = $_GET["kulg1"];
    $k2 = $_GET["kulg2"];
    $k3 = $_GET["kulg3"];
    $k4 = $_GET["kulg4"];
    if (empty($k1) && empty($k2) && empty($k3) && empty($k4)) {
        echo "Palun sisestage kõik küljed<br>";
    } elseif ($k1 == $k2 && $k2 == $k3 && $k3 == $k4) {
        echo "ruut<br>";
    } else {
        echo "ristkülik<br>";
    }

}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>