<!-- router.php containing routing information - add new pages here -->
<?php

	// 1. Page list
	class Page {
		public $sPageName;
		public $sPageUrl = "pages/";
	}

	$pLoginPage = new Page();
	$pLoginPage->sPageName = "login";
	$pLoginPage->sPageUrl .= "page.login.php";

	$pHomePage = new Page();
	$pHomePage->sPageName = "home";
	$pHomePage->sPageUrl .= "page.home.php";

	$pUsersPage = new Page();
	$pUsersPage->sPageName = "users";
	$pUsersPage->sPageUrl .= "page.users.php";

	$aPages = array($pLoginPage, $pHomePage, $pUsersPage);

	// 2. Define requested page
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
	$bUserLoggedIn = isset($_SESSION['userId']) && isset($_SESSION['userRole']);
	if ($bUserLoggedIn) {
		switch ($_SESSION['userRole']) {
			// Redirecting admins 
			case "admin":
				switch (true) {
					case ($pPage === $sLoginPage):
						$pPage = $sHomePage;
						break;
				}
			// Redirecting customers
			case "customer":
				switch(true) {
					case ($pPage === $pLoginPage):
						$pPage = $sHomePage;
						break;
					case ($pPage === $sUsersPage):
						$pPage = $sHomePage;
						break;
				}
		}
	} else {
		// Session credentals don't exist or are corrupted
		// Log user out
		session_destroy();
		switch (true) {
			case ($pPage !== $pLoginPage):
				$pPage = $pLoginPage;
				break;
		}
	}
?>

