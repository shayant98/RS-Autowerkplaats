<?php
session_start();

include 'dbh_link.php';
 if(!empty($_POST))
 {
      $output = '';
      $name = mysqli_real_escape_string($conn, $_POST["name"]);
      $surname = mysqli_real_escape_string($conn, $_POST["surname"]);
      $password = mysqli_real_escape_string($conn, $_POST["password"]); //text password

      //password_hash
      $encrypt_pass = password_hash($password, PASSWORD_DEFAULT);

      $level = $_POST["level"];
      $id = $_POST['employee_id'];

      if($_POST["employee_id"] != '')
            {
           $sql = mysqli_query($conn,"UPDATE rs_user
           SET rs_name='$name',
           rs_surname='$surname',
           rs_password = '$encrypt_pass',
           rs_level = '$level'
           WHERE id='$id'");

      }else
      {

        $name = trim($name," ");
        $surname = trim($surname," ");
        $password = trim($password," ");
        $level = mysqli_real_escape_string($conn, $_POST['level']) ;

        $name=preg_replace('/\s+/', '', $name); //strip whitespaces(spaties)
        $surname=preg_replace('/\s+/', '', $surname); //strip whitespaces(spaties)
        $username=preg_replace('/\s+/', '', $username); //strip whitespaces(spaties)
        $password=preg_replace('/\s+/', '', $password); //strip whitespaces(spaties)

        $username = strtolower($name.$surname.rand(1,50)); //username generation en lowercase
        $username = trim($username," ");

        $encrypt_pass = password_hash($password, PASSWORD_DEFAULT);

        $sql = mysqli_query($conn, "INSERT INTO rs_user(rs_name, rs_surname, rs_username, rs_password, rs_level)
        VALUES('$name', '$surname', '$username', '$encrypt_pass', '$level')");
        



         }}

 ?>
