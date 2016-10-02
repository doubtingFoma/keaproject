<!-- Navbar -->
<?php include_once "components/navbar.php"; ?>

<!-- Home  -->
<div class="o-wrapper o-wrapper--navbar o-grid ">
	<div class="o-wrapper__content">
		<h1><i class="fa fa-home fa-fw" aria-hidden="true"></i><?php echo $pPage->sPageName ?></h1>
		<p class="o-text--subtitle"></p>
		<p id="error_msg" class='o-text--error'></p>
		<table id="tbl-companies" style="display: none;">
			<thead>
				<tr>
					<th>Company ID</th>
					<th>Company Name</th>
					<th>Company Shares</th>
					<th>Company Share Price</th>
					<th>Action</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<!-- Get companies on page load - output error message if fails -->
<!-- Loading companies -->
<script>
	$.ajax({
		"url": "<?php echo $config->sApiPath ?>?request=get-companies",
		"method": "get",
		"cache": false,
		"dataType": "json",
	}).done(function(data){
		if (data.iStatusCode == 200){
			// Succesful request
			showCompanies(data.jPackage);
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

	function showCompanies(aCompanies){
		$("#tbl-companies").css("display", "table");
		$(".o-text--subtitle").text("There are " + aCompanies.length + " companies.");
		for (var i = 0; i < aCompanies.length; i++) {
			row = "\
				<tr data-id='{{company-id}}'>\
					<td>{{company-id}}</td>\
					<td>{{company-name}}</td>\
					<td>{{company-shares}}</td>\
					<td>{{company-share-price}}</td>\
					<td>\
						<a class='a-edit' href='#' data-id='{{company-id}}'>\
							<i class='fa fa-pencil fa-fw' aria-hidden='true'></i>Edit\
						</a>\
						<a class='a-delete' data-id='{{company-id}}' href='#'>\
							<i class='fa fa-trash-o fa-fw' aria-hidden='true'></i>Delete\
						</a>\
					</td>\
				</tr>\
			";

			row = row.replace(/{{company-id}}/g, aCompanies[i].companyId); // replace all, not just first one
			row = row.replace("{{company-name}}", aCompanies[i].companyName);
			row = row.replace("{{company-shares}}", aCompanies[i].companyShares);
			row = row.replace("{{company-share-price}}", aCompanies[i].companySharePrice);
			
			$("#tbl-companies").append(row);
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
</script>

