<?php

$failed = "Failed to filter chat.";

$dataArray = array(
	"data"=>array(
		"white"=>$failed,
		"black"=>$failed
	)
);

if(isset($_POST["text"])){
	foreach(array("white","black") as &$filter){
		$dataArray["data"][$filter] = $_POST["text"];
	}
}

echo json_encode($dataArray);

?>