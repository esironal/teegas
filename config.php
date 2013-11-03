<?php 

ini_set('error_reporting', E_ALL);

// Database settings - Need configuration before using it - start ---------------------
define('SITETITLE', 'Site Title Comes Here');
define('URL_PUBLIC', 'http://localhost/');
define('HOMEPAGE', 'home');
define('ERROR404', '404error');
define('THEME', 'default');
define('CACHE_EXPIRE', '600'); //10 minutes

// Google spreadsheet key
define('GSSKEY','0Ag8W6HkMW5S6dHhmdmZoOFhlbHY2ajlyQy1CSm9jaXc'); //demo spreadsheet
define('GSSSHEETID', 'od6');
define('GSSSHEETGID', '0');

//Disqus
define('DISQUS_SHORTNAME','disqus shortname here');

// Database settings - Need configuration before using it - end -----------------------

define('DEFAULTTHEME', 'default');

// PHP error messages for debugging?
define('DEBUG', false);

//
define('USE_MOD_REWRITE', true);

// Set the timezone of your choice.
define('DEFAULT_TIMEZONE', 'Asia/Tokyo');

$changedurl = str_replace('://', '|||', URL_PUBLIC);
$firstslash = strpos($changedurl, '/');

if (false === $firstslash) {
    define('URI_PUBLIC', '/');
} else {
    define('URI_PUBLIC', substr($changedurl, $firstslash));
}

define('BASE_URL', URL_PUBLIC . (substr(URL_PUBLIC,-1,1)== '/' ? '': '/') . (USE_MOD_REWRITE ? '': '?'));
define('BASE_URI', URI_PUBLIC . (substr(URI_PUBLIC,-1,1)== '/' ? '': '/') . (USE_MOD_REWRITE ? '': '?'));
defined('THEMES_ROOT')  or define('THEMES_ROOT', CMS_ROOT . DS . 'themes'.DS. THEME .DS); 
defined('THEMES_URI')   or define('THEMES_URI', URI_PUBLIC . 'themes/'. THEME  . '/'); 
defined('TEMPLATEPATH') or define('TEMPLATEPATH', THEMES_ROOT . 'templates' . DS );
defined('DEFAULT_TEMPLATEPATH')  or define('DEFAULT_TEMPLATEPATH', CMS_ROOT . DS.'themes'.DS. 'DEFAULTTHEME' .DS); 
defined('CACHEPATH')    or define('CACHEPATH', CMS_ROOT. DS . 'cache' . DS );
defined('URL_SUFFIX')   or define('URL_SUFFIX', '');

date_default_timezone_set(DEFAULT_TIMEZONE);

?>
