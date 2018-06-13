<?php
 //fetch.php
 include 'dbh_link.php';
   if(isset($_POST["employee_id"]))
 {
   $employee_id = $_POST['employee_id'];
      $query = "SELECT * FROM rs_user WHERE id = '$employee_id'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result);
      echo json_encode($row);
 }


 if(isset($_POST["id"]))
{
 $customer_id = $_POST['id'];
    $query = "SELECT * FROM rs_customer WHERE id = '$customer_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}


if(isset($_POST['kenteken']))
{
 $kenteken=$_POST['kenteken'];

 $query=" SELECT * FROM rs_car WHERE rs_car_carplate='$kenteken' ";

 $result = mysqli_query($conn, $query);

 if(mysqli_num_rows($result)>0)
 {
  $row = mysqli_fetch_array($result);
  echo json_encode($row);
 }
 else
 {
  echo "bestaatniet";
 }
 exit();
}

 ?>
