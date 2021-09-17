<?php
	require "functions.php";
	$bruh->ip = "192.168.0.20";
	$bruh->url = $bruh->ip . ":64989";
	ExecuteScript($bruh, "bruh", 'game:Load("rbxasset://temp.rbxl")', "Test", array("nope"));