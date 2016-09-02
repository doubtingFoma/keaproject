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

    <style>
      .icon{
        height: 200px !important;
      }


      /*
      img{
        height: 250px !important;
      }
      */

    </style>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


    <div class="container-fluid">

      <div class="row">

        <?php
          //load the json file's content to a string
          $sData = file_get_contents("data-products.json");
          // convert text to objects
          $ajProducts = json_decode( $sData );

          // load the template-product.html file to a string
          $sTemplateProduct = file_get_contents( 'template-product.php' );
          //echo $sTemplateProduct;

          foreach( $ajProducts as $jProduct ){
            //we replace all the placeholder texts with the correct data from the json file
            $sTemp = str_replace("{{path-to-icon}}", $jProduct->icon, $sTemplateProduct);
            $sTemp = str_replace("{{name}}", $jProduct->name, $sTemp);
            $sTemp = str_replace("{{price}}", $jProduct->price, $sTemp);
            echo $sTemp;
          }

        ?>




      </div>




    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



  </body>
</html>
