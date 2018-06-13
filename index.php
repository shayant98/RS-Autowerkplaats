<?php
session_start();
?>


<!doctype html>
<html lang="en">

<head>


	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/RS.png">
	<link rel="icon" type="image/png" href="assets/img/RS.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Sign In RS Autowerkplaats</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!-- Form validation -->
	<script src="assets/js/jquery-1.9.1.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>



	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/material-kit.css" rel="stylesheet" />

	<!--SlideShow-->
	<link rel="stylesheet" type="text/css" href="assets/css/default.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/component.css" />
	<script src="assets/js/modernizr.custom.js"></script>



</head>

<body class="signup-page">


<!--Slideshow HTML-->
	<div class="container">
				<ul id="cbp-bislideshow" class="cbp-bislideshow">
					<li><img src="assets/img/1.jpg" alt="image01"/></li>
					<li><img src="assets/img/2.jpg" alt="image02"/></li>
					<li><img src="assets/img/3.jpg" alt="image03"/></li>
					<li><img src="assets/img/4.jpg" alt="image04"/></li>
				</ul>

				<div id="cbp-bicontroles" class="cbp-bislideshow"



	<div class="wrapper">

		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
					<div class="card card-signup" style="margin-top: 200px; width: 400px; height: 550px;" =>
						<form class="form" id="login" action="api/login_procces.php" method="POST">
							<div class="header header-primary text-center">

								<div class="logo">
									<img src="assets/img/rslogo.png" class="img-responsive center-block">
								</div>
								<h4>Inloggen</h4>




							</div>
							<p class="text-divider">Voer uw gegevens in: </p>
							<div class="content">


								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">face</i>
										</span>
									<div class="form-group label-floating">
										<label class="control-label">Gebruikersnaam</label>
										<input type="username" id="uname" class="form-control" name="username" required>
									</div>
								</div>


								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">lock_outline</i>
									</span>
									<div class="form-group label-floating">
										<label class="control-label">Wachtwoord</label>
										<input type="password" id="password" class="form-control" name="password" minlength="6" required>
									</div>
								</div>



							</div>
							<div class="footer text-center">
								<button type="submit" class="btn btn-simple btn-primary btn-lg" name="login">Inloggen</button>
							</div>
						</form>
						<script>
						$("#login").validate();
						</script>
					</div>
				</div>
			</div>
		</div>

		<footer class="footer">

			<nav class="pull-left">

			</nav>
			<div class="copyright pull-right">
				&copy; 2017, made by OGNatin Production</a>

			</div>
		</footer>

	</div>

	</div>
</div>

</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js"></script>


<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="assets/js/material-kit.js" type="text/javascript"></script>


<!-- imagesLoaded jQuery plugin by @desandro : https://github.com/desandro/imagesloaded -->
<script src="assets/js/jquery.imagesloaded.min.js"></script>
<script src="assets/js/cbpBGSlideshow.min.js"></script>
<script>
	$(function() {
		cbpBGSlideshow.init();
	});
</script>

</html>
