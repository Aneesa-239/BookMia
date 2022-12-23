<?php
echo "login has been called";

//call the database config file, with the database connection
require_once "config.php";

if(isset($_POST['submit'])){

$Email = $_POST["p_email"];
$password = $_POST["p_password"];


    echo "$Email, $password";
    
}

$query = "SELECT * FROM User WHERE EmailAddress = '$Email' AND UserPassword = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    header("Location: index-2.html");
} else {
    echo "0 results";
}

   $conn->close();
  
?>