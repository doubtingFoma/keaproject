<?php  

// Expect to get a color
$sColor = $_GET['color']; // blue, green, purple, yellow
file_put_contents("color.txt", $sColor);


?>