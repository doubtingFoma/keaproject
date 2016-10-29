<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        Logged in as:
        <span class="lblUserName">
  				<?php
    				 echo $_SESSION['userName'];
    			?>
        </span>
      </a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li>
        <a href="logout.php" id="btnLogout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
    		<!-- Logout button, that takes to the logout page -->
    		<!-- <form action="logout.php"> -->
    			<!-- <button id="btnLogout">LOGOUT</button> -->
    		<!-- </form> -->
      </li>
    </ul>
  </div>
</nav>
