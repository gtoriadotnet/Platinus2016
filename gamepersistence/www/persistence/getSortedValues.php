<?php
header("Content-Type: application/json");

require_once($_SERVER["DOCUMENT_ROOT"]."/../../dbcon.php");

if(isset($_SERVER["HTTP_CF_CONNECTING_IP"])){
	$ip=$_SERVER["HTTP_CF_CONNECTING_IP"];
	if(isset($_GET["key"])&&isset($_GET["placeId"])&&isset($_GET["scope"])){
		$query = "SELECT * FROM `persistence` WHERE `ip`=\"$ip\" AND `type`=\"sorted\" AND `placeid`=:pid AND `key`=:key AND `scope`=:scope";
		$key = (string)$_GET["key"];;
		$pid = (int)$_GET["placeId"];;
		$scope = (string)$_GET["scope"];
		$limit = 0;
		$limitSet = isset($_GET["pageSize"]);
		if($limitSet){
			$query = $query . " LIMIT :limit";
			$limit = (int)$_GET["pageSize"];
		}
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':key', $key, PDO::PARAM_STR); 
		$stmt->bindParam(':pid', $pid, PDO::PARAM_INT); 
		$stmt->bindParam(':scope', $scope, PDO::PARAM_STR); 
		if($limitSet){
			$stmt->bindParam(':limit', $limit, PDO::PARAM_INT); 
		}
		$stmt->execute();
		$entries = [];
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as &$data){
			array_push($entries,array("Target"=>$data["target"],"Value"=>$data["value"]));
		}
		$conn = null;
		exit(json_encode(["data"=>array("Entries"=>$entries)], JSON_NUMERIC_CHECK));
	}
	exit(json_encode(["error"=>"This driver can't. He just can't. Don't push him."]));
}
exit(json_encode(["error"=>"Failed to fetch client address."]));
?>