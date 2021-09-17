<?php
include_once("include.php");
error_reporting(0);
if($_COOKIE["_RCCSecurityToken"]==SETTINGS["Cookie"]){
?>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip({trigger : 'hover'})
})
</script>
<div id="rccContent">
<div id="closeJobsPrompt" class="modal fade">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header" style="box-shadow: 0 0 11px 0 #0000001a;">
<h5 class="modal-title">Close All Jobs</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<p>Are you sure you want to close all jobs? Closing all jobs will result in all game servers and thumbnail render jobs shutting down. Closing jobs will result in all players losing connection to the server that they are currently in.</p>
<p><b>Only use this in the case of an emergency.</b></p>
</div>
<div class="modal-footer" style="box-shadow: 0 0 11px 0 #0000001a;">
<button id="closeJobsConfirm" type="button" class="btn btn-danger" data-dismiss="modal">Close Jobs</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
</div>
</div>
</div>
</div>
<h1>RCCService Console</h1>
<br>
<div class="card bg-light mb-3" style="box-shadow: 0 0 11px 0 #0000001a;">
<div class="card-header">Statistics</div>
<div class="card-body">
<h4 class="card-title">Current Service Analytics</h4>
<p class="card-text" id="statisticsCard">
</p>
</div>
</div>
<h1>Current Jobs</h1>
<div class="custom-control custom-switch">
<input type="checkbox" class="custom-control-input" id="autoReloadSwitch" checked="">
<label class="custom-control-label" style="margin-bottom:15px;" for="autoReloadSwitch">Auto reload job list</label>
</div>
<div class="row">
<div class="col-lg-6">
<button type="button" id="closeJobs" class="btn btn-danger" style="margin-bottom:15px;" data-toggle="tooltip" data-placement="top" data-html="true" title="Closing all jobs will result in all servers being shut down and all users being disconnected. Thumbnails that are in the process of being generated will not complete. <b>Only press this button in the case of an emergency</b>.">Close all jobs</button>
<button type="button" id="createJob" class="btn btn-success" style="margin-bottom:15px;margin-left:5px;" data-toggle="tooltip" data-placement="top" title="Creates a new job. (Thumbnails, Game Server, etc...)">Open job</button>
</div>
<div class="col-lg-6">
<button id="reloadJobs" type="button" class="btn btn-primary" style="margin-bottom:15px;float: right;border-radius: 30px;max-width: 34px;" data-toggle="tooltip" data-placement="top" title="Refresh job list"><i class="fas fa-redo-alt" style="margin-left: -2px;transform: translateY(1px);"></i></button>
</div>
</div>
<script>
$('#createJob').click(function(){
	$('#rccContent').fadeOut('fast');
});
$('#reloadJobs').click(function(){
	$('#statisticsCard').load('rccstatistics.php');
	$('#jobTableBody').load('rccjobs.php');
});
$('#closeJobsConfirm').click(function(){
	$.get("closejobs.php").done(function(){
		$('#statisticsCard').load('rccstatistics.php');
		$('#jobTableBody').load('rccjobs.php');
	});
});
$('#closeJobs').click(function(){
	$('#closeJobsPrompt').modal();
});
</script>
<table class="table table-hover" style="box-shadow: 0 0 11px 0 #0000001a;">
<thead>
<tr>
<th scope="col">Category</th>
<th scope="col">JobId</th>
<th scope="col">Cores</th>
<th scope="col">Expires</th>
<th scope="col">Manage</th>
</tr>
</thead>
<tbody id="jobTableBody">
</tbody>
</table>
</div>
<?php
}else{
	http_response_code(403);
}
?>