<?php 
  $serverName = "localhost";
  $userName = "root";
  $password = "";
  $database = "c4dfed_facility_booking";

  // Create connection
  $conn = mysqli_connect($serverName, $userName, $password, $database);

  // Check Connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // echo "Connected successfully";
?>