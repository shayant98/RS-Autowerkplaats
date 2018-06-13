<?php
	include 'dbh_link.php';
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
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

		<!-- sweetalert popup CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css">
		<!-- datatables css -->
		<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">


</head>

<body>


		<div class="col-md-12">
			<div class="card">
				<div class="card-header" data-background-color="blue">
					<h4 class="title">Sleepdienst</h4>
					<p class="category">Overzicht van Sleepwerkzaamheden</p>
				</div>
				<div class="card-content table-responsive">
					<div class="toolbar">

					</div>
					<table id="sleeptable" class="table">
						<thead class="text-warning2">
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Kenteken Plaat</th>
								<th class="text-center">Fabrikant</th>
								<th class="text-center">Model</th>
								<th class="text-center">Locatie</th>
								<th class="text-center">Datum</th>
								<th class="text-center">Prijs</th>
								<th class="text-center">actions</th>
							</tr>
						</thead>
						<tbody class="tbody">
							<?php
							$stmt = $conn->prepare('SELECT
								c.rs_car_carplate as carplate,
								c.rs_car_carmake as carmake,
								c.rs_car_carmodel as carmodel,
								c.rs_car_caryear as caryear ,
								s.id as id,
								s.rs_serviceinfo as info,
								s.rs_date as datum,
								s.rs_price as prijs
								FROM rs_service AS s JOIN rs_car AS c
								ON c.rs_car_carplate = s.rs_carplate
								WHERE rs_service = ? AND rs_towstatus = ?'); //Prepared Statement For Extra Security
							$stmt->bind_param('si',$service,$status);

							$service = 'sleepdienst';
							$status = '1';

							$stmt->execute();
							$result = $stmt->get_result();
							$rows= $result->num_rows; //Get number of rows
								 $sql = mysqli_query($conn, '
									 ORDER BY id DESC');

								 if ($rows > 0) {
									 while ($row = mysqli_fetch_assoc($result)) {
										 ?>
								<tr>
									<td class="text-center"><?php echo htmlspecialchars($row['id']) ; ?></td>
									<td class="text-center"><?php echo htmlspecialchars($row['carplate']) ; ?></td>
									<td class="text-center"><?php echo htmlspecialchars($row['carmake']) ; ?></td>
									<td class="text-center"><?php echo htmlspecialchars($row['carmodel']) ; ?></td>
									<td class="text-center"><?php echo htmlspecialchars($row['info']) ; ?></td>
									<td class="text-center"><?php echo htmlspecialchars($row['datum']) ; ?></td>
									<td class="text-center"><?php echo htmlspecialchars($row['prijs']) ; ?></td>
									<td class="text-center">
											<button type="submit" rel="tooltip" title="Bijwerken" id='<?php echo $row['id'] ?>' class="btn btn-success btn-update">
													<i class=" fa fa-check"></i>Goedgekeurd
												</button>


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



		<!--Table END-->

		</div>
</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js" type="text/javascript"></script>

	<!-- sweetalert -->
	<script src="assets/js/sweetalert.min.js"></script>

	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap.min.js"></script>
	<script src="api/updatesleep.js"></script>



	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>



</html>
