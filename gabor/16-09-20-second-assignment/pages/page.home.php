<!-- Navigation bar -->
<div class="o-grid c-navbar">
	<div class="o-grid">
		<div class="o-grid__content o-grid o-grid--valign-center">
			<a href="index.php?page=<?php echo $pHomePage->sPageName ?>">
				<h1 class="c-navbar__title"><?php echo $config -> sSiteTitle ?></h1>
			</a>
		</div>
	</div>
	<div class="o-grid">
		<div class="o-grid__content o-grid o-grid--align-right o-grid--valign-center">
			<ul class="o-list--horizontal">
				<li class='c-navbar__menu-item'><a href="">Home</a></li>
				<li class='c-navbar__menu-item'><a href="">Users</a></li>
				<li class='c-navbar__menu-item'><a href="" id="navbar__logout">Logout</a></li>
			</ul>
		</div>
	</div>
</div>

<script>
	// Log user out 
	$("#navbar__logout").click(function(e){
		$.ajax({
			"url": '<?php echo $config->sApiPath ?>?request=logout',
			"method": "get",
			"cache": false,
			"dataType": "json",
			"data": {
				// Data to send
			}
		}).done(function(jData){
			console.log(jData);
		}).fail(function(jData){
			// Fail
			console.log(jData);
		})
	});
</script>

<!-- Home  -->
<div class="o-wrapper o-wrapper--navbar o-grid ">
	<div class="o-wrapper__content">
		<h1><?php echo $pPage->sPageName ?></h1>
		<div class="o-grid o-grid__content--vertical">
			<div class="o-grid">
				<p>Left side</p>
			</div>
			<div class="o-grid o-grid--align-right">
				<button class="button--success button--small">Create new company</button>
			</div>
		</div>
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>E-mail</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
			</thead>
			<tr>
				<td>Table cell 1</td>
				<td>Table cell 2</td>
				<td>Table cell 3</td>
				<td>Table cell 4</td>
			</tr>
			<tr>
				<td>Table cell 1</td>
				<td>Table cell 2</td>
				<td>Table cell 3</td>
				<td>Table cell 4</td>
			</tr>
			<tr>
				<td>Table cell 1</td>
				<td>Table cell 2</td>
				<td>Table cell 3</td>
				<td>Table cell 4</td>
			</tr>
		</table>
	</div>
</div>