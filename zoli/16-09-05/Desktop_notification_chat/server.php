<?php

// Expect to get a text
$sMessage = $_GET['message'];

file_put_contents("message.txt", $sMessage);

?>
