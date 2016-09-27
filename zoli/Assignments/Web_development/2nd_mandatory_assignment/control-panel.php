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
		<?php include_once "components/css-imports.php" //bootstrap, fontawesome and custom CSS import (yes, I'm lazy to write them down 2 times) ?>

  	<title>Control Panel</title>
  </head>
  <body>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<?php
			include_once "components/navbar.php"; //this is the navigation bar of the page
		?>
		<!-- well, I couldn't use the product-table.php, because it was easier to hardcode it -->
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
			var sTempEdit=""; //temporary storage of the currently editing row
			var sTempName, sTempPrice; //temporary storage of the currently editing row's values

			//---------------Functions------------------------------------------------

			function addProduct(sName, sPrice){
				var jProduct = {};
				jProduct.name = sName;
				jProduct.price = Number(sPrice); //convert string to number (integer, float, whatever)

				var d = new Date();
				jProduct.id = d.getTime(); //generating an individual ID

				ajProducts.push(jProduct); //push the new product to the array

				//push the new product to the server as well
				var sLink = "components/save-product.php?";
				$.get( sLink + "id="+ jProduct.id + "&name="+ jProduct.name + "&price="+ jProduct.price, function(sData){
          console.log(sData); // server doesnt return anything (unless you echo something in the php file)
        });
				//the data we will write it into the DOM
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
				//we delete the last row, which is the editing row
				$("#tblProductList").children().last().remove();
				//we add the new product to the end
				$("#tblProductList").append(sProductHTML);
				//we write the editing row back in the end of the table
				addInputRow();
			}

			function addInputRow(){
				//just a simple extra row that let's you insert new products
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
				//get the fresh data from the server
				$.get("components/get-product.php", function(sData){
					ajProducts = JSON.parse(sData);
				});

			}


			function deleteProduct(thisItem){
				//getting the ID of the deleted product
				var sDeleteID = $(thisItem).parent().parent().attr("id");

				//send the item we want to delete to the server
				var sLink = "components/delete-product.php?";
				$.get( sLink + "id=" + sDeleteID, function(sData){
          console.log(sData); // server doesnt return anything (unless you echo something in the php file)
        });
				//delete the current row where the item is
				$(thisItem).parent().parent().remove();

				getProduct();
			}

			function editProduct(thisItem){
				//enabling edit mode that prevents other items from editing
				isEditing = true;

				//get the current status of the product page
				sTempEdit = thisItem.parent().parent().html();
				sTempName = thisItem.parent().parent().children(":nth-of-type(1)").text();
				sTempPrice = thisItem.parent().parent().children(":nth-of-type(2)").text();

				//replace the product names andr prices with the input fields, and a save and cancel button
				var sEditingHTML = '<td><input type="text" class="txtEditName" placeholder="Product Name" value="{{Product-Name}}"></td>\
														<td><input type="text" class="txtEditPrice" placeholder="Product Price" value="{{Product-Price}}"></td>\
														<td>\
													 		<button class="btnSave"  title="Save"><i class="fa fa-check" aria-hidden="true"></i></button>\
															<button class="btnCancel" title="Cancel"><i class="fa fa-times" aria-hidden="true"></i></button>\
														</td>';
				sEditingHTML = sEditingHTML.replace("{{Product-Name}}", sTempName);
				sEditingHTML = sEditingHTML.replace("{{Product-Price}}", sTempPrice);
				//write the edit inputs and buttons in the DOM
				$(thisItem).parent().parent().html(sEditingHTML);
			}

			//when in edit mode, save the current items in the DOM
			function saveEdited(thisItem){
				//get the input parameters, and the ID of the element
				var sEditID = thisItem.parent().parent().attr('id');
				var sNewName = thisItem.parent().parent().find(".txtEditName").val();
				var sNewPrice = thisItem.parent().parent().find(".txtEditPrice").val();
				console.log(sNewName +" "+ sNewPrice +" "+ sEditID);
				if (sNewName.length==0) {
					//when there is nothing in the input field, just replace it with the current data
					sNewName = sTempName;
				}
				if (sNewPrice.length==0) {
					//when there is nothing in the input field, just replace it with the current data
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
				//turn off editing mode, so we can click on other edit buttons again
				isEditing = false;

			}

			//------------------------------------------------------------------------

			//page load
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
				//input row! (no, I didn't use the input row function because I
				//wrote it after this, and I'm too tired to do it)
				sProductHTML += '<tr id="lblInputRow">\
													<td><input type="text" class="txtNewName" placeholder="Product Name"></td>\
													<td><input type="text" class="txtNewPrice" placeholder="Product Price"></td>\
													<td>\
														<button class="btnAdd" id="btnAddProduct" title="New Product"><i class="fa fa-plus" aria-hidden="true"></i></button>\
													</td>\
												</tr>';
				//write everything to the DOM
				$("#tblProductList").html(sProductHTML);

			}).fail(function(sData){
				//just ignore this line. I didn't want to delete it. Because it wanted
				//to live. It has a family. It works hard to earn money for them.
				console.log(sData);
			});


			//-----------------------Events-------------------------------------------


			$(document).on("click", "#btnAddProduct", function(){
				var sName = $(".txtNewName").val(); //get the new name
				var sPrice = $(".txtNewPrice").val(); //get the new price
				if (sName.length==0 || sPrice.length==0) {
					//if these are empty strings, just ignore the click
				} else {
					//if the price is a number, we do the adding, if not, just ignore it
					if ($.isNumeric(sPrice)) {
						addProduct(sName, sPrice); //add the new product
					}
				}
			});

			$(document).on("click", ".btnDelete", function(){
					deleteProduct( $(this) ); //delete the product
			});

			$(document).on("click", ".btnEdit", function(){
				if (!isEditing) {
					//if we are not editing anything else, edit this product
					editProduct( $(this) );
				}
			});

			$(document).on("click", ".btnCancel", function(){
				$(this).parent().parent().html(sTempEdit); //write everything back to the DOM
				isEditing = false; //we are not editing anymore
			});

			$(document).on("click", ".btnSave", function(){
				saveEdited( $(this) ); //save the changes
			});


			//------------------------------------------------------------------------

		</script>

  </body>
</html>
