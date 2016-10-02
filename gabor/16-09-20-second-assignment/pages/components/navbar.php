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
				<li class='c-navbar__menu-item'><a href="index.php?page=home">Home</a></li>
				<?php if ($_SESSION['userRole'] == 'admin') : ?>
				<li class='c-navbar__menu-item'><a href="index.php?page=users">Users</a></li>
				<?php endif; ?>
				<li class='c-navbar__menu-item'><a href="" id="navbar__logout">Logout</a></li>
			</ul>
		</div>
	</div>
</div>

<script>
	// Log user out 
	$("#navbar__logout").click(function(e){
		var link = '<?php echo $config->sApiPath ?>?request=logout';
		console.log(link);
		$.ajax({
			"url": link,
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