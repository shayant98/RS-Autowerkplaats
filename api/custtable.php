<?php
	session_start();
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
		<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">


</head>


		<body>



				<div class="col-md-12">
					<div class="card">
						<div class="card-header" data-background-color="blue">
							<h4 class="title">Klanten</h4>
							<p class="category">Overzicht van alle klanten</p>
						</div>
						<div class="card-content table-responsive">
							<div class="toolbar">

							</div>
							<table id="custtable" class="table">
								<thead class="text-info">
									<tr>
										<th class="text-center">#</th>
										<th class="text-center">Klant Naam</th>
										<th class="text-center">Klant Familienaam</th>
										<th class="text-center">actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
										 $sql = mysqli_query($conn, 'SELECT * FROM rs_customer ORDER BY id DESC');


										 if (mysqli_num_rows($sql) > 0) {
											 while ($row = mysqli_fetch_assoc($sql)) {
												 ?>
										<tr>
											<td class="text-center"><?php echo $row['id']; ?></td>
											<td class="text-center"><?php echo $row['rs_cust_name']; ?></td>
											<td class="text-center"><?php echo $row['rs_cust_surname']; ?></td>
											<td class="td-actions">
												<!-- <button type="button" rel="tooltip" title="View Profile" class="btn btn-info btn-simple btn-xs text-center">
														<i class="fa fa-user"></i>
													</button> -->
													<button type="button" rel="tooltip" title="Bijwerken" id='<?php echo $row['id'] ?>' data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success btn-simple btn-xs table-update">
															<i class="fa fa-edit"></i>
														</button>
													<button type="button" rel="tooltip" title="Verwijderen"  id='<?php echo $row['id'] ?>' class="btn btn-danger btn-simple btn-xs table-delete">
															<i class="fa fa-times"></i>
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

	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>


	<script src="api/customer.js" type="text/javascript"></script>

</html>
