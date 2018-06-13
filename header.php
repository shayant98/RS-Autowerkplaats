<?php
	session_start();
	session_regenerate_id();
	include 'api/dbh_link.php';

	$id = $_SESSION['id'];
	$sql = mysqli_query($conn,"SELECT * FROM rs_user WHERE id='$id'");
	$currentpage = basename($_SERVER['PHP_SELF'],'.php');


 ?>
 <!DOCTYPE html>
 <html>
 	<head>
 		<meta charset="utf-8">
 		<title></title>
		<style>

		</style>
 	</head>
 	<body>
		<nav class="navbar navbar-warning" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>

	        </button>
					<a class="navbar-brand " href="#"><b>Rs-Autowerkplaats</b><?php  echo " ".strtoupper($currentpage); ?></a>
				</div>

				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="text-primary1">
							<p class=""><?php echo "Vandaag is " . date("d/m/y") ?></p>
						</li>
						<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<i class="material-icons">perm_identity</i>
								<div class="ripple-container"></div></a>
								<ul class="dropdown-menu">
									<li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profiel</a></li>
									<li><a href="api/logout_procces.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Uitloggen</a></li>
								</ul>
							</li>
				</div>
			</div>
		</nav>
 	</body>
 </html>

	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
