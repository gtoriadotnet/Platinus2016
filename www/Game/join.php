<?php

ob_start();

$ip="Unknown";

$date=date(DATE_ATOM, time());

if(isset($_SERVER["HTTP_CF_CONNECTING_IP"])){
	if($_SERVER["REMOTE_ADDR"] != $_SERVER["HTTP_CF_CONNECTING_IP"]){
		$ip=$_SERVER["HTTP_CF_CONNECTING_IP"];
	}else{
		$ip=$_SERVER["REMOTE_ADDR"];
	}
}else{
	$ip=$_SERVER["REMOTE_ADDR"];
}

header("Content-Type: text/plain; charset=utf-8");
$newline = "
";

$dataarray = array(
	"ClientPort"=>0,
	"MachineAddress"=>"76.189.132.196",
	"ServerPort"=>53640,
	"PingUrl"=>"",
	"PingInterval"=>120,
	"UserName"=>"Player",
	"SeleniumTestMode"=>false,
	"UserId"=>0,//rand(1000,9999),
	"SuperSafeChat"=>true,
	"CharacterAppearance"=>"",
	"PlaceId"=>0,
	"MeasurementUrl"=>"",
	"WaitingForCharacterGuid"=>strtolower(sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535))),
	"BaseUrl"=>"http://www.platinus2016.ga/",
	"ChatStyle"=>"ClassicAndBubble",
	"VendorId"=>0,
	"ScreenShotInfo"=>"",
	"VideoInfo"=>"<?xml version=\"1.0\"?><entry xmlns=\"http://www.w3.org/2005/Atom\" xmlns:media=\"http://search.yahoo.com/mrss/\" xmlns:yt=\"http://gdata.youtube.com/schemas/2007\"><media:group><media:title type=\"plain\"><![CDATA[Platinus Place]]></media:title><media:description type=\"plain\"><![CDATA[ For more games visit http://www.platinus2016.ga]]></media:description><media:category scheme=\"http://gdata.youtube.com/schemas/2007/categories.cat\">Games</media:category><media:keywords>Platinus, 2016, ROBLOX, video, free game, online virtual world</media:keywords></media:group></entry>",
	"CreatorId"=>0,
	"CreatorTypeEnum"=>"User",
	"MembershipType"=>"None",
	"AccountAge"=>0,
	"CookieStoreFirstTimePlayKey"=>"rbx_evt_ftp",
	"CookieStoreFiveMinutePlayKey"=>"rbx_evt_fmp",
	"CookieStoreEnabled"=>true,
	"IsRobloxPlace"=>true,
	"GenerateTeleportJoin"=>false,
	"IsUnknownOrUnder13"=>false,
	"SessionId"=>strtolower(sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535))) . "|00000000-0000-0000-0000-000000000000|0|$ip|8|$date|0|null|null",
	"DataCenterId"=>0,
	"FollowUserId"=>0,
	"UniverseId"=>0,
	"BrowserTrackerId"=>0,
	"UsePortraitMode"=>false
);

foreach($_GET as $key => $value)
{
	$dataarray[$key]=$value;
}

$data = json_encode($dataarray);

$signature;
$key = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/../key.pem");
openssl_sign($newline.$data, $signature, $key, OPENSSL_ALGO_SHA1);
echo sprintf("%s%%%s%%%s", "--rbxsig", base64_encode($signature), $newline.$data);

?>
