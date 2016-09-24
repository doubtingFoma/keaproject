<!-- Stock Exchange -->
<!-- 2nd mandatory assignment - single page application -->
<!-- Gabor Pinter - http://github.com/gaboratorium/keaproject -->

<?php 
	// Start session on page load
	session_start();

	// Load configurations, router and api
	include_once "config/config.php";
	include_once $config -> sRouterPath;
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $config -> sSiteTitle ?></title>
	<!-- JavaScript: jQuery & Bootstrap -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/sha256.jquery.debug.js"></script>
	<!-- Style: Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
	<!-- Style: Font awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Style: Custom -->
	<link rel="stylesheet" href="style/base.form.css">
	<link rel="stylesheet" href="style/components.login-box.css">
	<link rel="stylesheet" href="style/objects.grid.css">
	<link rel="stylesheet" href="style/objects.text.css">
	<link rel="stylesheet" href="style/objects.wrapper.css">
</head>
<body>
	<?php include_once $pPage->sPageUrl; ?>
</body>
</html>