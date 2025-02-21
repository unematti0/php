<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>h03</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<?php
// h03
// Mattias Elmers
// 19.02.2025
?>

<h2>Trapetsi pindala</h2>
<form method="get">
    alus 1 <input type="number" name="a"><br>
    alus 2 <input type="number" name="b"><br>
    kõrgus <input type="number" name="c"><br>
    <input type="submit" value="arvuta" class="btn btn-primary"><br>
</form>

<?php
if (isset($_GET["a"]) && isset($_GET["b"]) && isset($_GET["c"])) {
    $a = (int)$_GET["a"];
    $b = (int)$_GET["b"];
    $c = (int)$_GET["c"];
    printf("Pindala on %.1f <br>", ($a + $b) / 2 * $c); 

}
?>

<h2>Rombi ümbermõõt</h2>
<form method="get">
    külg 1 <input type="number" name="a"><br>
    <input type="submit" value="arvuta" class="btn btn-primary"><br>
</form>

<?php
if (isset($_GET["a"])) {
    $a = (int)$_GET["a"];
    printf("Ümbermõõt on %d <br>", 4 * $a);
}
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>