<!DOCTYPE html>
<html>
<head>
	<title>PAGE TWO</title>
</head>
<body>
	<!-- localhost/yourpage.php?name=A&lastName=B -->
	<h1>PAGE TWO</h1>
	<h2>IN THE ADDRESS BAR THE VARIABLE NAME CONTAINS</h2>
	<h2><?php echo $_GET['name']; ?></h2>
	<h2><?php echo $_GET['lastName']; ?></h2>

</body>
</html>