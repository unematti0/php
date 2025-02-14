<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<?php
// h01
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

 <input type="number" name="nr"><br>
    <input type="submit" value="arvuta" class="btn btn-primary"><br>

    <?php
    $nr = $_GET["nr"];
    printf("d mm on %0.2f cm", $nr, $nr/10);
    printf("d mm on %0.2f m", $nr, $nr/1000);

    ?>

    <form>

   <h2>ruut></h2>
<form>
   a <input type="number" name="a"><br>
   b <input type="number" name="b"><br>
    <input type="submit"value="arvuta" class="btn btn-primary"><br>
</form>

<?php
$a = $_GET["a"];
$b = $_GET["b"];
$c = sqrt(pow($a, 2) + pow($b, 2));

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>