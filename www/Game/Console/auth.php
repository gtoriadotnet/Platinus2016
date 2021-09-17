<?php
include_once("include.php");
error_reporting(0);
header("Content-Type:application/json");
$array = array("message" => "No form data recieved", "success" => false);
if(isset($_POST["submit"])){
	$array = array(
		"message" => "Please enter a password",
		"success" => false
	);
	if(isset($_POST["sitePassword"])&&$_POST["sitePassword"]!==""){
		if($_POST["sitePassword"]==SETTINGS["Password"]){
			header("Set-Cookie: .RCCSecurityToken=" . SETTINGS["Cookie"] . "; path=/;");
			exit(json_encode(
				array(
					"message" => "Correct password, redirecting...",
					"success" => true
				)
			));
		}
		exit(json_encode(
			array(
				"message" => "Invalid password",
				"success" => false
			)
		));
	}
}
exit(json_encode($array));
?>