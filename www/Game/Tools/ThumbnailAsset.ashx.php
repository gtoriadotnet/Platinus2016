<?php
$fmt = array('png'=>'image/Png');

$qmarkadded = false;

$url = "http://www.roblox.com/Game/Tools/ThumbnailAsset.ashx";

function addarg($arg){
	global $qmarkadded;
	global $url;
	if(!$qmarkadded){
		$url = $url . "?";
		$qmarkadded=true;
	}else{
		$url = $url . "&";
	}
	$url = $url . $arg;
}

if(isset($_GET["fmt"]) && isset($fmt[$_GET["fmt"]])){
	header("content-type: " . $fmt[$_GET['fmt']]);
	addarg("fmt=".$_GET["fmt"]);
}

if(isset($_GET["wd"])){
	addarg("wd=".$_GET["wd"]);
}

if(isset($_GET["ht"])){
	addarg("ht=".$_GET["ht"]);
}

if(isset($_GET["aid"])){
	addarg("aid=".$_GET["aid"]);
}

exit(file_get_contents($url));
?>