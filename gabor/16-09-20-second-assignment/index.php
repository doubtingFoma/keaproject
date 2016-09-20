<?php 
	session_start();

	// Define current page
	if (isset($_GET['page'])) {
		$page = $_GET['page']
	} else {
		$page = 'login';
	}


	// Router
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
	<title>Stock Exchange - Second mandatory assignment</title>
	<!-- Load jQuery with Google CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
	<!-- Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
	
</body>
</html>