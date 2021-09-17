<?php
include_once("include.php");
error_reporting(0);
if($_COOKIE["_RCCSecurityToken"]==SETTINGS["Cookie"]){
	require("RCC/functions.php");
	$success = false;
	$p = xml_parser_create();
	$contents = '<ns1:CloseAllJobs>
</ns1:CloseAllJobs>';
	xml_parse_into_struct($p,SOAP::post($contents, "CloseAllJobs", $RCCServiceSoap),$vals, $index);
	foreach($vals as &$val){
		if($val["level"] == 4){
			$success = true;
		}
	}
	exit(json_encode(array("success"=>$success)));
}else{
	http_response_code(403);
}
?>