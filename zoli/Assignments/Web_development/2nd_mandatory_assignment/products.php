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

				//function that returns with the difference of two arrays
				//the objects in the arrays are always different is we compare them
				//the regular way (jObject1 == jObject2), because of some memory
				//allocation issue. So instead, we have to take every single parameter
				//of the object and compare them individually
				function arrayDifference(array1, array2){
					//array1: ajProducts
					//array2: LocalStorage
					diffArray = []
					isFound = false;

					//Looping through array1 to find modified OR newly added items
					Loop1:
					for (var i = 0; i < array1.length; i++) {
						isFound = false;

						Loop2:
						for (var j = 0; j < array2.length; j++) {

							if (array1[i].id == array2[j].id) {
								isFound = true;
								if ((array1[i].name !== array2[j].name) || (array1[i].price !== array2[j].price)) {
									var jObjectPush = array1[i];
									jObjectPush.Action = "modified";
									diffArray.push(jObjectPush);
								}
								break Loop2;
							}

						}
						if (isFound == false) {
							var jObjectPush = array1[i];
							jObjectPush.Action = "new";
							diffArray.push(jObjectPush);
						}

					}

					//Looping through array2 to find deleted items
					Loop3:
					for (var i = 0; i < array2.length; i++) {
						isFound = false;

						Loop4:
						for (var j = 0; j < array1.length; j++) {
							if (array2[i].id == array1[j].id){
								isFound = true;
								break Loop4;
							}
						}

						if (isFound == false){
							var jObjectPush = array2[i];
							jObjectPush.Action = "deleted";
							diffArray.push(jObjectPush);
						}

					}

					return diffArray;
				}


				function checkProducts(){
					$.get("components/get-product.php", function(sData){
						ajProducts = JSON.parse(sData);
						//console.log("sData: " + sData);
						ajLocalStorage = JSON.parse(localStorage.Products);


						var aDiff = arrayDifference(ajProducts, ajLocalStorage);

						for (var i = 0; i < aDiff.length; i++) {
							if (aDiff[i].Action == "deleted") {

								$("#"+aDiff[i].id).remove();

							} else if (aDiff[i].Action == "new") {
								var sProductHTML = "";
								sProductHTML += '<tr id="{{Product-ID}}">\
																	<td>{{Product-Name}}</td>\
																	<td>{{Product-Price}}</td>\
																</tr>';
								sProductHTML = sProductHTML.replace("{{Product-ID}}", aDiff[i].id);
								sProductHTML = sProductHTML.replace("{{Product-Name}}", aDiff[i].name);
								sProductHTML = sProductHTML.replace("{{Product-Price}}", aDiff[i].price);

								$("#tblProductList").append(sProductHTML);

							} else if (aDiff[i].Action == "modified") {
								$("#"+aDiff[i].id).children(":nth-of-type(1)").html(aDiff[i].name);

								for (var j = 0; j < ajLocalStorage.length; j++) {
									if (aDiff[i].id == ajLocalStorage[j].id) {
										if (aDiff[i].price > ajLocalStorage[j].price) {
											$("#"+aDiff[i].id).children(":nth-of-type(2)").html(aDiff[i].price + " " + '<i class="fa fa-arrow-up" aria-hidden="true"></i>');
										} else if (aDiff[i].price < ajLocalStorage[j].price) {
											$("#"+aDiff[i].id).children(":nth-of-type(2)").html(aDiff[i].price + " " + '<i class="fa fa-arrow-down" aria-hidden="true"></i>');
										}
									}
								}

							}
						}

						ajLocalStorage = ajProducts;
						localStorage.Products = JSON.stringify(ajLocalStorage);

						//console.log(aDiff);

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
