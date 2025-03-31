<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Töö pildifailidega</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<?php
// h14
// Mattias Elmers
// 31.03.2025

$imagedir = 'img/';

function suvaPilt($dir) {
    $images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    $randomImage = $images[array_rand($images)];
    return $randomImage;
}

function pisipilt($dir, $columns = 3) {
    $images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    $rowCount = ceil(count($images) / $columns);
    for ($i = 0; $i < $rowCount; $i++) {
        echo '<div class="row">';
        for ($j = 0; $j < $columns; $j++) {
            $index = $i * $columns + $j;
            if ($index < count($images)) {
                echo '<div class="col">';
                echo '<a href="' . $images[$index] . '" target="_blank">';
                echo '<img src="' . $images[$index] . '" class="thumbnail" style="width:200px; height:200px;" onclick="pisipiltSuureks(\'' . $images[$index] . '\');">';
                echo '</a>';
                echo '</div>';
            }
        }
        echo '</div>';
    }
}

?>
      <script>
            function pisipiltSuureks(imageSrc) {
                var largeImageWindow = window.open('', '_blank');
                largeImageWindow.document.write('"<img src="' + imageSrc'" >');
            }
        </script>

        <h2>Suvaline pilt:</h2>
        <img src="<?php echo suvaPilt($imagedir); ?>" >

        <h2>Pisipildid veergudes:</h2>
        <?php pisipilt($imagedir, 3); ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

