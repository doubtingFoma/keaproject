<!-- config.php containing basic settings of the application -->
<?php  
	class AppConfig {
		// Site properties
		public $sSiteTitle = "Stock Exchange";

		// Components
		public $sRouterPath = "router/router.php";
		public $sApiPath = "webapi/api.php";

		// URL parameters
		public $sUrlVarPage = "page";
	}

	$config = new AppConfig();
?>