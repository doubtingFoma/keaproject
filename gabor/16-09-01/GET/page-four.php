<!DOCTYPE html>
<html>
<head>
  <title>PAGE TWO</title>
</head>
<body>
  <!-- localhost/yourpage.php?name=A&lastName=B --> 
  <h1>PAGE TWO</h1>
  <h2>IN THE ADDRESS BAR THE VARIABLE NAME CONTAINS</h2>
  <h2><?php echo "ADDIN NAME: " . $_GET['name'] . " ADDIN PRICE: " . $_GET['price'] . " ADDIN URL: " . $_GET['url']; ?></h2>

</body>
</html>