<div class="o-wrapper o-grid">
	<div class="o-grid o-grid--centered">
		<div class="o-grid o-grid--vertical o-grid--valign-center">
			<!-- Login Card -->
			<div class="c-login-box c-login-box__elem">
				<div class="o-grid__content--comf">
					<img src="https://s.ytimg.com/yts/img/avatar_720-vflYJnzBZ.png" alt="Stock Exchange Simulator" class="c-login-box__logo c-login-box__logo--circled">
					<h1 class="c-login-box__elem">Create a new account</h1>
					<p class="c-login-box__elem">Creating a new account is free. Your password will be encrypted with sha256.</p>
					<form action="" id="signup-form" class="o-grid o-grid--vertical c-login-box__elem">

						<!-- User name -->
						<label>Your user name will be visible for other players</label>
						<input type="text" placeholder="Enter user name..." class="c-login-box__elem" id="signup-form__username" required="required">

						<!-- Email address -->
						<label>Your e-mail address will not be public</label>
						<input type="email" placeholder="Enter e-mail address..." class="c-login-box__elem" id="signup-form__email" required="required">

						<!-- Password 1x -->
						<label>Choose a safe password</label>
						<input type="password" placeholder="Enter password..." class="c-login-box__elem" id="signup-form__password1" required="required">

						<!-- Password 2x -->
						<label>Please re-type your password</label>
						<input type="password" placeholder="Enter password again..." class="c-login-box__elem" id="signup-form__password2" required="required">

						<!-- Submit -->
						<button class="button--success"><i class="fa fa-plus fa-fw c-login-box__fa" aria-hidden="true"></i>Create new account</button>
					</form>
					<p class="c-login-box__invalid-text"></p>
					<p class="o-text--last-paragraph"><a href="index.php?page=login">...or log in.</a></p>
				</div>
			</div>
			<!-- Login Meta Information -->
			<p class="c-login-box__meta">Second mandatory assignment for Web Development KEA 2016 Fall. Please check out the project on <a href="https://github.com/gaboratorium/keaproject" target="_blank">GitHub</a> for more information. <span class="o-text--block">Gábor Pintér</span></p>
		</div>
	</div>
</div>

<!-- Send login request to webapi on form submit -->
<script>
	$("#signup-form").submit(function(e){
		e.preventDefault();


		var sUserName = $("#signup-form__username").val();
		var sUserEmail = $("#signup-form__email").val();
		var sUserPassword = $.sha256($("#signup-form__password1").val());
		var sUserPassword2 = $.sha256($("#signup-form__password2").val());

		if (sUserPassword !== sUserPassword2) {
			alertWrongSignup("Your passwords do not match.")
		} else {
			sendRegistrationRequest(sUserName, sUserEmail, sUserPassword);
		}
	})

	// Ajax call for registration request
	function sendRegistrationRequest(sUserName, sUserEmail, sUserPassword){
		$.ajax({
			"url": '<?php echo $config->sApiPath ?>?request=signup',
			"method": "get",
			"cache": false,
			"dataType": "json",
			"data": {
				"sUserName": sUserName,
				"sUserEmail": sUserEmail,
				"sUserPassword": sUserPassword
			}
		}).done(function(data){
			if (data.iStatusCode == 403 || data.iStatusCode == 400) {
				console.log(data);
				alertWrongSignup(data.sMessage);
			} else if (data.iStatusCode == 200) {
				console.log(data);
				alertSuccesfulSignup();
			}
		}).fail(function(err){
			console.log("Error: ", err);
			alertWrongLogin();
		})
	}

	// Registration denied
	function alertWrongSignup(sErrorMessage = "Something went wrong. Check developer console for more info."){
		$(".c-login-box__invalid-text").text(sErrorMessage);
	}

	// Registration succesful
	function alertSuccesfulSignup(){
		$(".c-login-box > div").html("Your account has been succesfully created. <span class='o-text--block'><a href='index.php?page=login'>You can log in now.</a></span>");
	}
</script>