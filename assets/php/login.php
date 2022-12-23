<?php

require_once "config.php";
require_once "session.php";

$query = 'SELECT EmailAddress, UserPassword FROM User';
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "Email: " . $row["EmailAddress"] . " - Password: " . $row["Userpassword"] . "<br>";
    }
} else {
    echo "0 results";
}


?>