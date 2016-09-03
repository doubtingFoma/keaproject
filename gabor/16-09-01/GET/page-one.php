<!DOCTYPE html>
<html>
<head>
	<title>PAGE ONE</title>
</head>
<body>
	<h1>PAGE ONE</h1>
	<?php 
		$sName = "Zsofia";
		$sLastName = "Toth";
	?>
	<form action="page-two.php?name=<?php echo $sName; ?>&lastName=<?php echo $sLastName; ?>" method="post">
		<input type="submit" value="Go to page two">
	</form>
</body>
</html>