<?php
// Create a 200 x 200 image
$canvas = imagecreatetruecolor(300, 200);

// Allocate colors
$pink = imagecolorallocate($canvas, 255, 105, 180);
$white = imagecolorallocate($canvas, 255, 255, 255);
$green = imagecolorallocate($canvas, 132, 135, 28);

// Draw three rectangles each with its own color
imagerectangle($canvas, 50, 50, 150, 150, $pink); // Correct coordinates
imagerectangle($canvas, 45, 60, 120, 100, $white); // Correct coordinates
imagerectangle($canvas, 75, 100, 160, 120, $green); // Correct coordinates

// Output
header('Content-Type: image/jpeg');
imagejpeg($canvas);
imagedestroy($canvas); // Free up memory
?>