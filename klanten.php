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

	<div class="wrapper">
	    <div class="main-panel">
				<?php include("header.php"); ?>
			<div class="content">
				<p class="form-message" hidden></p>


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
										$stmt = $conn->prepare('SELECT * FROM rs_customer ORDER BY id DESC');

										$stmt->execute();
									  $result = $stmt->get_result();
									  $rows= $result->num_rows;

										 if ($rows > 0) {
											 while ($row = mysqli_fetch_assoc($result)) {
												 ?>
										<tr>
											<td class="text-center"><?php echo htmlspecialchars($row['id']) ; ?></td>
											<td class="text-center"><?php echo htmlspecialchars($row['rs_cust_name']) ; ?></td>
											<td class="text-center"><?php echo  htmlspecialchars($row['rs_cust_surname']); ?></td>
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


				<!--Table END-->

				</div>
				</div>
				</div>
				<div id="add_data_Modal" class="modal fade">
			       <div class="modal-dialog ">
			            <div class="modal-content">
			                 <div class="modal-header">
			                      <button type="button" class="close" data-dismiss="modal">&times;</button>
			                      <h4 class="modal-title text-center">Update Klant</h4>
			                 </div>
			                 <div class="modal-body">
			                      <form method="post" id="insert_form" class="">
			                           <label>Naam</label>
			                           <input type="text" name="name" id="name" class="form-control" />
			                           <br />
			                           <label>Famlienaam</label>
			                           <input type="text" name="surname" id="surname" class="form-control"/>
			                           <br />
																 <br>

			                           <input type="hidden" name="customer_id" id="customer_id" />
			                           <input type="submit" name="update" id="update" value="Update" class="btn btn-success" />
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

	<!-- sweetalert -->
	<script src="assets/js/sweetalert.min.js"></script>




	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.bootstrap.min.js"></script>

	<script src="api/customer.js" type="text/javascript"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>



</html>
