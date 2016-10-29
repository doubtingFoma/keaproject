<?php 
	$letter = $_GET['letter'];

	$text = file_get_contents("letters.txt");
	$text .= $letter;

	echo $text;

	file_put_contents("letters.txt", $text)
 ?>