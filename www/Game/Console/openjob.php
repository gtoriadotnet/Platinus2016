<?php
include_once("include.php");
error_reporting(0);
if($_COOKIE["_RCCSecurityToken"]==SETTINGS["Cookie"]){
	require("RCC/functions.php");
	OpenJob($RCCServiceSoap, "monkey", "print(1)", $args = [], $expirationInSeconds = 99999);
}else{
	http_response_code(403);
}
?>