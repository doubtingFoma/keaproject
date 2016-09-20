<?php
	//Start session
	session_start();
	//destroy/close the session (basically, the logout)
	session_destroy();
	//go back to login.php
	header('location: login.php');
?>
