<?php
$servername = "localhost:3306";
$username = "motsekinet_superadmin";
$password = ";ZZPNyK{%]5)";
$db_name = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>