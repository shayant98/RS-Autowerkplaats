<?php
	include 'api/dbh_link.php';

	session_start();
	session_regenerate_id();

	include 'api/nav_check.php';


 ?>
	<!doctype html>
	<html lang="en">

	<head>
		<meta charset="utf-8" />
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

		<!-- dataTables CSS -->
		<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">

		<!--     Fonts and icons     -->
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css">




	</head>

	<body>
		<div class="wrapper">
			<div class="main-panel">
				<?php
		include 'header.php';
		?>

					<div class="container-fluid">
						<div id="page-wrapper">

							<div class="content">
								<div id="page-inner">
									<div class="col-md-12">
										<form>
											<div class="row">

												<div class="" align="right">
													<button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning btn-lg">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Toevoegen
						</button>
												</div>
											</div>
										</form>
									</div>

									<div class="col-md-12">
										<div class="card">
											<div class="card-header" data-background-color="blue">
												<h4 class="title">Gebruikers</h4>
												<p class="category">Overzicht van bestaande gebruikers</p>
											</div>
											<div class="card-content table-responsive">
												<table id="usertable" class="table">
													<thead class="text-warning2">
														<tr>
															<th class="text-center">#</th>
															<th class="text-center">Naam</th>
															<th class="text-center">Familie Naam</th>
															<th class="text-center">Gebruikersnaam</th>
															<th class="text-center">Rechten</th>
															<th class="text-center">actions</th>
														</tr>
													</thead>
													<tbody>
														<?php
								 $sql = mysqli_query($conn, 'SELECT * FROM rs_user ORDER BY id DESC');


								 if (mysqli_num_rows($sql) > 0) {
									 while ($row = mysqli_fetch_assoc($sql)) {
										 ?>
															<tr>
																<td class="text-center">
																	<?php echo $row['id']; ?>
																</td>
																<td class="text-center">
																	<?php echo $row['rs_name']; ?>
																</td>
																<td class="text-center">
																	<?php echo $row['rs_surname']; ?>
																</td>
																<td class="text-center">
																	<?php echo $row['rs_username']; ?>
																</td>
																<td class="text-center">
																	<?php echo $row['rs_level']; ?>
																</td>
																<td class="td-actions text-left">
																	<!-- <button type="button" rel="tooltip" title="View Profile" class="btn btn-info btn-simple btn-xs">
												<i class="fa fa-user"></i>
											</button> -->
																	<button type="button" rel="tooltip" title="Bijwerken" id='<?php echo $row[' id '] ?>' data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success btn-simple btn-xs table-update">
												<i class="fa fa-edit"></i>
											</button>
																	<button type="button" rel="tooltip" title="Verwijderen" id='<?php echo $row[' id '] ?>' class="btn btn-danger btn-simple btn-xs table-delete">
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
									<!-- /. PAGE INNER  -->

								</div>
							</div>

							<!-- /. PAGE WRAPPER  -->


						</div>
					</div>
			</div>
			<div id="add_data_Modal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Update User</h4>
						</div>
						<div class="modal-body">
							<form method="post" id="insert_form">
								<label>Naam</label>
								<input type="text" name="name" id="name" class="form-control" />
								<br />
								<label>Famlienaam</label>
								<input type="text" name="surname" id="surname" class="form-control" />
								<br />
								<br>
								<label>Password</label>
								<input type="text" name="password" id="password" class="form-control" />
								<br />
								<label>Rechten</label>
								<div>
									<select class="selectpicker" data-style="btn-warning" name="level" id="level">
																		 <option value="standard">standard</option>
					 													<option value="admin">admin</option>
																	 </select>
								</div>


								<input type="text" name="employee_id" id="employee_id" />
								<input type="submit" name="update" id="update" value="Insert" class="btn btn-success" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>

		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	</body>

	<!--   Core JS Files   -->

	<script src="assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

	<!-- sweetalert -->
	<script src="assets/js/sweetalert.min.js"></script>





	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap.min.js"></script>


	<!-- selector plugin -->
	<script src="assets/js/bootstrap-select.js"></script>



	<script type="text/javascript">
	</script>

	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>


	<!-- Gebruikers bijwerken/verwijderen/tonen in en uit database -->

	<script src="api/user.js"></script>



	</html>
