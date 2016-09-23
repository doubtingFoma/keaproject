<!-- config.php containing basic settings of the application -->
<?php  
	class AppConfig {
		// Site properties
		public $sSiteTitle = "Stock Exchange";

		// Components
		public $sRouterPath = "config/router.php";
		public $sApiPath = "webapi/webapi.php";

		// URL parameters
		public $sUrlVarPage = "page";
		public $sUrlVarRequest = "request";
	}

	$config = new AppConfig();
?>