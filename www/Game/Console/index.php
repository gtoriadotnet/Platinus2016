<!DOCTYPE html>
<html>
	<head>
		<title>Home - RCCService Console</title>
		<link rel="stylesheet" href="https://bootswatch.com/4/lumen/bootstrap.css">
		<link rel="stylesheet" href="page.css">
		<?php
		include_once("include.php");
		if(isset($_COOKIE["_RCCSecurityToken"])&&$_COOKIE["_RCCSecurityToken"]==SETTINGS["Cookie"]){
			echo '<link rel="stylesheet" href="content-aEJGogMLWEG32409t.css">
<link href="CSS/fa.css" rel="stylesheet">';
		}
		?>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		<script src="console.js"></script>
	</head>
	<body class="bg-light">
		<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" style="box-shadow: 0 -2px 10px black">
			<div class="container">
				<a class="navbar-brand" href="#">RCCService Console</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarColor02">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<div id="content">
				<div id="lockedModal" class="modal fade">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Site Locked</h5>
							</div>
							<div class="modal-body">
								<div class="form-group" id="siteLockFormGroup">
									<label for="siteLockPassword">Please enter the site password in the box below to access the panel.</label>
									<input type="password" class="form-control" id="siteLockPassword" placeholder="Password">
								</div>
							</div>
							<div class="modal-footer" style="min-height: 67px;">
								<input type="submit" id="siteLockSubmit" class="btn btn-primary"></input>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>