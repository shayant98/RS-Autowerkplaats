<?php
	session_start();
	include 'api/dbh_link.php';
	include 'api/nav_check.php';
?>
	<!doctype html>
	<html lang="en">

	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="assets/img/rslogo.png" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>RS Autowerkplaats</title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />

		<!-- Bootstrap core CSS     -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Selector css -->
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css" />

		<!--  Material Dashboard CSS    -->
		<link href="assets/css/material-dashboard.css" rel="stylesheet" />

		<link rel="stylesheet" type="text/css" href="assets/css/easy-autocomplete.css">

		<link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css">

		<!-- datepicker -->
		<link href="assets/css/daterangepicker.css" rel="stylesheet" />

		<!--     Fonts and icons     -->
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	</head>

	<body>

		<div class="wrapper">


			<div class="main-panel">
				<?php include("header.php"); ?>

				<div class="container-fluid">
					<a href="home.php" class="btn btn-white"><i class="fa fa-chevron-left" aria-hidden="true"></i> Terug</a>


					<div class="col-md-12">
						<form class="" action="index.html" method="post">

							<div class="card">
								<div class=" card-header" data-background-color="blue">
									<span><h4 class="title">Algemene Informatie</h4></span>
								</div>
								<div class="card-content">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group label-floating is-focus">
												<label class="control-label">Date</label>
												<input class="datepicker form-control" type="text" name="date" id="date" />
											</div>
										</div>

										<div class="col-md-3 col-sm-offset-1">
											<div class="form-group label-floating is-empty">
												<label class="control-label">Prijs</label>
												<input type="text" value="" name="keuring_prijs" id="keuring_prijs" class="form-control" />
											</div>
										</div>

										<div class="col-md-2 col-sm-offset-1">
											<?php
															$id = $_SESSION['id']; //get logged in user id
															$stmt = $conn->prepare('SELECT rs_level FROM	rs_user WHERE id =?');
															$stmt->bind_param('i',$id);

															$id = $id;
															$stmt->execute();
											        $result = $stmt->get_result();

															while ($row = mysqli_fetch_assoc($result)) {
															  $level = $row['rs_level'];
															}
															if ($level == 'admin') {
																?>
												<label>Monteur:</label>
												<select class="selectpicker form-control " name="keuring_monteur" id="keuring_monteur" data-style="btn-warning" name="monteur" title="Kies een monteur">

																	<?php
																		$stmt = $conn->prepare('SELECT * FROM	rs_user WHERE rs_level =?');
																		$stmt->bind_param('s',$userlevel);

																		$userlevel = 'standard';
																		$stmt->execute();
														        $result = $stmt->get_result();
																		while ($row = mysqli_fetch_assoc($result)) {
																			$id = $row['id'];
																			$name = $row['rs_name'];
																			echo '<option value="'.$id.'">'.$name.'</option>';
																		}
																	 ?>
																 </select>
												<?php
															}
															elseif ($level == 'standard' ) {

																?>
													<div class="form-group label-floating">
														<label class="control-label">Monteur</label>
														<input name="keuring_monteur" id="keuring_monteur" class="form-control" readonly="readonly" value='<?php echo $id ?>' />

													</div>
													<?php
															}

															 ?>




										</div>
									</div>
								</div>
							</div>

							<div class="card">
								<div class=" card-header" data-background-color="blue">
									<span><h4 class="title">Klant Informatie</h4></span>
								</div>
								<div class="card-content">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group label-floating is-empty">
												<label class="control-label">Voornaam</label>
												<input class="form-control" type="text" name="keuring_naam" id="keuring_naam">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group label-floating is-empty">
												<label class="control-label">Familienaam</label>
												<input class="form-control" type="text" name="keuring_familienaam" id="keuring_familienaam">
											</div>
										</div>
									</div>
								</div>
							</div>





							<div class="card">
								<div class=" card-header" data-background-color="blue">
									<span><h4 class="title">Auto Informatie</h4></span>
								</div>
								<div class="card-content">
									<div class="row">

										<div class="col-md-3">
											<div class="form-group label-floating is-empty">
												<label class="control-label">Kentekennummer</label>
												<input class="form-control"	type="text" name="keuring_kenteken" id="keuring_kenteken" autocomplete="off" onkeyup="check()">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group label-floating is-empty">
												<label class="control-label">Merk</label>
												<input class="form-control" type="text" name="keuring_merk" id="keuring_merk">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group label-floating is-empty">
												<label class="control-label">Model</label>
												<input class="form-control" type="text" name="keuring_model" id="keuring_model">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group label-floating is-empty">
												<label class="control-label">Bouwjaar</label>
												<input class="form-control" type="text" name="keuring_bouwjaar" id="keuring_bouwjaar">
											</div>
										</div>

									</div>
									<div class="row">

										<div class="col-md-3">
											<div class="form-group label-floating is-empty">
												<label class="control-label">Chassisnummer</label>
												<input class="form-control" type="text" name="keuring_chassis" id="keuring_chassis">
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6 col-md-offset-3">
								<div class="card">
									<div class="card-header" data-background-color="blue">
										<h4 class='card-title'>Keuring</h4>
									</div>

									<div class="card-content">






										<div class="col-m-1">
											<div class="form-group label-floating is-focus">
												<label class="control-label">Vervaldatum</label>
												<input class="datepicker form-control" type="date" name="date" id="keuring_info" />
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12 col-md-offset-5">
								<button class="btn btn-lg btn-success">Toevoegen</button>
							</div>

						</form>


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


	<!-- form submit -->
	<script src="api/keuring_process.js"></script>
	<script src="api/keuring_check.js"></script>


	<script src="assets/js/sweetalert.min.js"></script>

	<!-- datepicker plugin -->
	<script src="assets/js/daterangepicker.js"></script>
	<script src="api/date.js"></script>

	<!-- selector plugin -->
	<script src="assets/js/bootstrap-select.js"></script>

	<script src="assets/js/jquery.easy-autocomplete.min.js"></script>
	<script src="api/autocomplete.js"></script>


	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>

	<!-- prevent submit on enter -->
	<script type="text/javascript">
		$('#formid').on('keyup keypress', function(e) {
			var keyCode = e.keyCode || e.which;
			if (keyCode === 13) {
				e.preventDefault();
				return false;
			}
		});
	</script>
	<div id="Keuring_Modal" class="modal fade">
		<div class="modal-dialog ">
										<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center">Auto Informatie</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="insert_form" class="">
						<label>Kentekennummer</label>
						<input type="text" name="kentekennummer" id="keuring_modal_kenteken_nr" class="form-control" />
						<br/>
						<br>
						<center>
							<input type="submit" name="ja" id="btnja" value="Ja" class="btn btn-success" />
							<input type="submit" name="nee" id="btnnee" value="Nee" data-dismiss="modal" class="btn btn-success" /></center>
					</form>
				</div>

			</div>
		</div>
	</div>


	</html>
