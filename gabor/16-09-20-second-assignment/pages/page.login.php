<div class="o-wrapper o-grid">
	<div class="o-grid o-grid--centered">
		<div class="o-grid o-grid--vertical o-grid--valign-center">
			<!-- Login Card -->
			<div class="c-login-box c-login-box__elem">
				<div class="o-grid__content--comf">
					<h1 class="c-login-box__elem">Welcome to <span class="o-text--block o-text--bold"><?php echo $config -> sSiteTitle ?></span></h1>
					<p class="c-login-box__elem">Play with virtual money, practice your trading skills and become the richest broker!</p>
					<form action="" id="login-form" class="o-grid o-grid--vertical c-login-box__elem">
						<input type="text" placeholder="Enter username..." class="c-login-box__elem" id="login-form__username">
						<input type="password" placeholder="Enter password..." class="c-login-box__elem" id="login-form__password">
						<button class="button--primary"><i class="fa fa-sign-in fa-fw c-login-box__fa" aria-hidden="true"></i>Sign in</button>
					</form>
					<p class="o-text--last-paragraph">Doesn't have an account yet? <span class="o-text--bold">Sign up now!</span></p>
				</div>
			</div>
			<!-- Login Meta Information -->
			<p class="c-login-box__meta">Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a href="?page=home">Google</a> Optio odio consequuntur ipsam non nam velit, dicta! Eveniet velit optio, tempore autem, sed, amet qui ducimus sequi et, perferendis at quas.</p>
		</div>
	</div>
</div>

<!-- Send login request to webapi on form submit -->
<script>
	$("#login-form").submit(function(e){
		e.preventDefault();
		var sUserName = $("#login-form__username").val();
		var sUserPassword = $.sha256($("#login-form__password").val());

		$.ajax({
			"url": '<?php echo $config->sApiPath ?>?request=login',
			"method": "get",
			"cache": false,
			"dataType": "json",
			"data": {
				"sUserName": sUserName,
				"sUserPassword": sUserPassword
			}
		}).done(function(data){
			console.log(data);
		}).fail(function(err){
			console.log("Error: ", err);
		})
	})
</script>