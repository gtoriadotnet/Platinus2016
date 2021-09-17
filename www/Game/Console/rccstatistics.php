<?php
include_once("include.php");
error_reporting(0);
if($_COOKIE["_RCCSecurityToken"]==SETTINGS["Cookie"]){
	$RCCServiceSoap = new Roblox\Grid\Rcc\RCCServiceSoap();
?>
<span>Jobs Open: <?=($RCCServiceSoap->GetStatus()->environmentCount ?? "Unknown Exception")?></span><br>
<span>Running Version: <?=($RCCServiceSoap->GetVersion() ?? "Unknown Exception")?></span>
<?php
}else{
	http_response_code(403);
}
?>