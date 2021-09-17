<?php
include_once("include.php");
//error_reporting(0);
if($_COOKIE["_RCCSecurityToken"]==SETTINGS["Cookie"]){
	$RCCServiceSoap = new Roblox\Grid\Rcc\RCCServiceSoap();
	
	$jobs = $RCCServiceSoap->GetAllJobs();
	
	print_r($jobs);
	exit;
	foreach($jobs as $job){
		?>
<tr>
<th scope="row"><?=$job->id?></th>
<td><?=$job->category?></td>
<td><?=$job->cores?></td>
<td><?=$job->expirationInSeconds?></td>
<td><button type="button" class="btn btn-primary">Manage</button></td>
</tr>
		<?php
	}
	/*
	foreach($vals as $key => $val){
		if($val["level"]==5 and $val["type"]=="open" and $tag = "NS1:JOB"){
			$jid = "";
			$exsec=0;
			$cat=0;
			$cores=0;
			for ($i=0;$i<4;$i++){
				$k = $vals[$key+$i+1];
				if($k["tag"]=="NS1:ID"){
					$jid = $k["value"];
				}elseif($k["tag"]=="NS1:EXPIRATIONINSECONDS"){
					$exsec = $k["value"];
				}elseif($k["tag"]=="NS1:CATEGORY"){
					$cat = $k["value"];
				}elseif($k["tag"]=="NS1:CORES"){
					$cores = $k["value"];
				}
			}
	?>
<tr>
<th scope="row"><?=$cat?></th>
<td><?=$jid?></td>
<td><?=$cores?></td>
<td><?=$exsec?></td>
<td><button type="button" class="btn btn-primary">Manage</button></td>
</tr>
	<?php
		}
	}
	*/
}else{
	http_response_code(403);
}
?>