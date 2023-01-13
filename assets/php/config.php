<?php
$servername = "localhost";
$username = "motsekinet_superadmin";
$password = ";ZZPNyK{%]5)";
$db_name = "motsekinet_bookmia_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>