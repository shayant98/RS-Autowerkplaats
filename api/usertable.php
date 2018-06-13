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

		<link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
	<!-- Table starts here -->

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

      <!-- /. PAGE INNER  -->

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
