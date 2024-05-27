<?php
  error_reporting(E_ALL);
  // DB Connection Data
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "form";
  $conn =  mysqli_connect($host, $username, $password, $dbname);

  // Form data
  $fullname = $_POST['fullname'];
  $phoneno = $_POST['phoneno'];
  $emailadd = $_POST['emailadd'];
  $messagearea = $_POST['messagearea'];

  // Chcek DB Connection
  if ($conn->connect_error) {
    die('connetion failed :' .$conn ->connect_error);
  }
?>