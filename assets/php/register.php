<?php

/*
ini_set('display_errors', 'On');
error_reporting(E_ALL);
*/

echo "register is called";

//call the database config file, with the database connection
require_once "config.php";

if (isset($_POST["submit"])) {

    $Name = $_POST['name'];
    $Surname = $_POST['surname'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $Password = $_POST['password'];

    $query = "INSERT INTO User ( FirstName, LastName, EmailAddress, PhoneNumber, UserPassword, IsAdmin) 
            VALUES ('$Name', '$Surname', '$Email', '$Phone', '$Password', '0')";

    //when Patient logs in they will have to be saved into the Patient Table.

    echo "$Name, $Surname, $Email, $Phone, $Password";

    mysqli_query($conn, $query);

    mysqli_close($conn);

    header("Location: index-2.html");

    /*
    $run = mysqli_query($conn, $query) or die(mysqli_error());
    if ($run) {
    echo "Form submitted";
    header("location: index-2.html");
    exit();
    } 
    else {
    echo "Form not submitted";
    }
    mysqli_close($conn);
    */

}

?>