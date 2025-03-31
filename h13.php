<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Töö kataloogidega</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <form action="" method="post" enctype="multipart/form-data">
    mis faili soovite kuvada:<input type="file" name="minu_fail"><br>
    <input type="submit" value="otsi/kuva" class="btn btn-primary"><br>
  </form>
<?php
// h13
// Mattias Elmers
// 31.03.2025

if (isset($_FILES['minu_fail'])){
    $failinimi = $_FILES['minu_fail']['name'];
    $faili_tuup = $_FILES['minu_fail']['type'];
    $faili_ajutine_nimi = $_FILES['minu_fail']['tmp_name'];
    $faili_veakood = $_FILES['minu_fail']['error'];
    $lubatud_tuubid = array('image/jpeg', 'image/jpg');

    if (in_array($faili_tuup, $lubatud_tuubid)){
        if ($faili_veakood === 0){
            $faili_nimi = uniqid('', true).'.'.$failinimi;
            $faili_sihtkoht = 'img/'.$faili_nimi;
            move_uploaded_file($faili_ajutine_nimi, $faili_sihtkoht);
            echo "Faili üleslaadimine õnnestus!";
            echo "<a href='".$faili_sihtkoht."'><img src='".$faili_sihtkoht."' class='img-fluid'/></a>";
        } else {
            echo "Tekkis viga faili üleslaadimisel!";
        }
    } else {
        echo "Vale failitüüp!";
    }
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>