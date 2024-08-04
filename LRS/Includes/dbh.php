<?php
  //DB connection
  $dbserver = "localhost";
  $dbuser = "root";
  $dbPass = "";
  $database = "Login_System";

  //connect
  $conn = mysqli_connect($dbserver,$dbuser,$dbPass,$database);
  
  if(!$conn){
    die("Connection Faild :".mysqli_connect_errno());
  }
?>