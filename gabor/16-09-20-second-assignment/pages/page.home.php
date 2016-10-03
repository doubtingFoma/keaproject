<!-- Navbar -->
<?php include_once "components/navbar.php"; ?>

<!-- Home  -->
<div class="o-wrapper o-wrapper--navbar o-grid ">
	<div class="o-wrapper__content">
		<div class="o-grid o-grid--valign-bottom o-grid--align-between c-title-bar">
			<h1><i class="fa fa-home fa-fw" aria-hidden="true"></i><?php echo $pPage->sPageName ?></h1>
			<p class="o-text--subtitle"></p>
		</div>
		<p id="error_msg" class='o-text--error'></p>
		<table id="tbl-companies" style="display: none;">
			<thead>
				<tr>
					<th>Company ID</th>
					<th>Company Name</th>
					<th>Company Shares</th>
					<th>Company Share Price</th>
					<?php if ($_SESSION['userRole'] == "admin") : ?>
						<th>Action</th>
					<?php endif; ?>
				</tr>
			</thead>
			<tbody id='tbl-companies__body'>
				
			</tbody>
		</table>
		<?php if ($_SESSION['userRole'] == "admin") : ?>
			<div class="o-grid o-grid--valign-bottom o-grid--align-between c-title-bar">
				<h1><i class="fa fa-plus fa-fw" aria-hidden="true"></i>Create new company</h1>
				<p class="">Only administrators can create new companies.</p>
			</div>
			<table>
				<thead>
					<th>Company Name</th>
					<th>Company Shares</th>
					<th>Company Share Price</th>
					<?php if ($_SESSION['userRole'] == "admin") : ?>
						<th>Action</th>
					<?php endif; ?>
				</tr>
				</thead>
				<tr data-id='new-company'>
	
				<td id='new-company__name'>
					<input type='text' class="o-form--full-width" placeholder='Company name...' id='input-new-company__name'>
				</td>
				<td id='new-company__shares'>
					<input type='text' class="o-form--full-width" placeholder='Company shares...' id='input-new-company__shares'>
				</td>
				<td id='new-company__share-price'>
					<input type='text' class="o-form--full-width" placeholder='Company share price...' id='input-new-company__share-price'>
				</td>
				<td>
					<a class='a-create' href='#'>
					<i class='fa fa-plus fa-fw' aria-hidden='true'></i>Create
				</a>
				</td>
						
			</table>
		<?php endif; ?>
	</div>
</div>

<!-- JS -->
<!-- Should be splitted into separate file - page.home.js -->
<script>
	//////////////////////////////////////////////////////
	// 1. Globals
	iEditingItemIndex = null;
	aCompanies = [];

	//////////////////////////////////////////////////////
	// 2. Init
	fetchCompanies();

	//////////////////////////////////////////////////////
	// 3. Functions
	// Fetch companies from backend
	// init = true -> draw everything in DOM, init = false -> update existing table
	function fetchCompanies(init = true){
		// On Page load
		$.ajax({
			"url": "<?php echo $config->sApiPath ?>?request=get-companies",
			"method": "get",
			"cache": false,
			"dataType": "json",
		}).done(function(data){
			if (data.iStatusCode == 200){
				
				// Succesful request
				// Draw companies in DOM if initialization = true
				if (init) {
					aCompanies = data.jPackage;
					showCompanies(aCompanies);
				
				//Update existing companies in DOM if initialization = false
				} else {
					updateCompanies(aCompanies, data.jPackage);
				}
			} else {
				// Request not OK
				console.log(data);
				showError(data.sMessage);
			}
		}).fail(function(err){
			// Request Failed
			console.log(data);
			showError(data.sMessage);
		});
	}

	// DOM update
	// This method updates the rows of the company table
	// 1. delete company row, if company does not exist anymore
	// 2. creates a company row, if new company has been fetched
	// 3. update a company row, if company exist but have been modified
	// 4. save the new array of companies
	function updateCompanies(aOldCompanies, aNewCompanies){

		// 1. Delete not existing company rows
		for (var i = 0; i < aOldCompanies.length; i++) {
			var found = false
			for (var j = 0; j < aNewCompanies.length; j++) {
				if (aNewCompanies[j].companyId == aOldCompanies[i].companyId) {
					var found = true;
				}
			}

			// If company in old list was not found in new list, remove it from old
			if (!found){
				console.log("Company has to be deleted!", aOldCompanies[i].companyId);
				$("tr[data-id="+aOldCompanies[i].companyId+"]").remove();
				aOldCompanies.splice(i, 1);
			}
		}

		// 2. Add new, not existing company rows
		for (var i = 0; i < aNewCompanies.length; i++) {
			var found = false;
			for (var j = 0; j < aOldCompanies.length; j++) {
				if (aNewCompanies[i].companyId == aOldCompanies[j].companyId) {
					found = true;
				}
			}

			// If company in new list was not found in old list, add it to dom and old list
			if (!found){

				row = "\
				<tr data-id='"+aNewCompanies[i].companyId+"'>\
					<td id='company-row-"+aNewCompanies[i].companyId+"__id'>"+aNewCompanies[i].companyId+"</td>\
					<td id='company-row-"+aNewCompanies[i].companyId+"__name'>"+aNewCompanies[i].companyName+"</td>\
					<td id='company-row-"+aNewCompanies[i].companyId+"__shares'>"+aNewCompanies[i].companyShares+"</td>\
					<td id='company-row-"+aNewCompanies[i].companyId+"__share-price'>"+aNewCompanies[i].companySharePrice+"</td>\
				";

				$("#tbl-companies__body").append(row);
				aOldCompanies.push(aOldCompanies[0]);
			}
		}

		// 3. Update existing company rows
		for (var i = 0; i < aOldCompanies.length; i++) {
			if (aNewCompanies[i].companyId == aOldCompanies[i].companyId){
				if (
					aNewCompanies[i].companyId !== aOldCompanies[i].companyId ||
					aNewCompanies[i].companyName !== aOldCompanies[i].companyName ||
					aNewCompanies[i].companyShares !== aOldCompanies[i].companyShares ||
					aNewCompanies[i].companySharePrice !== aOldCompanies[i].companySharePrice
				) {
					
					var arrow = "";
					if (parseInt(aNewCompanies[i].companySharePrice) > parseInt(aOldCompanies[i].companySharePrice)) arrow = "<i class='fa fa-arrow-up fa-fw' aria-hidden='true'></i>";
					if (parseInt(aNewCompanies[i].companySharePrice) < parseInt(aOldCompanies[i].companySharePrice)) arrow = "<i class='fa fa-arrow-down fa-fw' aria-hidden='true'></i>";

					updateRow(aNewCompanies[i], arrow)
				}
			}
		}

		// 4. Save new company list
		aCompanies = aNewCompanies;
		$(".o-text--subtitle").html("There are <span class='o-text--bold'>"+ aCompanies.length + "</span> companies.");
	}
	// end of updateCompanies()

	// Updates the row
	// Updates the markup of a row of a given company
	function updateRow(jCompany, arrow) {
		$("#company-row-"+jCompany.companyId+"__id").html(jCompany.companyId)
		$("#company-row-"+jCompany.companyId+"__name").html(jCompany.companyName)
		$("#company-row-"+jCompany.companyId+"__shares").html(jCompany.companyShares)
		$("#company-row-"+jCompany.companyId+"__share-price").html(arrow + jCompany.companySharePrice)
	}
	
	// Redraws the entire table
	function showCompanies(aCompanies){
		iEditingItemIndex = null;
		$("#tbl-companies").css("display", "table");
		$("#tbl-companies__body").html("");
		$(".o-text--subtitle").html("There are <span class='o-text--bold'>"+ aCompanies.length + "</span> companies.");

		for (var i = 0; i < aCompanies.length; i++) {
			row = "\
				<tr data-id='{{company-id}}'>\
					<td id='company-row-{{company-id}}__id'>{{company-id}}</td>\
					<td id='company-row-{{company-id}}__name'>{{company-name}}</td>\
					<td id='company-row-{{company-id}}__shares'>{{company-shares}}</td>\
					<td id='company-row-{{company-id}}__share-price'>{{company-share-price}}</td>\
				";

			<?php if ($_SESSION['userRole'] == "admin") : ?>
				row += "\
					<td id='company-row-{{company-id}}__action'>\
						<a class='a-edit' href='#' data-id='{{company-id}}'>\
							<i class='fa fa-pencil fa-fw' aria-hidden='true'></i>Edit\
						</a>\
						<a class='a-delete o-text--error' data-id='{{company-id}}' href='#'>\
							<i class='fa fa-trash-o fa-fw' aria-hidden='true'></i>Delete\
						</a>\
					</td>\
				";
			<?php endif; ?>

			row += "\
				</tr>\
			"

			row = row.replace(/{{company-id}}/g, aCompanies[i].companyId); // replace all, not just first one
			row = row.replace("{{company-name}}", aCompanies[i].companyName);
			row = row.replace("{{company-shares}}", aCompanies[i].companyShares);
			row = row.replace("{{company-share-price}}", aCompanies[i].companySharePrice);
			
			$("#tbl-companies__body").append(row);
		}
	}

	// Display given error message in DOM
	function showError(sMessage){
		sOutputMessage = "<span class='o-text--bold'>Error! </span>";
		sOutputMessage += sMessage;
		sOutputMessage += " Check developer console for more information.";
		$("#error_msg").html(sOutputMessage);
	}

	/* Deleting Items*/
	/* Clicking on Delete*/
	$("body").on("click", ".a-delete", function(e){
		iId = $(this).data('id');
		deleteItem(iId);
	});

	function deleteItem(iId){
		$.ajax({
			"url": "<?php echo $config->sApiPath ?>?request=delete-company",
			"method": "get",
			"cache": false,
			"dataType": "json",
			"data": {
				"companyId": iId
			}
		}).done(function(jData){
			if (jData.iStatusCode == 200){
				$("tr[data-id="+iId+"]").remove();
			} else {
				console.log(jData);
				showError(jData.sMessage);
			}
		}).fail(function(err){
			console.log(err);
			showError("Something went wrong!");
		})
	}

	/* Editing Items*/
	/* Clicking on Edit*/
	$("body").on("click", ".a-edit", function(e){
		iId = $(this).data('id');
		editItem(iId);
	});

	// Editing an item
	function editItem(iId){

		console.log("Editing item...", iId);

		//1. reset iEditingItemIndex DOM (remove input fields)
		if (iEditingItemIndex !== null) {
			resetRowHtml(iEditingItemIndex, aCompanies);
		}

		iEditingItemIndex = iId;
		jCompany = null;

		//2. select current company
		jCompany = returnCompany(iId, aCompanies);

		console.log("Editing itme", jCompany);

		//3. Update dom
		sNameInputHtml = "\
			<input type='text' class='o-form--full-width' id='input-company-name-"+jCompany.companyId+"' value='"+jCompany.companyName+"'>\
		";
		sSharesInputHtml = "\
			<input type='text' class='o-form--full-width'  id='input-company-shares-"+jCompany.companyId+"' value='"+jCompany.companyShares+"'>\
		";
		sSharePriceHtml = "\
			<input type='text' class='o-form--full-width'  id='input-company-share-price-"+jCompany.companyId+"' value='"+jCompany.companySharePrice+"'>\
		";

		sActionHtml = "\
			<a class='a-save' href='#' data-id='"+jCompany.companyId+"'>\
				<i class='fa fa-floppy-o fa-fw' aria-hidden='true'></i>Save\
			</a>\
			<a class='a-cancel o-text--error' data-id='"+jCompany.companyId+"' href='#'>\
				<i class='fa fa-arrow-left fa-fw' aria-hidden='true'></i>Cancel\
			</a>\
		";

		$("#company-row-"+ iId+ "__name").html(sNameInputHtml);
		$("#company-row-"+ iId+ "__shares").html(sSharesInputHtml);
		$("#company-row-"+ iId+ "__share-price").html(sSharePriceHtml);
		$("#company-row-"+ iId+ "__action").html(sActionHtml);
	}

	/*Cancel editing*/
	/*Clicking on cancel*/
	$("body").on("click", ".a-cancel", function(e){
		iId = $(this).data('id');
		// console.log(iId);
		resetRowHtml(iId, aCompanies);
	});


	function resetRowHtml(iId, aCompanies){
		jCompany = returnCompany(iId, aCompanies);
		iEditingItemIndex = null;

		sAcitonHtml = "\
				<a class='a-edit' href='#' data-id='"+iId+"'>\
					<i class='fa fa-pencil fa-fw' aria-hidden='true'></i>Edit\
				</a>\
				<a class='a-delete o-text--error' data-id='"+iId+"' href='#'>\
					<i class='fa fa-trash-o fa-fw' aria-hidden='true'></i>Delete\
				</a>\
		";

		$("#company-row-"+ iId+ "__name").html(jCompany.companyName);
		$("#company-row-"+ iId+ "__shares").html(jCompany.companyShares);
		$("#company-row-"+ iId+ "__share-price").html(jCompany.companySharePrice);
		$("#company-row-"+ iId+ "__action").html(sAcitonHtml);
	}

	/*Save editing*/
	/*Clicking on save*/
	$("body").on("click", ".a-save", function(e){
		iId = $(this).data('id');
		iEditingItemIndex = null;
		saveCompany(iId);
		// resetRowHtml(iId);
	});

	function saveCompany(iId){
		sCompanyName = $("#input-company-name-"+jCompany.companyId).val();
		sCompanyShares = $("#input-company-shares-"+jCompany.companyId).val();
		sCompanySharePrice = $("#input-company-share-price-"+jCompany.companyId).val();

		// sent request to api
		$.ajax({
			"url": "<?php echo $config->sApiPath ?>?request=update-company",
			"method": "get",
			"cache": false,
			"dataType": "json",
			"data": {
				"companyId": iId,
				"companyName": sCompanyName,
				"companyShares": sCompanyShares,
				"companySharePrice": sCompanySharePrice
			}
		}).done(function(jData){
			//done
			if (jData.iStatusCode == 200) {
				showCompanies(jData.jPackage);
				aCompanies = jData.jPackage;
			} else {
				showError(jData.sMessage);
			}
		}).fail(function(err){
			console.log(err);
			showError("Something went wrong.")
			//error
		})


		// reset dom
	}

	/*Create new company*/
	/*Clicking on create*/
	$("body").on("click", ".a-create", function(e){
		sCompanyName = $("#input-new-company__name").val();
		sCompanyShares = $("#input-new-company__shares").val();
		sCompanySharePrice = $("#input-new-company__share-price").val();
		
		$.ajax({
			"url": "<?php echo $config->sApiPath ?>?request=create-company",
			"method": "get",
			"cache": false,
			"dataType": "json",
			"data": {
				"companyName": sCompanyName,
				"companyShares": sCompanyShares,
				"companySharePrice": sCompanySharePrice
			}
		}).done(function(jData){
				if (jData.iStatusCode == 200){
					// success
					aCompanies = jData.jPackage;
					showCompanies(jData.jPackage);
					$("#input-new-company__name").val("");
					sCompanyShares = $("#input-new-company__shares").val("");
					sCompanySharePrice = $("#input-new-company__share-price").val("");

				} else {
					showError(jData.sMessage);
				}
			}).fail(function(err){
				//fail
				console.log(err);
				showError("Something went wrong.");
			})
	});

	// Returns a company with given ID
	function returnCompany(iId, aCompanies){
		console.log("returncompany receives this id", iId);
		console.log("iId", iId);
		console.log("aCompanies", aCompanies);
		for (var i = 0; i < aCompanies.length; i++) {
			if (aCompanies[i].companyId == iId) {
				console.log("I found something");
				return aCompanies[i];
			}
		}
		console.log("I found nothing");
		return null;
	}

	// Refresh site every second if user is customer
	<?php if ($_SESSION['userRole'] == 'customer') : ?>
		setInterval(function(){
			fetchCompanies(false);
		}, 1000);
	<?php endif; ?>

</script>

