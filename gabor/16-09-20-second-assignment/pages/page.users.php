<!-- Navbar -->
<?php include_once "components/navbar.php"; ?>

<!-- Users  -->
<div class="o-wrapper o-wrapper--navbar o-grid ">
	<div class="o-wrapper__content">
		<h1><i class="fa fa-user fa-fw" aria-hidden="true"></i><?php echo $pPage->sPageName ?></h1>
		<p class='o-text--subtitle'></p>
		<p id="error_msg" class='o-text--error'></p>
		<table id="tbl-users" style="display: none;">
			<thead>
				<tr>
					<th>User ID</th>
					<th>User name</th>
					<th>User e-mail</th>
					<th>Role</th>
					<th>Registration date</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<!-- Get users on page load - output error message if fails -->
<script>
	$.ajax({
		"url": "<?php echo $config->sApiPath ?>?request=get-users",
		"method": "get",
		"cache": false,
		"dataType": "json",
	}).done(function(data){
		if (data.iStatusCode == 200){
			// Succesful request
			showUsers(data.jPackage);
		} else {
			// Request not OK
			showError(data.sMessage);
		}
	}).fail(function(err){
		// Request Failed
		showError(data.sMessage);
	});

	function showUsers(aUsers){
		$("#tbl-users").css("display", "table");
		$(".o-text--subtitle").text("There are " + aUsers.length + " users.");
		for (var i = 0; i < aUsers.length; i++) {
			row = "\
				<tr>\
					<td>{{user-id}}</td>\
					<td>{{user-name}}</td>\
					<td>{{user-email}}</td>\
					<td>{{user-role}}</td>\
					<td>{{user-regdate}}</td>\
				</tr>\
			";

			row = row.replace("{{user-id}}", aUsers[i].userId);
			row = row.replace("{{user-name}}", aUsers[i].userName);
			row = row.replace("{{user-email}}", aUsers[i].userEmail);
			row = row.replace("{{user-role}}", aUsers[i].userRole);
			row = row.replace("{{user-regdate}}", aUsers[i].userRegDate);
			
			$("#tbl-users").append(row);
		}
	}

	function showError(sMessage){
		sMessage += " Check developer console for more information.";
		$("#error_msg").text(sMessage);
	}
</script>
