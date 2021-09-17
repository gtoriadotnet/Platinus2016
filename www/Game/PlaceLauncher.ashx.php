<?php
//{"jobId":"d22ec7db-b192-4ee0-8d9b-f43e75b5e80b","status":2,"joinScriptUrl":"https://assetgame.roblox.com/Game/Join.ashx?ticketVersion=2&ticket=%7b%22UserId%22%3a73038160%2c%22UserName%22%3a%22XlXi%22%2c%22DisplayName%22%3a%22XlXi%22%2c%22CharacterFetchUrl%22%3a%22https%3a%2f%2fapi.roblox.com%2fv1.1%2favatar-fetch%2f%3fplaceId%3d1818%26userId%3d73038160%22%2c%22GameId%22%3a%22d22ec7db-b192-4ee0-8d9b-f43e75b5e80b%22%2c%22PlaceId%22%3a1818%2c%22UniverseId%22%3a13058%2c%22ServerId%22%3a124046%2c%22ServerPort%22%3a60279%2c%22IsTeleport%22%3afalse%2c%22FollowUserId%22%3anull%2c%22TimeStamp%22%3a%2210%2f27%2f2020+8%3a57%3a53+AM%22%2c%22CharacterAppearanceId%22%3a73038160%2c%22AlternateName%22%3anull%2c%22JoinTypeId%22%3a10%2c%22MatchmakingDecisionId%22%3a%224ce998e8-917d-44be-8a05-0780b1889a8b%22%7d&signature=FgctyYFhaEvFUt5Q3reJJ3qV1XjOtqX0NNqU%2fVJlz2HR0SLidcZ%2bPWwE3K8zrdmgN0P68WhAjkEfQbeKR4D6Pg0BarlP2U5pWovAwtcsPB7SnCk0T8KNgdaifj9VgCAv01yBtAkZOoRv8BqPZJVTnPQw3uEH%2fa8mI0It3Tm%2bCcwDDovkNYrJZjOe%2fN3xbtsBivjN78RxpKdKOnWi6euHHytmO0wiS2P%2f%2bhXwBtHN1To5SHFupDA6NaRANRIVWM89sQPGLrQoE1USFA6kB3pr93yGHOBgm2iqjPgvAnCWQILNtgjpL4oFzAZDUsBFFZDyY3kpi02HaWd2Y43ebGCd%2fA%3d%3d&browserTrackerId=52905014568","authenticationUrl":"https://www.roblox.com/Login/Negotiate.ashx","authenticationTicket":"","message":null}
//{"jobId":null,"status":4,"joinScriptUrl":null,"authenticationUrl":null,"authenticationTicket":null,"message":"Unknown Error"}
header("Content-Type: application/json");
if(isset($_GET["request"])&&isset($_GET["placeId"])&&isset($_GET["isPlayTogetherGame"])){
	if($_GET["request"]=="RequestGame"){
		exit(json_encode(array("jobId"=>"d22ec7db-b192-4ee0-8d9b-f43e75b5e80b","status"=>2,"joinScriptUrl"=>"http://www.platinus2016.ga/game/join.php?UserName=XlXi&MachineAddress=localhost&ServerPort=53640&PlaceId=1818&UserId=42069","authenticationUrl"=>"alan","authenticationTicket"=>"","message"=>null)));
	}
}
exit("");
?>
