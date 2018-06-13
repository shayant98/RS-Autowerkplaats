<?php
include 'dbh_link.php';


$del_id = $_POST['id'];
echo $del_id;
$sql = mysqli_query($conn, "DELETE FROM rs_customer WHERE id='$del_id'");
if(!$sql){
	echo "error";
}else{
	echo "success";
}

 ?>
