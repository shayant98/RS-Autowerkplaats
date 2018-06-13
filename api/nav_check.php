<?php
session_start();
$id = $_SESSION['id'];
$sql = mysqli_query($conn,"SELECT rs_level FROM rs_user WHERE id='$id'");
$currentpage = basename($_SERVER['PHP_SELF'],'.php');
while ($row = mysqli_fetch_assoc($sql)) {
  $level = $row['rs_level'];
}
if ($currentpage == 'gebruikers' & $level == 'standard') {
  header("Location: home.php?NoAuth");
  mysqli_exit();

}

if ($level == 'admin') {
  include 'navigation.php';
}
elseif ($level == 'standard' ) {
  include 'navigation2.php';
}
else {
header("Location: index.php?NoAuth");
}




 ?>
