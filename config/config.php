<?php

if($_SERVER['SERVER_NAME'] == 'localhost')
{
	$base_folder_name = "inventory/";//LEAVE IT EMPTY FOR THE ROOT
	define('_DB_USER', "root");
	define('_DB_PASS', "");
	define('_DB_NAME', "hotelreservation");
	define('_DB_HOST', "localhost");
}
else
{
	$base_folder_name = ""; 
	define('_DB_USER', "easystay_syedali");
	define('_DB_PASS', "hk45@AE$#65");
	define('_DB_NAME', "easystay_pk_db_easystay");
	define('_DB_HOST', "localhost");
}

error_on();
error_off();

define('APP_TITLE', "Easy Stay", true);
define('DEFAULT_CONTROLLER', "hildes", true);

//Whether or use the session
define('_SESSION', true);


//dont edit these

define('BASEURL',trim("/$base_folder_name"), true);

define('_EXT', ".php");
define('_PS', "/");

define('CSS', "/".$base_folder_name."resources/assets/css/", true);
define('IMG', "/".$base_folder_name."resources/images/", true);
define('VENDOR', "/".$base_folder_name."resources/vendors/", true);
define('JS', "/".$base_folder_name."resources/assets/js/", true);
define('UPLOADS', "/".$base_folder_name."resources/uploads/", true);
define('AJAX', "/".$base_folder_name."resources/ajax/", true);
define('INVOICES', "/".$base_folder_name."resources/invoices/", true);
define('REPORT', "/".$base_folder_name."resources/reports/", true);

// Client System

define('CLIENT_CSS', "/".$base_folder_name."resources/assets/client/css/", true);
define('CLIENT_JS', "/".$base_folder_name."resources/assets/client/js/", true);
define('CLIENT_IMAGES', "/".$base_folder_name."resources/assets/client/images/", true);
define('CLIENT_VENDOR', "/".$base_folder_name."resources/assets/client/vendor/", true);
define('CLIENT_AJAX', "/".$base_folder_name."resources/assets/client/ajax/", true);

define('LANDING_CSS', "/".$base_folder_name."resources/assets/landing/css/", true);
define('LANDING_JS', "/".$base_folder_name."resources/assets/landing/js/", true);
define('LANDING_IMAGES', "/".$base_folder_name."resources/assets/landing/img/", true);
// define('LANDING_VENDOR', "/".$base_folder_name."resources/assets/landing/vendor/", true);
// define('LANDING_AJAX', "/".$base_folder_name."resources/assets/landing/ajax/", true);


if(_SESSION){if(!session_id()){session_start();$_SESSION['uniq']="\x4D\x20\x41\x62\x75\x20\x42\x61\x6b\x61\x72\x20\x4B\x68\x61\x6E";}ob_start();}else{ob_start();}
?>