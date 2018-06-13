<?php
  include 'dbh_link.php';


  if(!empty($_POST)){
$voornaam = ($_POST['naam']);
$familienaam = ($_POST['familienaam']);
$kenteken = ($_POST['kenteken']);
$merk = ($_POST['merk']);
$model = ($_POST['model']);
$bouwjaar = ($_POST['bouwjaar']);
$chassis = ($_POST['chassis']);
$monteur = ($_POST['monteur']);
$datum= ($_POST['date']);
$prijs= ($_POST['prijs']);

$voornaam = strtolower($voornaam); //eerst alles klein
$familienaam = strtolower($familienaam);
$voornaam = ucfirst($voornaam); //dan eerste leet Hoofd
$familienaam = ucfirst($familienaam);
$kenteken = strtoupper($kenteken);
$merk = strtoupper($merk);
$model = strtoupper($model);
$chassis = strtoupper($chassis);

$voornaam = stripslashes($voornaam);
$familienaam = stripslashes($familienaam);
$kenteken = stripslashes($kenteken);
$merk = stripslashes($merk);
$model = stripslashes($model);
$bouwjaar = stripslashes($bouwjaar);
$chassis = stripslashes($chassis);
$prijs = stripslashes($prijs);


$voornaam = htmlspecialchars($voornaam);
$familienaam = htmlspecialchars($familienaam);
$kenteken = htmlspecialchars($kenteken);
$merk = htmlspecialchars($merk);
$model = htmlspecialchars($model);
$bouwjaar = htmlspecialchars($bouwjaar);
$chassis = htmlspecialchars($chassis);
$monteur = htmlspecialchars($monteur);
$datum = htmlspecialchars($datum);
$prijs = htmlspecialchars($prijs);

$info = 'sleepdienst';
$sleepdienst = ($_POST['sleepdienst']);


$cust_query = "SELECT * FROM rs_customer WHERE rs_cust_name = '$voornaam' && rs_cust_surname = '$familienaam'";
$result = mysqli_query($conn,$cust_query); //klant informatie

$car_query = "SELECT * FROM rs_car WHERE rs_car_carplate = '$kenteken'";
$result2 = mysqli_query($conn,$car_query); //auto informatie

$carcheck = mysqli_num_rows($result2); //check als auto bestaat
$custcheck = mysqli_num_rows($result); // chack als klant bestaat

if ($carcheck > 0 && $custcheck > 0) { //als auto al voorkomt in DB

  while ($row = mysqli_fetch_assoc($result)) {
    $cust_id = $row['id'];
  }

  $sql = mysqli_query($conn,"INSERT INTO rs_service(rs_service,rs_custid,rs_userid,rs_carplate,rs_serviceinfo,rs_towstatus,rs_price,rs_date)
    VALUES('$info','$cust_id','$monteur','$kenteken','$sleepdienst','1','$prijs','$datum')");
    if ($sql) {
    }else {
      echo mysqli_error($conn);
};
    }
    elseif ($custcheck == 0 && $carcheck == 0 ) { //als auto niet voorkomt in DB


        $cust_query = mysqli_query($conn,"INSERT INTO rs_customer(rs_cust_name,rs_cust_surname)VALUES('$voornaam','$familienaam')");
        $cust_id = mysqli_insert_id($conn);
        $car_query = mysqli_query($conn,"INSERT INTO rs_car(rs_car_carplate,rs_cust_id,rs_car_carmake,rs_car_carmodel,rs_car_carchas,rs_car_caryear)
        VALUES('$kenteken','$cust_id','$merk','$model','$chassis','$bouwjaar')");

        if (!empty($cust_id)) {
          $sql = mysqli_query($conn,"INSERT INTO rs_service(rs_service,rs_custid,rs_userid,rs_carplate,rs_serviceinfo,rs_towstatus,rs_price,rs_date)
            VALUES('$info','$cust_id','$monteur','$kenteken','$sleepdienst','1','$prijs','$datum')");
            if($sql) {
              echo "<span>Data added</span>";
            }else {
              echo mysqli_error($conn);
        }

      }



}elseif($custcheck > 0 && $carcheck == 0) { //als klant voorkomt maar auto niet
  while ($row = mysqli_fetch_assoc($result)) {
    $cust_id = $row['id'];

  }
  $car_query = mysqli_query($conn,"INSERT INTO rs_car(rs_car_carplate,rs_cust_id,rs_car_carmake,rs_car_carmodel,rs_car_carchas,rs_car_caryear)
  VALUES('$kenteken','$cust_id','$merk','$model','$chassis','$bouwjaar')");

  $sql = mysqli_query($conn,"INSERT INTO rs_service(rs_service,rs_custid,rs_userid,rs_carplate,rs_serviceinfo,rs_towstatus,rs_price,rs_date)
    VALUES('$info','$cust_id','$monteur','$kenteken','$sleepdienst','1','$prijs','$datum')");
    if($sql) {
      echo "<span>Data added</span>";
    }else {
      echo mysqli_error($conn);
}
}elseif ($custcheck == 0 && $carcheck > 0) { //als auto voorkomt maar klant niet
  $cust_query = mysqli_query($conn,"INSERT INTO rs_customer(rs_cust_name,rs_cust_surname)VALUES('$voornaam','$familienaam')");
  $cust_id = mysqli_insert_id($conn);
$car_query = mysqli_query($conn,"UPDATE rs_car SET rs_cust_id = '$cust_id' WHERE rs_car_carplate = '$kenteken'");

  if (!empty($cust_id)) {
    $sql = mysqli_query($conn,"INSERT INTO rs_service(rs_service,rs_custid,rs_userid,rs_carplate,rs_serviceinfo,rs_towstatus,rs_price,rs_date)
      VALUES('$info','$cust_id','$monteur','$kenteken','$sleepdienst','1','$prijs','$datum')");
      if($sql) {
        echo "<span>Data added</span>";
      }else {
        echo mysqli_error($conn);
  }

}
}
}

?>
