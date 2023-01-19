<?php
    require_once("session.php");
    require_once("config.php");

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $db_name);

	$fname = "";
	$lname = "";

	if (isset($_POST['save_btn'])) {
		$fname = $_POST['f_name'];
		$lname = $_POST['l_name'];
	  
		mysqli_query($db_name, "INSERT INTO User (FirstName, LastName) VALUES ('$fname', '$lname')"); 
		$_SESSION['message'] = "data has been saved!"; 
		header('location: index.html');
	   }

?>