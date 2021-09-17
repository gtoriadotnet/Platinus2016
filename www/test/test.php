<?php
header("Access-Control-Allow-Origin: *");
error_reporting(E_ERROR | E_PARSE);
if(isset($_POST["balls"])){
require "functions.php";
$bruh->ip = "localhost";
$bruh->url = $bruh->ip . ":64989";
ExecuteScript($bruh, "bruh", $_POST["balls"], "Test", array("nope"));
}
?>