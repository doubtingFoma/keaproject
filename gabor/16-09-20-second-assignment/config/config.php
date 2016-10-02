<?php  
// config.php containing basic settings of the application
	class AppConfig {
		// Site properties
		public $sSiteTitle = "Stock Exchange Simulator";

		// Components
		public $sRouterPath = "config/router.php";
		public $sApiPath = "webapi/webapi.php";

		public $sDatabaseUsersPath = "database/users.json";
		public $sDatabaseCompaniesPath = "database/companies.json";

		// URL parameters
		public $sUrlVarPage = "page";
		public $sUrlVarRequest = "request";
	}

	$config = new AppConfig();
?>