<?php
// isset function
if( isset($_POST["txtStockName"]) ){

  $sStockName = $_POST["txtStockName"];
  // echo $sStockName;
  
  // 1. open the file
  $sDataFromFile = file_get_contents("test.json");
  // echo $sDataFromFile;

  // 2. convert the string/text to object(s)
  $ajStocks = json_decode($sDataFromFile );
  // var_dump($ajStocks);

  // 3. take the array and add to it (push) RAM
  $jStock = json_decode( '{}' ); // '  "":""  '
  $jStock->name = $sStockName;
  array_push($ajStocks, $jStock);
  // print_r($ajStocks);

  // 4. convert the object back to text RAM
  $sFinalData = json_encode( $ajStocks );
  echo $sFinalData;

  // 5. save to the file
  file_put_contents("test.json", $sFinalData );
  
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Add Stock</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>




    </style>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div>

      <form action="" method="post">
        <input type="" name="txtStockName" placeholder="stock name">
        <button type="submit">ADD PRODUCTS</button>       
      </form>


    </div>
      



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



  </body>
</html>