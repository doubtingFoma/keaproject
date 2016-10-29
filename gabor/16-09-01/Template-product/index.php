<?php 

  if (isset($_POST["txtStockId"])) {
	$sStockId = $_POST["txtStockId"];
	//echo $sStockId;
	/*
	1. check that isset
	2. read the file as text
	3. convert to object
	4. find the correct id ( loop through the array and check if the id matches )
	5. the system found a match 
	6. splice the object ( position og i, 1 ) array_splice($ajStocks, $i, 1); RAM
	7. convert it to text
	8. write the file back to hard drive
	*/  

	$sDataFromFile = file_get_contents("data-products.json");
	//echo $sDataFromFile;
	$ajCompanies = json_decode($sDataFromFile );
  	//var_dump($ajCompanies);
  	for ($i=0; $i < count($ajCompanies) ; $i++) { 
  		if ($ajCompanies[$i]->id == $sStockId) {
  		  array_splice($ajCompanies, $i, 1);
  		  //var_dump($ajCompanies);
	  	}	
  	}

  	$sFinalData = json_encode($ajCompanies, JSON_PRETTY_PRINT);
  	//echo $sFinalData;
  	file_put_contents("data-products.json", $sFinalData);

  }
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    	img.icon{
    		height: 200px;
    	}
    </style>
  </head>
  <body>
  <div class="container-fluid">
    <div class="row">
	<?php
	  $sData = file_get_contents("data-products.json"); // load the string 
	  $ajProducts = json_decode( $sData ); // convert text to objects

	  $sTemplateProduct = file_get_contents( "template-product.html" );

	  foreach( $ajProducts as $jProduct ){
	  	 $sTemp = str_replace(
            array(
              "{{icon}}",
              "{{name}}",
              "{{price}}",
              "{{description}}",
              "{{id}}"
            ),
            array(
              $jProduct->icon,
              $jProduct->name,
              $jProduct->price,
              $jProduct->description,
              $jProduct->id
            ),
            $sTemplateProduct
          );
        echo $sTemp;
	  }
        
    ?>


      <?php
      /*
      PHP COMMENTS - SEARCH ENGINE OPTIMIZATION
      <div class="col-md-4">
        <div class="thumbnail">
          <img src="..." alt="...">
          <div class="caption">
            <h3>Thumbnail label</h3>
            <p>...</p>
            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
          </div>
        </div>
      </div>
      */
      ?>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </body>
</html>