<?php
session_start();
include 'dbh_link.php';

if (isset($_POST['login'])) {

  $username = mysqli_real_escape_string($conn,$_POST['username']); //prevent SQL-Injection
  $password = mysqli_real_escape_string($conn,$_POST['password']);

  $username = stripslashes($username);
  $password = stripslashes($password);

  $username = htmlspecialchars($username);
  $password = htmlspecialchars($password);

  $stmt = $conn->prepare('SELECT * FROM	rs_user WHERE rs_username =?'); //Prepared Statement For Extra Security
  $stmt->bind_param('s',$username);

  $username = $username;
  $stmt->execute();
  $result = $stmt->get_result();
  $rows= $result->num_rows; //Get number of rows

  if ($rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
     $hash_pwd = $row['rs_password'];
     $id = $row['id'];
     }
     $hash = password_verify($password,$hash_pwd);

     if ($hash == 0) {
       header("Location: ../retry.php");
     }else {
       $stmt = $conn->prepare('SELECT * FROM	rs_user WHERE rs_username =? AND rs_password =?'); //Prepared Statement For Extra Security
       $stmt->bind_param('ss',$username,$password);

       $username = $username;
       $password = $hash_pwd;
       $stmt->execute();
       $result = $stmt->get_result();
       $rows= $result->num_rows; //Get number of rows

        if ($rows == 0) {
          header("Location: ../retry.php");
        }
         else {
             $_SESSION['id'] = $id;
             header("Location: ../home.php");
           }
         }
  }else {
    header("Location: ../retry.php");
  }

  }






?>
