<?php
	session_start();

	//if there is an active session (login), redirect it to another page
	if( isset( $_SESSION['userName'] ) ){
		//if it's an admin, take him/her to the control panel
		if ($_SESSION['userType'] == 0) {
			header('location: control-panel.php');
		} elseif ($_SESSION['userType'] == 1) {
			//if it's a user, go to the product page
			header('location: products.php');

		}
	}

  $sUsers = file_get_contents("components/users.json");
  $aUsers = json_decode($sUsers);

  $bLoginError = false;

	//we check if the txtUserName's value exists. If we don't do that, php will
	//display a warning message, which is ugly :(
  if ( isset( $_POST["txtUserName"] ) && isset( $_POST['txtUserPassword']) ) {
    $bLoginError = true;

    for ($i=0; $i < count($aUsers); $i++) {
      //check the username (email address) and the password if it mathes the hardcoded value
      if( $_POST["txtUserName"] == $aUsers[$i]->username && $_POST['txtUserPassword'] == $aUsers[$i]->password ){
        $bLoginError = false;
        //send the username to the server
        $_SESSION['userName'] = $aUsers[$i]->username;
				//send the type of user to the server
				$_SESSION['userType'] = $aUsers[$i]->type;

        if ($aUsers[$i]->type == 1) {
          //navigate to products.php if it is a user
          header('location: products.php');
        } elseif ($aUsers[$i]->type == 0) {
          //navigate to control-panel.php if it is an admin
          header('location: control-panel.php');
				}
      }
    }
  } else {
    $bLoginError = false;
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
      border-radius: 4px;
      background-color: white;
		}

		input{
			width: 100%;
			height: 50px;
			padding: 10px;
      border-radius: 4px;
      border: 1px solid #ccc;
		}

		button{
			width: 100%;
			height: 50px;
			color: white;
			border: none;
			background-color: #003db4;
			cursor: pointer;
      border-radius: 4px;
      box-shadow: 1px 1px 1px #a6a6a6;

		}

		.space-top-20{
			margin-top: 20px;
		}

    #errorLogin{
      width: 100%;
      height: 50px;
      color: #ff0000;
      border: none;
      background-color: #ffc2c2;
      margin-bottom: 20px;
      /*display: flex;*/
      display: none;
      border-radius: 4px;
      box-shadow: 1px 1px 1px #a6a6a6;
      justify-content: center;
      align-items: center;
    }

    #errorLogin p{
    }


	</style>

	<title>LOGIN</title>

</head>
<body>

	<div id="wdw-login">
    <div id="errorLogin">
      <p>
        Login failed. Wrong username or password. Try again.
      </p>
    </div>
		<form method="POST" action="login.php">
			<input type="text" name="txtUserName" placeholder="Username">
			<input class="space-top-20" type="password" name="txtUserPassword" placeholder="Password">
			<button class="space-top-20">LOGIN</button>
		</form>
	</div>

  <?php
    if ($bLoginError) {
      echo "<script>document.getElementById('errorLogin').style.display ='flex';</script>";
    }

  ?>



</body>
</html>
