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
if ( !isset($_POST['d_email'], $_POST['d_password']) ) {
    // Could not get the data that should have been sent.
    exit('Please fill both the username and password fields!');
   }

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare('SELECT User.EmailAddress, User.UserPassword FROM User INNER JOIN Doctor ON User.UserCode = Doctor.UserCode WHERE EmailAddress = ? AND UserPassword = ?')) {
   
 // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
 $stmt->bind_param('ss', $_POST['d_email'], $_POST['d_password']);
 $stmt->execute();

 // Store the result so we can check if the account exists in the database.
 $stmt->store_result();

 if ($stmt->num_rows > 0) {
 $stmt->bind_result($email, $password);
 $stmt->fetch();
 // Account exists, now we verify the password.
 // Note: remember to use password_hash in your registration file to store the hashed passwords.
 if ($_POST['d_password'] === $password) {
  // Verification success! User has logged-in!
  // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
  session_regenerate_id(true);
  $_SESSION['loggedin'] = TRUE;
  $_SESSION['name'] = $email;
  
  echo $_SESSION['loggedin'];
  echo print_r($_SESSION);
  
 if(isset($_SESSION['name'])) {
    header("Location: ../../doctor-dashboard.php");
    exit;
}
 } else {
  // Incorrect password
    header("Location: ../../doctor-login.php");
  echo '<script type="text/JavaScript">
    var x = document.getElementById("alert");
    x.removeAttribute("hidden")
  </script>';
 }
} else {
 // Incorrect username
  header("Location: ../../doctor-login.php");
  echo '<script type="text/JavaScript">
    var x = document.getElementById("alert");
    x.removeAttribute("hidden")
  </script>';
}
 $stmt->close();
 

}
?>