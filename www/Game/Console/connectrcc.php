<?php
include_once("include.php");
error_reporting(0);
function get_http_response_code($url) {
	$headers = get_headers($url);
	return substr($headers[0], 9, 3);
}

if($_COOKIE["_RCCSecurityToken"]==SETTINGS["Cookie"]){
	header("content-type:application/json");
	
	$array = array("success"=>false);
	if(get_http_response_code("http://localhost:64989")==500 or get_http_response_code("http://localhost:64989")==200){
		$array["success"]=true;
	}
	exit(json_encode($array));
}else{
	http_response_code(403);
}
?>