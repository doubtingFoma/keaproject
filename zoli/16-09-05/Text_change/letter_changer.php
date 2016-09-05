<?php

// Expect to get a text
$sColor = $_GET['letters']; // letters/words here

file_put_contents("letters.txt", $sColor);

?>
