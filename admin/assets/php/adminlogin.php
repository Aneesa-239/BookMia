<?php
echo "login has been called";

//call the database config file, with the database connection
require_once "config.php";
//require_once "sessions.php"

$Email = $_POST["Email"];
$password = $_POST["Password"];

if (isset($_POST['submit'])) {
    echo "$Email, $password";

}

$query = "SELECT * FROM User WHERE EmailAddress = '$Email' AND UserPassword = '$password' AND isAdmin = 1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    header("Location: index.html");
} else {
    echo "0 results";
}

$conn->close();

?>