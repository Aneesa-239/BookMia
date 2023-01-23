<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


session_start();

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

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['p_email'], $_POST['p_password']) ) {
 // Could not get the data that should have been sent.
 exit('Please fill both the username and password fields!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare('SELECT EmailAddress, UserPassword FROM User WHERE EmailAddress = ?')) {
    
 // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
 $stmt->bind_param('s', $_POST['p_email']);
 $stmt->execute();
 // Store the result so we can check if the account exists in the database.
 $stmt->store_result();

 if ($stmt->num_rows > 0) {
 $stmt->bind_result($email, $password);
 $stmt->fetch();
 // Account exists, now we verify the password.
 // Note: remember to use password_hash in your registration file to store the hashed passwords.
 if (password_verify($password, $_POST['p_password'])){
     if ($_POST['p_password'] === $password){
  // Verification success! User has logged-in!
  // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
  session_regenerate_id(true);
  $_SESSION['loggedin'] = TRUE;
  $_SESSION['name'] = $email;
  
  echo $_SESSION['loggedin'];
  echo print_r($_SESSION);
  
 if(isset($_SESSION['name'])) {
     
     $check = $_SESSION['name'];
    
    $string = "Select * FROM User WHERE EmailAddress = '$check'"; 
    $string1 = "Select * FROM User INNER JOIN Doctor ON Doctor.UserCode = User.UserCode Where EmailAddress = '$check'";
    
    $result = mysqli_query($conn, $string);

	$row = [];
	
	if ($result->num_rows > 0) {
		// fetch all data from db into array 
		$row = $result->fetch_all(MYSQLI_ASSOC); }
		
		if (!empty($row)){
		foreach ($row as $rows){
      $admin = $rows['IsAdmin'];

    }
		if ( $admin == 1){
		        header("Location: ../../a.php");
		        exit;
		} else if ( $admin == 0){ 
		        $result = mysqli_query($conn, $string1);
		        	if ($result->num_rows > 0) {

		 header("Location: ../../doctor-dashboard.php");
		  exit;
		 }else {
		            header("Location: ../../index-2.php");
		            exit; 
		        }
		        } }
   
} 
    }else { echo "password is wrong";
  // Incorrect password
  header("Location: ../../login.php");
  echo '<script type="text/JavaScript">
  window.onload = function(){
    var x = document.getElementById("alert");
    x.style.visibility ="visible";
  }
  </script>';
        }
}
}
 $stmt->close();

?>