<?
define("BX_USE_MYSQLI", true);
define("DBPersistent", false);
$DBType = "mysql";
$DBHost = "localhost";
$DBLogin = "mega-hockey";
$DBPassword = "U1y0X7r7";
$DBName = "market";
$DBDebug = true;
$DBDebugToFile = false;
define("MYSQL_TABLE_TYPE", "INNODB");

define("DELAY_DB_CONNECT", true);
define("CACHED_b_file", 3600);
define("CACHED_b_file_bucket_size", 10);
define("CACHED_b_lang", 3600);
define("CACHED_b_option", 3600);
define("CACHED_b_lang_domain", 3600);
define("CACHED_b_site_template", 3600);
define("CACHED_b_event", 3600);
define("CACHED_b_agent", 3660);
define("CACHED_menu", 3600);

define("BX_UTF", true);
define("BX_FILE_PERMISSIONS", 0644);
define("BX_DIR_PERMISSIONS", 0755);
@umask(~BX_DIR_PERMISSIONS);
define("BX_DISABLE_INDEX_PAGE", true);

//define('BX_CRONTAB_SUPPORT', true);
define("BX_CRONTAB_SUPPORT", false);
define("BX_CRONTAB", false);

$_SERVER["SERVER_PORT"] = "443";
?>