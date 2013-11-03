<?php

define('IN_CMS', true); //For textile
define('CMS_VERSION', '0.0.1');
define('CMS_ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);

require_once(CMS_ROOT. DS .'config.php');

//Actual logic is here
require_once ( CMS_ROOT. DS . 'includes/post.php');
require_once ( CMS_ROOT. DS . 'includes/shortcodes_prep.php');
require_once ( CMS_ROOT. DS . 'includes/formatting_prep.php'); 
require_once ( CMS_ROOT. DS . 'includes/classTextile.php');		//from wolfcms
require_once ( CMS_ROOT. DS . 'includes/cache.php');
require_once ( CMS_ROOT. DS . 'wp-includes/shortcodes.php');      //from wordpress
require_once ( CMS_ROOT. DS . 'wp-includes/formatting.php');      //from wordpress
require_once ( CMS_ROOT. DS . 'includes/basicfunctions.php');
require_once ( TEMPLATEPATH . 'functions.php');
require_once ( CMS_ROOT. DS . 'main.php');

main();

?>
