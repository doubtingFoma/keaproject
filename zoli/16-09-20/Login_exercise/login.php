<?php

	session_start();

	//if there is an active session (login), redirect it to the welcome page
	if( isset( $_SESSION['userEmail'] ) ){
		header('location: welcome.php');
	}

	$theCorrectUserEmail = "a@a.com";
	$theCorrectUserPassword = "123";
	//we check if the txtUserEmail's value exists. If we don't do that, php will
	//display a warning message, which is ugly :(
  if ( isset( $_POST["txtUserEmail"]) && isset($_POST['txtUserPassword']) ) {

		//check the username (email address) and the password if it mathes the hardcoded value
    if( $_POST["txtUserEmail"] == $theCorrectUserEmail && $_POST['txtUserPassword'] == $theCorrectUserPassword ){

			//send the username to the server
      $_SESSION['userEmail'] = $theCorrectUserEmail;
			//navigate to welcome.php
			header('location: welcome.php');

    }

  }


?>


<!DOCTYPE html>
<html>
<head>

	<style>

		html, body{
			height: 100%;
			background-color: #cfcfcf;
			color: #222;
		}

		*{
			margin: 0px;
			padding: 0px;
			font-size: 16px;
			box-sizing: border-box;
		}

		body{
			display: flex;
			justify-content: center;
			align-items: center;
		}

		#wdw-login{
			display: flex;
			flex-direction: column;
			width: 600px;
			padding: 50px;
			/*border: 1px solid #999999;*/
      box-shadow: 1px 1px 1px 2px #aaaaaa;
			background-color: white;
      border-radius: 4px;
		}

		input{
			width: 100%;
			height: 50px;
			padding: 10px;
		}

		button{
			width: 100%;
			height: 50px;
			color: white;
			border: none;
			background-color: #003db4;
			cursor: pointer;
		}

		.space-top-20{
			margin-top: 20px;
		}


	</style>

	<title>LOGIN</title>
</head>
<body>

	<div id="wdw-login">
		<form method="POST" action="login.php">
			<input type="text" name="txtUserEmail" placeholder="email">
			<input class="space-top-20" type="text" name="txtUserPassword" placeholder="password">
			<button class="space-top-20">LOGIN</button>
		</form>
	</div>




</body>
</html>
