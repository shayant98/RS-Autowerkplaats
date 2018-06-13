<?php
  session_start();

  include 'api/dbh_link.php';

  $id = $_SESSION['id'];
	$sql = mysqli_query($conn,"SELECT rs_name,rs_surname FROM rs_user WHERE id='$id'");
	while ($row = mysqli_fetch_assoc($sql)) {
		$voornaam = $row['rs_name'];
		$familienaam = $row['rs_surname'];
	}
 ?>
<!DOCTYPE html>
<html>
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

    <!-- animation stylesheet -->
    <link href="assets/css/animate.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>
  <body>
    <div class="wrapper">

			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->
  <div class="sidebar" data-color="orange" data-image="assets/img/sidebar-1.jpeg">
    <div class="logo">
      <a href="" class="simple-text">
                    <?php echo $voornaam." ".$familienaam; ?>
                </a>
    </div>

    <div class="sidebar-wrapper">
      <div class="user">
                  <div class="photo ">
                      <img src="assets/img/rslogo.png" width="240px" class="img img-circle img-responsive img-raised animated lightSpeedIn">
                  </div>

                  </div>

          <ul class="nav">

              <li <?php if($currentpage=='home') echo "class='active'"; ?>>
                  <a href="home.php">
                <i class="fa fa-home" aria-hidden="true"></i>
                <p>Home</p>
                  </a>
                </li>
              <li <?php if($currentpage=='klanten') echo "class='active'"; ?>>
                  <a href="klanten.php">
                      <i class="fa fa-user" aria-hidden="true"></i>
                      <p>Klanten</p>
                  </a>
              </li>
              <li <?php if($currentpage=='') echo "class='active'"; ?>>
                  <a href=".php">
                      <i class="material-icons">rv_hookup</i>
                      <p>Sleepdienst</p>
                  </a>
              </li>

          </ul>
    </div>
    </div>


  </body>
</html>
<!--   Core JS Files   -->
<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>



<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js"></script>
</html>
