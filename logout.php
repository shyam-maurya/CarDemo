<?php
require_once('classes/config.php');

$obj = new Admin();
if(!$obj->isUserLoggedIn())
{
	header("Location: login.php");
	exit(0);
} 
$obj->doUserLogout();
 header("Location:login.php");
?>
 