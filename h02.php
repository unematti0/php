<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>h02</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<?php
// h02
// Mattias Elmers
// 14.02.2025
$x = 2;
$y = 3;

printf("%d + %d = %d <br>", $x, $y, $x+$y);
printf("%d - %d = %d <br>", $x, $y, $x-$y);
printf("%d * %d = %d <br>", $x, $y, $x*$y);
printf("%d / %d = %.2f <br>", $x, $y, $x/$y);

?>
<h2>teisendamine</h2>

<form method="get">
    <input type="number" name="nr"><br>
    <input type="submit" value="arvuta" class="btn btn-primary"><br>
</form>

<?php
if (isset($_GET["nr"])) {
    $nr = $_GET["nr"];
    printf("%d mm on %0.2f cm<br>", $nr, $nr/10);
    printf("%d mm on %0.2f m<br>", $nr, $nr/1000);
    echo $nr;
}
?>

<h2>kolmnurk</h2>
<form method="get">
    külg 1 <input type="number" name="a"><br>
    külg 2 <input type="number" name="b"><br>
    külg 3 <input type="number" name="c"><br>
    <input type="submit" value="arvuta" class="btn btn-primary"><br>
</form>

<?php
if (isset($_GET["a"]) && isset($_GET["b"]) && isset($_GET["c"])) {
    $a = (int)$_GET["a"];
    $b = (int)$_GET["b"];
    $c = (int)$_GET["c"];
    if ($a + $b > $c && $a + $c > $b && $b + $c > $a) {
        echo "kolmnurk on võimalik<br>";
        printf("kolmnurga ümbermõõt on %d <br>", $a + $b + $c);
        $s = ($a + $b + $c) / 2;
        $pindala = sqrt($s * ($s - $a) * ($s - $b) * ($s - $c));
        printf("kolmnurga pindala on %d <br>", round($pindala));
    }
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>