<?php 
	
	// Start PHP Session
	session_start();

	// GET desired page or home
	if(isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = "home";
	}

	// Login check
	if (isset($_SESSION['userId'])) {
		// Say Hi if user is logged in
		$loginNav = "LogOut";
		$greeterText = "You are currently logged in as " . $_SESSION['userId'];
	} else {
		// Get login page if user is not logged in
		$loginNav = "LogIn";
		$greeterText = "You are not logged in.";
		$page = "login";
	}

	// Routing
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
	<title>My PHP page</title>
</head>
<body>
	<?php if (isset($_SESSION['userId'])) : ?>
		Navigation
		<nav>
			<ul>
				<li><a href="index.php?page=home">Home</a></li>
				<li><a href="index.php?page=about">About</a></li>
				<li><a href="index.php?page=contact">Contact</a></li>
				<li><a href="index.php?page=logout-user">LogOut</a></li>
			</ul>
		</nav>
		<p>
			<?php echo  $greeterText ?>
		</p>
	<?php endif; ?>


	<h1><?php echo $page ?></h1>
	<!-- Content - Actual page -->
	<?php require_once $pageUrl ?>

	<!-- Footer -->
	<footer>
		<p>
			My PHP page - 2016
		</p>
	</footer>
</body>
</html>