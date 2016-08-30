<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP basics</title>
</head>
<body>
	<p>Go to <a href="stock_exchange.php">PHP exercises</a></p>
	<p>
		Task 1: output a string: 
		<?php
			echo "Gabor";
		?>
	</p>
	<p>
		Task 2: create a variable, output it: 
		<?php
			$name2 = "Gabor";
			echo $name2;
		?>
	</p>
	<p>
		Task 3: concatenation
		<?php
			$firstName3 = "Gabor";
			$lastName3 = "Pinter";
			echo $firstName3 . " " . $lastName3;
		?>
	</p>
	<p>
		Task 4: incrementation
		<?php
			$year = 2016;
			echo $year;
			echo " ";
			$year++;
			echo $year;
		?>
	</p>
	<p>
		Task 5: if statement - create a login system where user logs in succesfully if the email or the phone matches with the password
		
		<?php
			$email5 = "gabor";
			$phone5 = "789";
			$password5 = "123";
			
			if (($email5 == "gabor" || $phone5 == "789") && $password5 == "123") {
				echo "Success!";
			} else {
				echo "Fail!";
			}
		?>
	</p>
	
</body>
</html>