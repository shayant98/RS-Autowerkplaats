<?php
	session_start();
	session_regenerate_id();

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

    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>

		<!-- datepicker -->
		<link href="assets/css/daterangepicker.css" rel="stylesheet"/>


		<!-- selector-plugin -->
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css" />

		<!-- notification plugin -->
		<link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css">

		<!-- autocomplete plugin -->
		<link rel="stylesheet" href="assets/css/easy-autocomplete.min.css">

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

		<style>
		.main-panel{
		overflow-x: hidden;
}
		</style>
</head>

<body>

	<div class="wrapper">

	    <div class="main-panel">
				<?php include("header.php"); ?>

				<div class="container-fluid">
					<a href="home.php" class="btn btn-white"><i class="fa fa-chevron-left" aria-hidden="true"></i> Terug</a>

									<div class="col-md-12">
										<form class="" action="api/reparatie_process.php" method="post">

											<div class="card">
												<div class=" card-header" data-background-color="blue">
													<span><h4 class="title">Algemene Informatie</h4></span>
												</div>
												<div class="card-content">
													<div class="row">
														<div class="col-md-3">
															<div class="form-group label-floating is-focus">
																<label class="control-label">Date</label>
																<input class="datepicker form-control" type="text" name="date" id="date"/>
															</div>
														</div>

														<div class="col-md-3 col-sm-offset-1">
															<div class="form-group label-floating is-empty">
																<label class="control-label">Prijs</label>
																<input type="text" vname="reparatie_prijs" id="reparatie_prijs" class="form-control" />
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
																<select class="selectpicker form-control " name="reparatie_monteur" id="reparatie_monteur" data-style="btn-warning" name="monteur" title="Kies een monteur">

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
																<input name="reparatie_monteur" id="reparatie_monteur" class="form-control" readonly="readonly" value='<?php echo $id ?>'/>

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
												<input type="text" value="" id="reparatie_voornaam" name="reparatie_voornaam" class="form-control"/>
												</div>
												</div>
												<div class="col-md-6">
												<div class="form-group label-floating is-empty">
												<label class="control-label">Familienaam</label>
												<input type="text" value="" id="reparatie_familienaam" name="reparatie_familienaam" class="form-control" />
												</div>
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
														<div class="col-md-3">
															<div class="form-group label-floating is-empty">
																<label class="control-label">Kenteken nummer</label>
																<input type="text" value="" id="reparatie_kenteken" name="reparatie_kenteken" autocomplete="off" onkeyup="check()" class="form-control" />
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group label-floating is-empty">
																<label class="control-label">Merk</label>
																<input type="text" value="" id="reparatie_merk" name="reparatie_merk" class="form-control" />
															</div>
														</div>
													<div class="col-md-3">
														<div class="form-group label-floating is-empty">
															<label class="control-label">Model</label>
															<input type="text" value="" id="reparatie_model" name="reparatie_model" class="form-control" />
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group label-floating is-empty">
															<label class="control-label">Bouwjaar</label>
															<input type="text" value="" id="reparatie_bouwjaar" name="reparatie_bouwjaar" class="form-control" />
														</div>
													</div>
												</div>

													<div class="row">

														<div class="col-md-3">
															<div class="form-group label-floating is-empty">
																<label class="control-label">Chassisnummer</label>
																<input type="text" value="" id="reparatie_chassis" name="reparatie_chassis" class="form-control" />
															</div>
														</div>
													</div>
												</div>
											</div>
												</div>



								<div class="card">
									<div class="card-header" data-background-color="blue">
										<h4 class="title">Reparatie</h4>
									</div>
								  <div class="card-content">



									<textarea id="reparatie_info" name="reparatie_info" class="form-control" placeholder="Geef de werkzaamheden hier aan" rows="1"></textarea>



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
	<script src="assets/js/jquery-3.1.0.min.js" ></script>
	<script src="assets/js/bootstrap.min.js" ></script>
	<script src="assets/js/jquery.easy-autocomplete.js"></script>
	<script src="assets/js/material.min.js"></script>
	<script src="assets/js/moment.min.js"></script>

<!-- form submit -->
	<script src="api/reparatie_process.js"></script>


	<!--  Notifications Plugin    -->
	<script src="assets/js/sweetalert.min.js"></script>


	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>

	<!-- selector plugin -->
	<script src="api/autocomplete.js"></script>



	<!-- datepicker plugin -->
	<script src="assets/js/daterangepicker.js"></script>
	<script src="api/date.js"></script>

		<script src="api/reparatie_check.js"></script>

	<script src="assets/js/bootstrap-select.js"></script>



	<script type="text/javascript">
		$('#formid').on('keyup keypress', function(e) {
		var keyCode = e.keyCode || e.which;
		if (keyCode === 13) {
			e.preventDefault();
			return false;
		}
		});
	</script>
	<div id="Reparatie_Modal" class="modal fade">
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center">Auto Informatie</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="insert_form" class="">
						<label>Kentekennummer</label>
						<input type="text" name="kentekennummer" id="reparatie_modal_kenteken_nr" class="form-control" />
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
