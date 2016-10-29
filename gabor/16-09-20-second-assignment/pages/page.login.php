<div class="o-wrapper o-grid">
	<div class="o-grid o-grid--centered">
		<div class="o-grid o-grid--vertical o-grid--valign-center">
			<!-- Login Card -->
			<div class="c-login-box c-login-box__elem">
				<div class="o-grid__content--comf">
					
					<!-- Logo -->
					<img src="http://image.prntscr.com/image/489b77ecd2a54ab2992dc7a233e28d4c.png" alt="Stock Exchange Simulator" class="c-login-box__logo">

					<!-- Title -->
					<h1 class="c-login-box__elem">Welcome to <span class="o-text--block o-text--bold"><?php echo $config -> sSiteTitle ?></span></h1>

					<!-- Description -->
					<p class="c-login-box__elem">Play with virtual money, practice your trading skills and become the richest broker!</p>

					<!-- Login form -->
					<form action="" id="login-form" class="o-grid o-grid--vertical c-login-box__elem">
						
						<!-- E-mail -->
						<input type="email" placeholder="Enter e-mail address..." class="c-login-box__elem" id="login-form__email" required="required">

						<!-- Password -->
						<input type="password" placeholder="Enter password..." class="c-login-box__elem" id="login-form__password" required="required">

						<!-- Submit -->
						<button class="button--primary"><i class="fa fa-sign-in fa-fw c-login-box__fa" aria-hidden="true"></i>Sign in</button>
					</form>

					<!-- Error message, forgot passwrod, and create account -->
					<p class="o-text--error"></p>
					<p id="forgot-password"><a href="#">Forgot password?</a></p>
					<p class="o-text--last-paragraph o-text--bold"><a href="index.php?page=signup">Create new account</a></p>
				</div>
			</div>

			<!-- Login Meta Information -->
			<p class="c-login-box__meta">Second mandatory assignment for Web Development KEA 2016 Fall. Please check out the project on <a href="https://github.com/gaboratorium/keaproject" target="_blank">GitHub</a> for more information. <span class="o-text--block">Gábor Pintér</span></p>
		</div>
	</div>
</div>

<!-- Send login request to webapi on form submit -->
<script>
	$("#login-form").submit(function(e){

		// Prevent default, get values
		e.preventDefault();
		var sUserEmail = $("#login-form__email").val();
		var sUserPassword = $.sha256($("#login-form__password").val());
		console.log("something");

		// Make ajax call
		$.ajax({
			"url": '<?php echo $config->sApiPath ?>?request=login',
			"method": "get",
			"cache": false,
			"dataType": "json",
			"data": {
				"sUserEmail": sUserEmail,
				"sUserPassword": sUserPassword
			}
		}).done(function(data){
			if (data.iStatusCode == 200) {
				console.log("success,", data);
				logUserIn();
			} else {
				console.log("else,", data);
				showErrorMessage("Oh snap! The user name or password is incorrect.");
			}
		}).fail(function(err){
			console.log("fail,", data);
			console.log("Error: ", err);
			showErrorMessage("Oh snap! The user name or password is incorrect.");
		})
	})

	// Trigger forgot password
	$("#forgot-password").click(function(e){
		e.preventDefault();
		showErrorMessage("Too bad. There is nothing I can do at this point.");
	})

	
	// Login callback
	function logUserIn(){
		window.location.href = 'index.php?page=<?php echo $pLoginPage->sPageName ?>';
	}

	// Wrong login call back
	function showErrorMessage(sMessage){
		$(".o-text--error").text(sMessage);
	}
</script>