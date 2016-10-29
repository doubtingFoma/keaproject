<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP exercises</title>
	<style>
		.task {
			padding: 1rem;
			border-bottom: 1px solid #E4E4E4;
		}
		.testName {
			color: blue;
		}
		.testLastName {
			color: red;
		}
		.testHeight {
			color: salmon;
		}
	</style>
</head>
<body>
	<p>Go to <a href="index.php">index</a></p>
	<div class="task">
		<p>Task 1: output some PHP and style it </p>
			<?php 
				$firstName1 = "Gabor";
				$lastName1 = "Pinter";
				$height1 = 175;
			?>
		<ul>
			<li class="testName">
				First name: <?php echo $firstName1 ?>
			</li>
			<li class="testLastName">
				Last name: <?php echo $lastName1 ?>
			</li>
			<li class="testHeight">
				Height: <?php echo $height1 ?>
			</li>
		</ul>
		<p>
			<?php echo "Hi, my name is $firstName1 and my last name is $lastName1"; ?>
		</p>
	</div>
	<div class="task">
		<p>Task 2: creating arrays</p>
		<?php 
			// $aLetters = ["A", "B"] // Version 5.4 only?
			$aLetters2 = array("asdsA", "B");
			echo count($aLetters2);
		 ?>
	</div>
	<div class="task">
		<p>Task 3: create an array and loop through it</p>
		<ul>
		<?php 
			$aLetters3 = array("A", "B", "C");
			$aLetters3[] = "D"; // same as $aLetters3.array_push("D");
			for ($i=0; $i < count($aLetters3); $i++) { 
				echo "<li>".$aLetters3[$i]."</li>";
			}

			echo "<div>print_r:</div>";
			print_r($aLetters3);
			echo "<div>var_dump:</div>";
			var_dump($aLetters3);
		 ?>
		 </ul>
	</div>
	<div class="task">
		<p>Task 4: Replace a string in a string</p>
		<?php 
			$sName4 = "Gabor";
			$sLastName4 = "Pinter";
			$sText4 = "Hello, my name is X and my last name is Y";

			$sNewText4 = str_replace("X", $sName4, $sText4);
			$sNewText4 = str_replace("Y", $sLastName4, $sNewText4);
		 ?>
		 <p>Original: <?php echo $sText4 ?></p>
		 <p>New: <?php echo $sNewText4 ?></p>
	</div>
	<div class="task">
		<p>Task 5: convert data to JSON</p>
		<?php 
			$sPerson5 = '{"name": "A"}';
			$jPerson5 = json_decode($sPerson5);
		 ?>
		 <p><?php echo $jPerson5->name; ?></p>
	</div>
	<div class="task">
		<p>Task 6: create a string which looks like an array of 3 companies (objects), output each in a different div</p>
		<?php 
			$sCompanies6 = '[{"name": "Google"}, {"name": "Amazon"}, {"name": "Twitter"}]';
			$aCompanies6 = json_decode($sCompanies6);

			for ($i=0; $i < sizeof($aCompanies6); $i++) {
				$sCompany = $aCompanies6[$i]->name;
				echo "<div>$sCompany</div>";
			}
		 ?>
	</div>
	<div class="task">
		<p>Task 7: load data from file, output each object in file in a different div</p>
		<?php 
			$sCompanies7 = file_get_contents("data.txt");
			$aCompanies7 = json_decode($sCompanies7);

			for ($i=0; $i < sizeof($aCompanies7); $i++) {
				$sCompany = $aCompanies7[$i]->name;
				echo "<div>$sCompany</div>";
			}
		 ?>
	</div>
	<div class="task">
		<p>Task 8: pass PHP variable to JavaScript</p>
		<?php $sName8 = "A" ?>
		<script>
			var sName8 = "<?php echo $sName8; ?>";
			console.log("Task 8: sName data from PHP:", sName8);
		</script>
		<p>See console</p>
	</div>
	<div class="task">
		<p>Task 9: pass a JSON object from PHP to JavaScript</p>
		<?php 
			$sPerson9 = '{"name": "Gabor", "age": 24}';
			$jPerson9 = json_decode($sPerson9); // let's assume we already have our object
			$sNewPerson9 = json_encode($jPerson9); // in this case we have to encode it
		 ?>
		 <script>
		 	var sPerson9 = '<?php echo $sNewPerson9 ?>';
		 	var jPerson9 = JSON.parse(sPerson9)
		 	console.log("Task 9: ", jPerson9.name, jPerson9.age);
		 </script>
		<p>See console</p>
	</div>
</body>
</html>