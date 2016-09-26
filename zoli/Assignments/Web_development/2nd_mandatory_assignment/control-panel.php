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

  	<title>Control Panel</title>
  </head>
  <body>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<?php
			include_once "components/navbar.php";
		?>
		<table class="table table-striped" id="tblProducts" class="dataTable">
		    <thead>
		      <tr>
		        <th>Name</th>
		        <th>Price</th>
						<th>Actions</th>
		      </tr>
		    </thead>
		    <tbody id="tblProductList">
		    </tbody>
		  </table>


		<script type="text/javascript">
			var ajProducts = [];
			var isEditing = false;
			var sTempEdit="";
			var sTempName, sTempPrice;

			//---------------Functions------------------------------------------------

			function addProduct(sName, sPrice){
				var jProduct = {};
				jProduct.name = sName;
				jProduct.price = Number(sPrice);

				var d = new Date();
				jProduct.id = d.getTime();

				ajProducts.push(jProduct);

				var sLink = "components/save-product.php?";
				$.get( sLink + "id="+ jProduct.id + "&name="+ jProduct.name + "&price="+ jProduct.price, function(sData){
          console.log(sData); // server doesnt return anything (unless you echo something in the php file)
        });

				var sProductHTML = "";
				sProductHTML += '<tr id="{{Product-ID}}">\
													<td>{{Product-Name}}</td>\
													<td>{{Product-Price}}</td>\
													<td>\
														<button class="btnEdit" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>\
														<button class="btnDelete" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>\
													</td>\
												</tr>';
				sProductHTML = sProductHTML.replace("{{Product-ID}}", jProduct.id);
				sProductHTML = sProductHTML.replace("{{Product-Name}}", jProduct.name);
				sProductHTML = sProductHTML.replace("{{Product-Price}}", jProduct.price);
				console.log(ajProducts);
				console.log(jProduct);
				$("#tblProductList").children().last().remove();
				$("#tblProductList").append(sProductHTML);
				addInputRow();
			}

			function addInputRow(){

				var sInputRowHTML = '<tr id="lblInputRow">\
														 	<td><input type="text" class="txtNewName" placeholder="Product Name"></td>\
															<td><input type="text" class="txtNewPrice" placeholder="Product Price"></td>\
															<td>\
																<button class="btnAdd" id="btnAddProduct" title="New Product"><i class="fa fa-plus" aria-hidden="true"></i></button>\
															</td>\
														 </tr>';

				$("#tblProductList").append(sInputRowHTML);
				getProduct();

			}

			function getProduct() {

				$.get("components/get-product.php", function(sData){
					ajProducts = JSON.parse(sData);
				});

			}


			function deleteProduct(thisItem){
				var sDeleteID = $(thisItem).parent().parent().attr("id");

				var sLink = "components/delete-product.php?";
				$.get( sLink + "id=" + sDeleteID, function(sData){
          console.log(sData); // server doesnt return anything (unless you echo something in the php file)
        });

				$(thisItem).parent().parent().remove();

				getProduct();
			}

			function editProduct(thisItem){
				isEditing = true;
				sTempEdit = thisItem.parent().parent().html();
				sTempName = thisItem.parent().parent().children(":nth-of-type(1)").text();
				sTempPrice = thisItem.parent().parent().children(":nth-of-type(2)").text();

				var sEditingHTML = '<td><input type="text" class="txtEditName" placeholder="Product Name" value="{{Product-Name}}"></td>\
														<td><input type="text" class="txtEditPrice" placeholder="Product Price" value="{{Product-Price}}"></td>\
														<td>\
													 		<button class="btnSave"  title="Save"><i class="fa fa-check" aria-hidden="true"></i></button>\
															<button class="btnCancel" title="Cancel"><i class="fa fa-times" aria-hidden="true"></i></button>\
														</td>';
				sEditingHTML = sEditingHTML.replace("{{Product-Name}}", sTempName);
				sEditingHTML = sEditingHTML.replace("{{Product-Price}}", sTempPrice);

				$(thisItem).parent().parent().html(sEditingHTML);
			}

			function saveEdited(thisItem){
				var sEditID = thisItem.parent().parent().attr('id');
				var sNewName = thisItem.parent().parent().find(".txtEditName").val();
				var sNewPrice = thisItem.parent().parent().find(".txtEditPrice").val();
				console.log(sNewName +" "+ sNewPrice +" "+ sEditID);
				if (sNewName.length==0) {
					sNewName = sTempName;
				}
				if (sNewPrice.length==0) {
					sNewPrice = sTempPrice;
				}

				var sLink = "components/edit-product.php?";
				$.get( sLink + "id=" + sEditID + "&name=" + sNewName + "&price=" + sNewPrice, function(sData){
          console.log(sData); // server doesnt return anything (unless you echo something in the php file)
        });

				var sEditedProductHTML = '<td>{{Product-Name}}</td>\
												<td>{{Product-Price}}</td>\
												<td>\
													<button class="btnEdit" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>\
													<button class="btnDelete" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>\
												</td>';
				sEditedProductHTML = sEditedProductHTML.replace("{{Product-Name}}", sNewName);
				sEditedProductHTML = sEditedProductHTML.replace("{{Product-Price}}", sNewPrice);

				thisItem.parent().parent().html(sEditedProductHTML);

				isEditing = false;

			}

			//------------------------------------------------------------------------



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
				ajProducts = aProducts;
				var sProductHTML = "";
				for (var i = 0; i < aProducts.length; i++) {
					//Creating rows in the table for the products
					sProductHTML += '<tr id="{{Product-ID}}">\
													 	<td>{{Product-Name}}</td>\
														<td>{{Product-Price}}</td>\
														<td>\
															<button class="btnEdit" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>\
															<button class="btnDelete" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>\
														</td>\
													</tr>';
					sProductHTML = sProductHTML.replace("{{Product-ID}}", aProducts[i].id);
					sProductHTML = sProductHTML.replace("{{Product-Name}}", aProducts[i].name);
					sProductHTML = sProductHTML.replace("{{Product-Price}}", aProducts[i].price);
				}

				sProductHTML += '<tr id="lblInputRow">\
													<td><input type="text" class="txtNewName" placeholder="Product Name"></td>\
													<td><input type="text" class="txtNewPrice" placeholder="Product Price"></td>\
													<td>\
														<button class="btnAdd" id="btnAddProduct" title="New Product"><i class="fa fa-plus" aria-hidden="true"></i></button>\
													</td>\
												</tr>';

				$("#tblProductList").html(sProductHTML);

			}).fail(function(sData){
				console.log(sData);
			});


			//-----------------------Events-------------------------------------------
			$(document).on("click", "#btnAddProduct", function(){
				var sName = $(".txtNewName").val();
				var sPrice = $(".txtNewPrice").val();
				if (sName.length==0 || sPrice.length==0) {

				} else {
					addProduct(sName, sPrice);
				}
			});

			$(document).on("click", ".btnDelete", function(){
					deleteProduct( $(this) );
			});

			$(document).on("click", ".btnEdit", function(){
				if (!isEditing) {
					editProduct( $(this) );
				}
			});

			$(document).on("click", ".btnCancel", function(){
				$(this).parent().parent().html(sTempEdit);
				isEditing = false;
			});

			$(document).on("click", ".btnSave", function(){
				saveEdited( $(this) );
			});


			//------------------------------------------------------------------------

		</script>

  </body>
</html>
