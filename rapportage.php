<?php
	session_start();
	include 'api/dbh_link.php';
	include 'api/nav_check.php';
?>
	<!doctype html>
	<html lang="en">

	<head>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
		<link rel="icon" type="image/png" href="../assets/img/rslogo.png" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>RS Autowerkplaats</title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />


		<!-- Bootstrap core CSS     -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

		<!--  Material Dashboard CSS    -->
		<link href="assets/css/material-dashboard.css" rel="stylesheet" />

		<!-- selector-plugin -->
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css" />
		<!--     Fonts and icons     -->
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
		<link href="assets/css/daterangepicker.css" rel="stylesheet" />

	</head>

	<body>


		<div class="wrapper">

			<div class="main-panel">

				<?php include("header.php");?>
				<div class="container-fluid">

					<!--Monteur Button-->
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3">
								<div class="klanten">
									<button data-toggle="modal" data-target="#Modal_monteur" class="btn btn-xlg btn-info">Monteurs</button>
								</div>
							</div>
							<!--End-->

							<!--Werkzaamheden Button-->
							<div class="col-md-3">
								<div class="service">
									<button data-toggle="modal" data-target="#Modal_werkzaamheden" class="btn btn-xlg btn-info">Werkzaamheden</button>
								</div>
							</div>
							<!--End-->

							<!--Keuring-->
							<div class="col-md-3">
								<div class=" keuring">
									<button data-toggle="modal" data-target="#Modal_keuring" class="btn btn-xlg btn-info">Keuring</button>
								</div>
							</div>
							<!--End-->


							<!--Autos Button-->
							<div class="col-md-3">
								<div class="service">
									<button data-toggle="modal" data-target="#Modal_autos" class="btn btn-xlg btn-info">Auto's</button>
								</div>
							</div>
							<!--End-->

							<!--Werzaamheden auto Button-->
							<div class="col-md-3">
								<div class="service">
									<button data-toggle="modal" data-target="#Modal_autowerkzaamheden" class="btn btn-xlg btn-info">Auto werkzaamheden <br />per datum</button>
								</div>
							</div>
							<!--End-->


							<!--Winst-->
							<div class="col-md-3">
								<div class="winst">
									<button data-toggle="modal" data-target="#Modal_winst" class="btn btn-xlg btn-info">Winst</button>
								</div>
							</div>
							<!--End-->




							<!--Materialen Button-->
							<div class="col-md-3">
								<div class="service">
									<button data-toggle="modal" data-target="#Modal_materialen" class="btn btn-xlg btn-info">Materialen</button>
								</div>
							</div>
							<!--End-->

						</div>
					</div>
				</div>
			</div>
		</div>

		<!--Modal Monteur-->
		<div id="Modal_monteur" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Werkzaamheden per monteur</h4>
					</div>
					<div class="modal-body">
						<form method="post" id="monteur_form" action="api/rapport_monteur.php">
							<select class="selectpicker form-control " id="monteur" name="monteur" data-style="btn-info" title="Kies een monteur">';
							<?php
							$employee_query=mysqli_query($conn,"SELECT * FROM rs_user WHERE rs_level ='standard'");

							while ($row = mysqli_fetch_assoc($employee_query)) {
								$id = $row['id'];
								$name = $row['rs_name'];
								echo '<option value="'.$id.'">'.$name.'</option>';
							}
							?>
						</select>
							<div class="form-group label-floating">
								<label>Werkperiode</label>
								<input type="text" name="monteur_datum" id="monteur_datum" class=" form-control" />
							</div>
							<button type="submit" id="monteur_update" name="monteur_update" class="btn bnt-lg btn-success">Tonen</button>
							</form>
					</div>
				</div>
			</div>
		</div>

		<!--Modal Werkzaamheden-->
		<div id="Modal_werkzaamheden" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Werkzaamheden per periode</h4>
					</div>
					<div class="modal-body">
						<form method="post" id="werk_form" action="api/rapport_werk.php">
							<select class="selectpicker form-control " id="werk" name="werk" data-style="btn-info" title="Werkzaamheden">
								<option value="service">Service</option>
								<option value="reparatie">Reparatie</option>
								<option value="keuring">Keuring</option>
								<option value="sleepdienst">Sleepdienst</option>
								<option value="alles">Alles</option>
							</select>
							<div class="form-group label-floating">
								<label>Periode</label>
								<input type="text" name="werk_datum" id="werk_datum" class="form-control" />
							</div>
							<input type="submit" name="werk_update" id="werk_update" value="Tonen" class="btn btn-success" />
						</form>
					</div>
				</div>
			</div>
		</div>


		<!--Modal Auto's-->
		<div id="Modal_autos" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Werkzaamheden per auto</h4>
					</div>
					<div class="modal-body">
						<form method="post" id="auto_form" action="api/rapport_auto.php">
							<select class="selectpicker form-control " id="kenteken" name="kenteken" data-style="btn-info" data-live-search="true" title="Kies een kenteken nummer">
								<?php
								$employee_query=mysqli_query($conn,"SELECT rs_car_carplate FROM rs_car");

								while ($row = mysqli_fetch_assoc($employee_query)) {
									$kenteken = $row['rs_car_carplate'];
									echo '<option value="'.$kenteken.'">'.$kenteken.'</option>';
								}
								?>

							</select>
							<input type="submit" name="auto_update" id="auto_update" value="Tonen" class="btn btn-success" />
							</form>
					</div>
				</div>
			</div>
		</div>

		<!--Modal Auto datum werkzaamheden-->
		<div id="Modal_autowerkzaamheden" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Auto Werkzaamheden per datum</h4>
					</div>
					<div class="modal-body">
						<form method="post" id="autodatum_form" action="api/rapport_auto.php">
							<select class="selectpicker form-control " id="kenteken" name="kenteken" data-style="btn-info" data-live-search="true" data-title="Kies een kenteken nummer">
								<?php
								$employee_query=mysqli_query($conn,"SELECT rs_car_carplate FROM rs_car");

								while ($row = mysqli_fetch_assoc($employee_query)) {
									$kenteken = $row['rs_car_carplate'];
									echo '<option value="'.$kenteken.'">'.$kenteken.'</option>';
								}
								?>
							</select>
							<div class="form-group label-floating">
								<label>Datum</label>
								<input type="text" name="auto_datum" id="auto_datum" class="form-control" />
							</div>
							<input type="submit" name="auto_update" id="auto_update" value="Tonen" class="btn btn-success" />
							</form>
					</div>
				</div>
			</div>
		</div>


		<!--Modal Keuring-->
		<div id="Modal_keuring" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Vervaldatums van auto's</h4>
					</div>
					<div class="modal-body">
						<form method="post" id="keuring_form" action="api/rapport_keuring.php">

							<div class="form-group label-floating">
								<label>Periode</label>
								<input type="text" name="keuring_datum" id="keuring_datum" class="form-control" />
							</div>
							<input type="submit" name="keuring_update" id="keuring_update" value="Tonen" class="btn btn-success" />
							</br>
						</form>
					</div>
				</div>
			</div>
		</div>


		<!--Modal Winst-->
		<div id="Modal_winst" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Ingekomen winsten</h4>
					</div>
					<div class="modal-body">
						<form method="post" id="winst_form">
							<label>Periode</label>
							<input type="text" name="modal_winstperiode" id="modal_winstperiode" class="form-control" />
							<br>
							<input type="submit" name="update" id="update" value="Tonen" class="btn btn-success" />
							</br>
					</div>
				</div>
			</div>
		</div>


		<!--Modal Matrialen-->
		<div id="Modal_materialen" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Beschikbare Materialen</h4>
					</div>
					<div class="modal-body">
						<form method="post" id="materiaal_form">
							<label>Soort materiaal</label>
							<input type="text" name="modal_materialenbeschik" id="modal_materialenbeschik" class="input-sm form-control" />
							<br />
							<br>
							<input type="submit" name="update" id="update" value="Tonen" class="btn btn-success" />
							</br>
					</div>
				</div>
			</div>
		</div>


	</body>


	<!--   Core JS Files   -->
	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js" type="text/javascript"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/daterangepicker.js"></script>
	<script src="api/date.js"></script>

	<!-- selector plugin -->
	<script src="assets/js/bootstrap-select.js"></script>


	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>

	<script>
		$(document).ready(function() {
			$("input[id$='form']").on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) {
    e.preventDefault();
    return false;
  }
});
		});
	</script>

	</html>
