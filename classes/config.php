<?php

error_reporting(E_ERROR | E_PARSE);

session_start();

define('DB_TYPE', 'mysql');

define('DB_HOST', 'localhost');


define('DB_USERNAME','root');

define('DB_PASSWORD','');

define('DB_NAME','smweb_cardemo');

define('SITE_PATH', substr(dirname(__FILE__),0,-8));

define('SITE_CLASS_PATH', SITE_PATH.'/classes');

define('ADMIN_PATH', SITE_PATH . '/admin');

define('SITE_URL', 'http://cardemo.smweb.in/');


define('MAX_RECORDS', 10);

putenv("TZ=Asia/Kolkata");

require_once (SITE_CLASS_PATH . '/db_connect.php');

require_once (SITE_CLASS_PATH . '/admin.php');

require_once (SITE_CLASS_PATH . '/manufacturer.php');

require_once (SITE_CLASS_PATH . '/model.php');
require_once (SITE_CLASS_PATH . '/inventory.php');


?>

