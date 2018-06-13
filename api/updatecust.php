<?php
include 'dbh_link.php';
if (!empty($_POST)) {
  $id = $_POST['id'];
 $name = $_POST["name"];
 $surname = $_POST["surname"];

 $sql = mysqli_query($conn,"UPDATE rs_customer SET rs_cust_name='$name', rs_cust_surname='$surname' WHERE id='$id'");
}

 ?>
