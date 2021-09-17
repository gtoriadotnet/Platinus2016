<?php
include_once("include.php");
if(isset($_GET["pw"])){
if($_GET["pw"]==SETTINGS["Cookie"]){
?>
<div id="loading"></div>
<div id="rccPanel">
<div class="alert alert-dismissible alert-danger">
<strong>Oh snap!</strong> We were unable to connect to RCCService. Please try again later.
</div>
</div>
<script>
function loadContent(){
	$('#rccPanel').fadeIn("fast");
	$('#loading').fadeOut("fast");
}
$(document).ready(function (){
	$.post('connectrcc.php').done(function(data) {
		if(data.success){
			$('#rccPanel').load('rcccontent.php',function(){
				$('#statisticsCard').load('rccstatistics.php');
				$('#jobTableBody').load('rccjobs.php');
				loadContent();
			});
			setInterval(function(){
				var accepted = false
				$.post('connectrcc.php').done(function(data) {
					if(data.success){
						if($('#autoReloadSwitch').is(":checked")){
							$('#statisticsCard').load('rccstatistics.php');
							$('#jobTableBody').load('rccjobs.php');
						}
					}else{
						location.reload();
					}
				});
			},10000)
		}else{
			loadContent();
		}
	});
});
</script>
<h5 class="footerText">(c) XlXi 2020</h5>
<h6 class="footerText lowFooter">Do not distribute any contents on this page.</h6>
<?php
}else{
http_response_code(403);
}
}
?>