<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Töö CSV failidega</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <form method="get">
    sõidu alguse aeg:<input type="time" name="algus"><br>
    sõidu lõpu aeg:<input type="time" name="lopp"><br>
    <input type="submit" value="arvuta" class="btn btn-primary"><br>
  </form>

<?php
// h12
// Mattias Elmers
// 29.03.2025
if (isset($_GET['algus']) && isset($_GET['lopp'])) {
    $algus_aeg = $_GET['algus'];
    $lopp_aeg = $_GET['lopp'];
    
    if (empty($algus_aeg) || empty($lopp_aeg)) {
        echo "Palun Täitke mõlemad lahtrid";
    } else {
        $start = DateTime::createFromFormat('H:i', $algus_aeg);
        $lopp = DateTime::createFromFormat('H:i', $lopp_aeg);

        if ($start && $lopp) {
            if ($lopp < $start) {
                $lopp->add(new DateInterval('P1D'));
            }
            $erinevus = $start->diff($lopp);
            echo "Sõidu aeg on " . $erinevus->h . " tundi ja " . $erinevus->i . " minutit.";
        } else {
            echo "Vale ajaformaat. Palun sisestage aeg formaadis hh:mm.";
        }
    }
} else {
    echo "Sisesta algus ja lõpu aeg";
}
echo "<br>";
$mehed = 0;
$naised = 0;
$mehed_palk = 0;
$naised_palk = 0;
$max_mehed_palk = 0;
$max_naised_palk = 0;

$failinimi = 'tootajad.csv';
if (($csv = fopen($failinimi, "r")) !== FALSE) {
    while (($rida = fgetcsv($csv, filesize($failinimi), ";")) !== FALSE) {
        if (is_array($rida) && count($rida) >= 3) {
            $sugu = $rida[1];
            $palk = $rida[2];

            if ($sugu == 'm') {
                $mehed++;
                $mehed_palk += $palk;
                if ($palk > $max_mehed_palk) {
                    $max_mehed_palk = $palk;
                }
            } elseif ($sugu == 'n') {
                $naised++;
                $naised_palk += $palk;
                if ($palk > $max_naised_palk) {
                    $max_naised_palk = $palk;
                }
            }
        }
    }
    fclose($csv);
}

if ($mehed > 0) {
    echo "Meeste keskmine palk: " . round($mehed_palk / $mehed, 2) . "<br>";
    echo "Suurim meeste palk: " . round($max_mehed_palk, 2) . "<br>";
}

if ($naised > 0) {
    echo "Naiste keskmine palk: " . round($naised_palk / $naised, 2) . "<br>";
    echo "Suurim naiste palk: " . round($max_naised_palk, 2) . "<br>";
}

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


