<?php
	session_start();
	//if there isn't any active session (login), then go back to the login page
	if( !isset( $_SESSION['userName'] ) ){
		header('location: login.php');
	}

?>

<!DOCTYPE html>
<html>
  <head>
		<?php include_once "components/css-imports.php" ?>
		<style>
			body{
			  color: #5c0094;
			}
			.lblUserName{
			  color: #5c0094;
			}
			#tblProducts {
			  border: 1px solid #5c0094;
			}
		</style>
  	<title>Products</title>
  </head>
  <body>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<?php
			include_once "components/navbar.php";

			//yeah, I could've just hardcoded it, because it's not much, but who cares, right?
			include 'components/product-table.php';
		?>


			<script type="text/javascript">
				var ajProducts=[];

				function arrayDifference(array1, array2){
					var foo = [];
					var i = 0;

					jQuery.grep(array2, function(el) {
					    if (jQuery.inArray(el, array1) == -1) foo.push(el);
						  i++;
					});

					jQuery.grep(array1, function(el) {
					    if (jQuery.inArray(el, array2) == -1) foo.push(el);
						  i++;
					});

					return foo;
				}

				function checkProducts(){
					$.get("components/get-product.php", function(sData){
						ajProducts = JSON.parse(sData);
						//console.log("sData: " + sData);

						ajLocalStorage = JSON.parse(localStorage.Products);

						aDiff = arrayDifference(ajProducts, ajLocalStorage);
						// console.log("LS: " + ajLocalStorage);
						// console.log("Import: " + ajProducts);

						console.log(aDiff);

					});



				}



				// //we can use this to get variables from php instead of AJAX if we want to
				// var jProducts = <?php //echo $sProducts ?>;

				//since the task says we have to use ajax, I just use it. but the solution
				//on above this is much simpler, and does the same...
				$.ajax({
					"url": "components/get-product.php",
					"method":"get",
					"dataType":"json",
					"cache":false
				}).done(function( aProducts ){
					var sProductHTML = "";

					for (var i = 0; i < aProducts.length; i++) {
						sProductHTML += '<tr id="{{Product-ID}}">\
														 	<td>{{Product-Name}}</td>\
															<td>{{Product-Price}}</td>\
														 </tr>';
						sProductHTML = sProductHTML.replace("{{Product-ID}}", aProducts[i].id);
						sProductHTML = sProductHTML.replace("{{Product-Name}}", aProducts[i].name);
						sProductHTML = sProductHTML.replace("{{Product-Price}}", aProducts[i].price);
					}

					$("#tblProductList").html(sProductHTML);
					localStorage.Products = JSON.stringify(aProducts);

				}).fail(function(sData){
					console.log(sData);
				});


				//checkProducts();
				var timerCheck = setInterval(checkProducts, 1000);

			</script>

  </body>
</html>
