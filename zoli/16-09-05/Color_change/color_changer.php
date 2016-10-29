<?php

// Expect to get a color
$sColor = $_GET['color']; // blue, green, purple, yellow
//write the color code/name to the color.txt file
file_put_contents("color.txt", $sColor);

?>
