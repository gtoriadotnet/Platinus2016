<?php
if(isset($_GET["id"])){
	$url = "https://assetdelivery.roblox.com/v1/assetId/" . $_GET["id"];
	if(isset($_GET["version"])){
		$url = $url . "/version/" . $_GET["version"];
	}
    $options  = array('http' => array('user_agent' => 'Roblox'));
    $context  = stream_context_create($options);
    $asset = @file_get_contents($url, false, $context);
    if($asset){
        $asset = json_decode($asset,true)["location"];
        header("location: $asset");
    }else{
        http_response_code(404);
    }
}else{
    http_response_code(400);
}    
?>