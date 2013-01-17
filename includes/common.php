<?php
defined('DOCUMENT_ROOT')
    || define('DOCUMENT_ROOT', realpath(dirname(__FILE__)));
	
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

defined('LOG_PATH')
	|| define('LOG_PATH', realpath(DOCUMENT_ROOT . '/logs'));

set_include_path(implode(PATH_SEPARATOR, array(
    realpath(DOCUMENT_ROOT . '/scriptLibrary/'),
    get_include_path(),
)));


define("LOG_FILE", date("Y_m_d") . ".txt");

if (APPLICATION_ENV == 'development') {
	define("SHOW_DEBUG", false);
	define("STORE_DEBUG", true);
	
	ini_set("error_reporting",E_ALL);
	ini_set("display_errors",true);
	
	define('DB_SETTINGS', serialize(array("host"=>"localhost",
					"user"=>"hansa-search",
					"pass"=>"idalatob",
					"db"=>"hansa_search"))
		   );
} else {
	define("SHOW_DEBUG", true);
	define("STORE_DEBUG", true);
	
	define('DB_SETTINGS', serialize(array(
					"host"=>"dedi47.cpt3.host-h.net",
					"user"=>"hansaudqqp_1",
					"pass"=>"APPq8zm8",
					"db"=>"hansaudqqp_db1"))
		   );
}

function debug($string = "empty") {
	$file = "unknown";
	$line = 0;
	$backtrace = debug_backtrace();
	if (isset($backtrace[0]["file"])) {
		$file = basename($backtrace[0]["file"]);
	}
	if (isset($backtrace[0]["line"])) {
		$line = $backtrace[0]["line"];
	}
	$dbString = "[" . date("Y-m-d H:i:s") . "]";
	$dbString .= "[" . $file . ":" . $line . "]";
	$dbString .= " " . $string . "\n";
	if (SHOW_DEBUG) {
		echo($dbString);
	}
	
	if (STORE_DEBUG) {
		$fh = fopen(LOG_PATH . "/" . LOG_FILE, "a+");
		fwrite($fh, $dbString);
		fclose($fh);
	}
}

function hasError($stderr) {
		$REGEX_ERRORS = '/.*(Error|Permission denied|could not seek to position|Invalid data found when processing input|Invalid pixel format|Unknown encoder|could not find codec|does not contain any stream).*/i';
		preg_match($REGEX_ERRORS, $stderr, $matches);
		if (empty($matches)) {
			return false;
		}
		return true;
}


