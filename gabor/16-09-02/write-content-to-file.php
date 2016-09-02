<?php 
	$name = $_GET['name'];
	file_put_contents("companies.txt", $name);
 ?>