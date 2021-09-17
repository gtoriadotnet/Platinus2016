<?php
header("content-type: text/plain");
require_once('include.php');
$RCCServiceSoap = new Roblox\Grid\Rcc\RCCServiceSoap("104.243.255.116", 64989);

echo("HelloWorld(): ".($RCCServiceSoap->HelloWorld() ?? "Failed!")."\n");
echo("GetVersion(): ".($RCCServiceSoap->GetVersion() ?? "Failed!")."\n");
echo("GetStatus(): ".($RCCServiceSoap->GetStatus()->environmentCount ?? "Failed!")."\n");
print_r($RCCServiceSoap->GetAllJobs());

if(isset($_GET["o"])){
//$job = new Roblox\Grid\Rcc\Job("pog");
//$scriptText = 'loadfile("http://www.platinus2016.ga/Game/Console/gameserver.php")(1, 53640, nil, 10, "asdf", nil, 10, nil, nil, "platinus2016.ga", nil, nil, 0, nil, 37801172, nil, nil, 4, nil, 0, "asdf", "assetgame", "https://")';
$scriptText = 'for i = 1,1000 do wait() local a = Instance.new("Player") a.Name = "pee balls" .. math.random(1000,9999) a.UserId = tonumber("9999" .. math.random(100000,999999)) a.Parent = game:GetService("Players") a:LoadCharacter() end';
//$scriptText = 'game:GetService("Players").Player1:Destroy() game:GetService("Players")["pee balls1011"]:Destroy()';
$script = new Roblox\Grid\Rcc\ScriptExecution("egg", $scriptText);
$asdf = $RCCServiceSoap->Execute("c65dec16-567b-4a43-9cdc-18e66c598ffc", $script);
echo("BatchJob(Job, ScriptExecution): ".(!is_soap_fault($asdf) ? $asdf : "Failed!")."\n");
print_r($asdf);
// this will probably fail immediately since the job is closed upon returning a result
//echo('CloseJob("'.$job->id.'"): '.($RCCServiceSoap->CloseJob($job->id) ?? "Failed!")."\n");
}
?>