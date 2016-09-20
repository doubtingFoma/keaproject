<?php 
	
	// Start PHP Session
	session_start();

	// Check if page is set
	// Page: chosen one - if page is set
	// Page: home - if page is not set
	if(isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = "home";
	}

	// Check if user is logged in
	// Page: home - if user is logged in and chosen one is login
	// Page: login - if user is not logged in
	// Page: chosen one - if user is logged in and chosen one is not login
	if (isset($_SESSION['userId'])) {
		if ($page == 'login') {
			$page = 'home';
		} else {
			// leave $page as it is
		}
	} else {
		$page = "login";
	}

	// Routing
	// Assign corresponding content
	switch($page) {
		case 'home':
			$pageUrl = "components/home.php";
			break;
		case 'about':
			$pageUrl = "components/about.php";
			break;
		case 'contact':
			$pageUrl = "components/contact.php";
			break;
		case 'login-user':
			$pageUrl = "components/login-user.php";
			break;
		case 'login':
			$pageUrl = "components/login.php";
			break;
		case 'logout-user':
			$pageUrl = "components/logout-user.php";
			break;
		default:
			// $pageUrl = $defaultPageUrl; // 404
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login with E-Mail notification</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
	<style>
		.navbar {
			border-radius: 0px;
		}
		input {
			margin-bottom: 12px;
		}
		.container-fluid {
			text-align: center;
		}
		.panel {
			text-align: left;
		}
	</style>
</head>
<body>
	
	<!-- Navbar -->
	<?php if (isset($_SESSION['userId'])) : ?>
	<nav class="navbar navbar-default c-navbar--nomargin">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Welcome <?php echo $_SESSION['userId'] ?></a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php?page=home">Home</a></li>
				<li><a href="index.php?page=about">About</a></li>
				<li><a href="index.php?page=contact">Contact</a></li>
				<li><a href="index.php?page=logout-user">LogOut</a></li>
			</ul>
		</div>
	</nav>
	<?php endif; ?>

	<!-- Page content -->
	<div class="container-fluid">
		
		<!-- Content: page name and content -->
		<h1><?php echo $page ?></h1>
		<?php require_once $pageUrl ?>

		<!-- Footer -->
		<footer>
			<p>
				My PHP page - 2016
			</p>
		</footer>
	</div>
</body>
</html>