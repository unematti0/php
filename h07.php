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
tervita();

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
<form method="get">
    mis on teie kasutajanimi(gmaili ja parooli genereerimine) <input type="text" name="kasutajanimi" class="form-control"><br>
    <input type="submit" value="genereeri" class="btn btn-primary"><br>
</form>

<?php
if (isset($_GET['kasutajanimi'])) {
    $kasutaja = $_GET['kasutajanimi'];
    function gmail($kasutaja){
        return strtolower($kasutaja) . '@gmail.com';
        echo "<h2>Teie email:</h2>";
    echo gmail($kasutaja);

    echo "<h2>Teie kood:</h2>";
    echo substr(uniqid(), -7);

    }

 echo gmail($kasutaja);
}

echo "<h2>arvud:</h2>";
?>
<form method="get">
    arv1 <input type="number" name="arv1" class="form-control"><br>
    arv2 <input type="number" name="arv2" class="form-control"><br>
    samm <input type="number" name="samm" class="form-control"><br>
    <input type="submit" value="arvuta" class="btn btn-primary"><br>
    <?php
if (isset($_GET['arv1']) && isset($_GET['arv2']) && isset($_GET['samm']) && !empty($_GET['arv1']) && !empty($_GET['arv2']) && !empty($_GET['samm'])) {
    $arv1 = $_GET['arv1'];
    $arv2 = $_GET['arv2'];
    $samm = $_GET['samm'];

    function arvud($arv1, $arv2, $samm){
        echo "Arvud:<br>";
        for($i = $arv1; $i <= $arv2; $i++){
            if ($i % $samm == 0) {
                echo $i . ", ";
            }
        }
    }

    arvud($arv1, $arv2, $samm);
}

echo "<h2>ristkülliku pindala</h2>";
?>
<form method="get">
    külg1 <input type="number" name="kulg1" class="form-control"><br>
    külg2 <input type="number" name="kulg2" class="form-control"><br>
    <input type="submit" value="arvuta" class="btn btn-primary"><br>
</form>

<?php
if (isset($_GET['kulg1']) && isset($_GET['kulg2']) && !empty($_GET['kulg1']) && !empty($_GET['kulg2'])) {
    $kulg1 = $_GET['kulg1'];
    $kulg2 = $_GET['kulg2'];

    function pindala($kulg1, $kulg2){
        return $kulg1 * $kulg2;
        echo "<h2>Pindala on:</h2>";
        echo pindala($kulg1, $kulg2);
    }

   echo pindala($kulg1, $kulg2);
}


echo "<h2>Isikukood</h2>";
?>
<form method="get">
    Isikukood <input type="number" name="isikukood" class="form-control"><br>
    <input type="submit" value="kontrolli" class="btn btn-primary"><br>
</form>
<?php
if (isset($_GET['isikukood']) && !empty($_GET['isikukood'])) {
    $isikukood = $_GET['isikukood'];

    function isikukood($isikukood){
        $result = "";
        if (strlen($isikukood) == 11) {
            $result .= "Isikukood on õige pikkusega<br>";
        } else {
            $result .= "Isikukood on vale pikkusega<br>";
        }

        $result .= "sugu: ";
        $result .= substr($isikukood, 0, 1) % 2 == 0 ? "Naine<br>" : "Mees<br>";
        $result .= "sünniaeg: ";
        $result .= substr($isikukood, 5, 2) . "." . substr($isikukood, 3, 2) . "." . substr($isikukood, 1, 2);

        return $result;
    }

    echo isikukood($isikukood);
}


echo "<h2>Head mõtted:</h2>";

function motted(){
    $alus = array("Tarkus", "Õnn", "Armastus", "Rõõm", "Jõud", "Tervis", "Raha", "Edu", "Sõprus", "Pere");
    $oeldis = array("on", "toob", "teeb", "aitab", "võimaldab", "tagab", "kingib", "tõstab", "aitab", "loob");
    $sihitis = array("targaks", "õnnelikuks", "armastavaks", "rõõmsaks", "jõuliseks", "terveks", "jõukaks", "edukaks", "sõbralikuks", "perekeskseks");

    $rand1 = rand(0, count($alus)-1);
    $rand2 = rand(0, count($oeldis)-1);
    $rand3 = rand(0, count($sihitis)-1);

    echo $alus[$rand1] . " " . $oeldis[$rand2] . " " . $sihitis[$rand3];
}

motted();
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>