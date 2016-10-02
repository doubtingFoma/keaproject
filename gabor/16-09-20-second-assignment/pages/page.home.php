<!-- Navbar -->
<?php include_once "components/navbar.php"; ?>

<!-- Home  -->
<div class="o-wrapper o-wrapper--navbar o-grid ">
	<div class="o-wrapper__content">
		<div class="o-grid o-grid--valign-bottom o-grid--align-between c-title-bar">
			<h1><i class="fa fa-home fa-fw" aria-hidden="true"></i><?php echo $pPage->sPageName ?> of companies</h1>
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
	</div>
</div>

<!-- Get companies on page load - output error message if fails -->
<!-- Loading companies -->
<script>

	// Globals
	iEditingItemIndex = null;
	aCompanies = [];


	// On Page load
	$.ajax({
		"url": "<?php echo $config->sApiPath ?>?request=get-companies",
		"method": "get",
		"cache": false,
		"dataType": "json",
	}).done(function(data){
		if (data.iStatusCode == 200){
			// Succesful request
			showCompanies(data.jPackage);
			aCompanies = data.jPackage;
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

	
	// Functions
	function showCompanies(aCompanies){
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
		//1. reset iEditingItemIndex DOM (remove input fields)
		if (iEditingItemIndex !== null) {
			resetRowHtml(iEditingItemIndex);

		}

		iEditingItemIndex = iId;
		jCompany = null;

		//2. select current company
		jCompany = returnCompany(iId);


		//3. Update dom
		sNameInputHtml = "\
			<input type='text' id='input-company-name-"+jCompany.companyId+"' value='"+jCompany.companyName+"'>\
		";
		sSharesInputHtml = "\
			<input type='text' id='input-company-shares-"+jCompany.companyId+"' value='"+jCompany.companyShares+"'>\
		";
		sSharePriceHtml = "\
			<input type='text' id='input-company-share-price-"+jCompany.companyId+"' value='"+jCompany.companySharePrice+"'>\
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
		resetRowHtml(iId);
	});


	function resetRowHtml(iId){
		jCompany = returnCompany(iId);

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

	// Returns a company with given ID
	function returnCompany(iId){
		for (var i = 0; i < aCompanies.length; i++) {
			if (aCompanies[i].companyId == iId) {
				return aCompanies[i];
			}
		}
		return null;
	}
</script>

