<?php
if(isset($_GET["id"])){
	$url = "https://assetdelivery.roblox.com/v1/asset/?id=" . $_GET["id"];
	if(isset($_GET["version"])){
		$url = $url . "&version=" . $_GET["version"];
	}
    //$options  = array('http' => array('user_agent' => 'Roblox/WinInet'));
    //$context  = stream_context_create($options);
    //$asset = @file_get_contents($url, false, $context);
    if($url){
        //$asset = json_decode($asset,true)["location"];
        header("location: $url");
    }else{
        http_response_code(404);
    }
}else{
    http_response_code(400);
}    
?>