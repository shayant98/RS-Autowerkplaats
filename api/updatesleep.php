<?php
  include 'dbh_link.php';
  if (!empty($_POST)) {
    $id = htmlspecialchars($_POST['id']);
    $update = htmlspecialchars($_POST['update']);
    echo $id;

    $sql = mysqli_query($conn,"UPDATE rs_service SET rs_towstatus = '$update' WHERE id = '$id'");
  }

 ?>
