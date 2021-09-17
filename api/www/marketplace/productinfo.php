<?php
header("content-type: application/json; charset=utf-8");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://api.roblox.com/marketplace/productinfo?assetId=" . $_GET["assetId"]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
$output = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
curl_close($ch);

$headers = array();

$header_text = substr($output, 0, strpos($output, "\r\n\r\n"));

foreach (explode("\r\n", $header_text) as $i => $line){
	if ($i === 0){
		$headers['http_code'] = $line;
	}else{
		list($key, $value) = explode(': ', $line);
		$headers[$key] = $value;
	}
}

if($headers["http_code"]=="HTTP/1.1 200 OK"){
	$body = substr($output, $header_size);
	if(isset($headers["content-encoding"])){
		header("content-encoding: gzip");
	}
	http_response_code(200);
	echo $body;
}else{
	http_response_code(400);
}

?>