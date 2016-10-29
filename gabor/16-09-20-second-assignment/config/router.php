<!-- router.php containing routing information -->
<!-- To create a new page, create a new Page object and add it to the aPages array. That's it! -->
<!-- Add additional restrictions for specific users (admins or customers) if you want. -->
<?php

	// 1. Page list
	class Page {
		public $sPageName;
		public $sPageUrl = "pages/";
	}

	$pLoginPage = new Page();
	$pLoginPage->sPageName = "login";
	$pLoginPage->sPageUrl .= "page.login.php";

	$pSignupPage = new Page();
	$pSignupPage->sPageName = "signup";
	$pSignupPage->sPageUrl .= "page.signup.php";

	$pHomePage = new Page();
	$pHomePage->sPageName = "home";
	$pHomePage->sPageUrl .= "page.home.php";

	$pUsersPage = new Page();
	$pUsersPage->sPageName = "users";
	$pUsersPage->sPageUrl .= "page.users.php";

	$aPages = array($pLoginPage, $pSignupPage, $pHomePage, $pUsersPage);

	// 2. Define requested page - set a default and change it to requested if set
	$pPage = new Page();
	$pPage = $aPages[0]; // Login by default

	if (isset($_GET[$config->sUrlVarPage])) {
		for ($i=0; $i < sizeof($aPages); $i++) { 
			if ($aPages[$i]->sPageName == $_GET[$config->sUrlVarPage]) {
				$pPage = $aPages[$i];
			}
		}
	}

	// 3. Access control - redirecting users
	// Redirect user according to their role if user is logged in. Otherwise log them out and redirect to Login
	$bUserLoggedIn = isset($_SESSION['userId']) && isset($_SESSION['userRole']);
	if ($bUserLoggedIn) {
		switch ($_SESSION['userRole']) {
			
			// Redirecting admins 
			case "admin":
				switch (true) {
					// Signup or Login -> Home
					case ($pPage === $pLoginPage || $pPage === $pSignupPage):
						$pPage = $pHomePage;
						break;
				}
				break;
			
			// Redirecting customers
			case "customer":
				switch(true) {
					// Signup or Login -> Home
					case ($pPage === $pLoginPage || $pPage === $pSignupPage):
						$pPage = $pHomePage;
						break;
					// Users -> Home
					case ($pPage === $pUsersPage):
						$pPage = $pHomePage;
						break;
				}
				break;
			
			// Unknown role
			// Log user out -> Login
			default:
				session_destroy();
				$pPage = $pLoginPage;
		}
	} else {
		// Session credentals don't exist or are corrupted
		// Log user out
		session_destroy();
		if ($pPage !== $pSignupPage) {
			$pPage = $pLoginPage;
		}
	}
?>

