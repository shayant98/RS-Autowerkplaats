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
		<link href="assets/css/material-dashboard.css" rel="stylesheet" />


		<!--     Fonts and icons     -->
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
		<!-- datatables css -->
		<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">

	</head>

	<body>

		<div class="wrapper">

			<div class="main-panel">
				<?php include("header.php"); ?>


				<div class="container-fluid">
					<h4 class='card-title'> Quick-Access</h4>
					<!--Service Button-->
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3">
								<div class="hidden service">
									<form action="service.php">
										<button class="btn btn-xlg btn-info">Service</button>
									</form>
								</div>
							</div>
							<!--End-->
							<!--Reparatie Button-->

							<div class="col-md-3">
								<div class="hidden reparatie">
									<form action="reparatie.php">
										<button class="btn btn-xlg btn-info">Reparatie</button>
									</form>
								</div>
							</div>
							<!--End-->
							<!--Sleepdienst-->
							<div class="col-md-3">
								<div class="hidden sleepdienst">
									<form action="sleepdienst.php">
										<button class="btn btn-xlg btn-info">Sleepdienst</button>
									</form>
								</div>
							</div>

							<!--End-->

							<!--Keuring-->
							<div class="col-md-3">
								<div class="hidden keuring">
									<form action="keuring.php">
										<button class="btn btn-xlg btn-info">Keuring</button>
									</form>
								</div>
							</div>
							<!--End-->
						</div>

					</div>

					<div class="row" style="position:absolute; bottom: 0px; width: 100%;">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header" data-background-color="blue">
									<h4 class="title">Recente Werkzaamheden</h4>
									<p class="category"></p>
								</div>
								<div class="card-content table-responsive">
									<table id="hometable" class="table">
										<thead class="text-info">
											<tr>
												<th class="text-center">#</th>
												<th class="text-center">kenteken Plaat</th>
												<th class="text-center">Model</th>
												<th class="text-center">Make</th>
												<th class="text-center">Type</th>
											</tr>
										</thead>
										<tbody>
											<?php

												$sql = mysqli_query($conn,"SELECT
													c.rs_car_carplate as carplate,
													c.rs_car_carmake as carmake,
													c.rs_car_carmodel as carmodel,
													c.rs_car_caryear as caryear ,
													s.id as id,
													s.rs_service as type,
													s.rs_date
														FROM rs_car AS c
															JOIN rs_service AS s
																ON c.rs_car_carplate = s.rs_carplate
																	WHERE s.rs_date = CURRENT_DATE;
													");

											 if (mysqli_num_rows($sql) > 0) {
											 	while ($row = mysqli_fetch_assoc($sql)) {
													 ?>
												<tr>
													<td class="text-center">
														<?php echo htmlspecialchars($row['id']); ?>
													</td>
													<td class="text-center">
														<?php echo htmlspecialchars($row['carplate']); ?>
													</td>
													<td class="text-center">
														<?php echo htmlspecialchars($row['carmodel']); ?>
													</td>
													<td class="text-center">
														<?php echo htmlspecialchars($row['carmake']); ?>
													</td>
													<td class="text-center">
														<?php echo htmlspecialchars($row['type']); ?>
													</td>
												</tr>

												<?php
												}
											}

									?>
										</tbody>
									</table>
								</div>
							</div>

						</div>
					</div>


				</div>

			</div>
		</div>
		</div>

	</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js" type="text/javascript"></script>

	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function() {
			$('#hometable').DataTable( {
					"paging":   true,
					"bLengthChange": false,
					"ordering": true,
					"info":     true,
					"pageLength": 5,
					"language": {
					"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Dutch.json"
			}
			} );
	} );
</script>

	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>


	<!-- code voor animation -->
	<script>
		$(document).ready(function() {
			$('.service').fadeIn(2000).removeClass('hidden');
			$('.reparatie').fadeIn(2000).removeClass('hidden');
			$('.sleepdienst').fadeIn(2000).removeClass('hidden');
			$('.keuring').fadeIn(2000).removeClass('hidden');


		});
	</script>



	</html>
