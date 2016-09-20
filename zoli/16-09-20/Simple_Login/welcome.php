<?php
  //start the session
  session_start();
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
    <!-- Display the welcome message and the username -->
    <h1>Welcome <?php echo $_SESSION['userName'] ?></h1>
  </body>

</html>
