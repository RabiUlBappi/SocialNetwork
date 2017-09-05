<?php  

	// Define the core paths
	// Defin as absolute paths to make that require_once works  as expected

	// DIRECTORY_SEPARATOR is a PHP pre-defined constant
	// (\ for windows, / for unix)

	defined("DS") ? null : define('DS', '/');//DIRECTORY_SEPARATOR);

	defined('SITE_ROOT') ? null : 
		define('SITE_ROOT', 'C:'.DS.'xampp'.DS.'htdocs'.DS.'SocialNetwork');

	defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

	defined('RESOURCE_PATH') ? null : define('RESOURCE_PATH', DS.'SocialNetwork'.DS.'resources');


	// load config file first
	require_once(SITE_ROOT.DS."public".DS."config.php");

	// load basic functions next so that everythig after can use them
	require_once(LIB_PATH.DS."functions.php");

	// load core objects
	require_once(LIB_PATH.DS."database.php");
	require_once(LIB_PATH.DS."database_object.php");
	require_once(LIB_PATH.DS."session.php");
	//require_once(LIB_PATH.DS."pagination.php");

	// load database related classes
	require_once(LIB_PATH.DS."user.php");
	//require_once(LIB_PATH.DS."photograph.php");


?>