<?php
  //just hardcode a username and a password
  $validUser = "User1";
  $validPw = "asd";

  //we check if there is anything in the input field
  if ( isset($_POST['txtUserName']) ) {
    //start the session
    session_start();
    if ( $_POST['txtUserName'] == $validUser && $_POST['txtPassword'] == $validPw ) {
      //post the username to the welcome page
      $_SESSION['userName'] = $_POST['txtUserName'];
      //Send a raw HTTP header (i.e: the user name and the password)
      header("location: welcome.php");
    } else {
      //just display a failed login message
      echo "Login failed";
    }

  }

?>
<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>TITLE</title>
    <meta name="description" content="DESCRIPTION">
    <link rel="stylesheet" href="PATH">

    <!--[if lt IE 9]>
    <script src = "http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>

    <form action="login.php" method="post">
      <input type="text" name="txtUserName">
      <input type="password" name="txtPassword">
      <button>Login</button>
    </form>

  </body>

</html>
