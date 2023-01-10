<?php

/*
ini_set('display_errors', 'On');
error_reporting(E_ALL);
*/

echo "register is called";

//call the database config file, with the database connection
require_once "config.php";

$patientcount = "Select COUNT(*) from patient";
$last = mysqli_query($conn, $patientcount);
$row = [];

if ($last->num_rows > 0) {
    // fetch all data from db into array 
    $row = $last->fetch_all(MYSQLI_ASSOC);
}
if (!empty($row))
    foreach ($row as $rows) {
        $number = $rows['COUNT(*)'] + 1;
    }



if (isset($_POST["submit"])) {

    $Name = $_POST['name'];
    $Surname = $_POST['surname'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $Password = $_POST['password'];

    $query1 = "INSERT INTO User ( FirstName, LastName, EmailAddress, PhoneNumber, UserPassword, IsAdmin) 
            VALUES ('$Name', '$Surname', '$Email', '$Phone', '$Password', '0')";
    $query2 = "INSERT INTO Patient SET 
                PatientCode = '#PT00$number',UserCode = (SELECT UserCode
         FROM User
        WHERE EmailAddress = '$Email')";

    //when Patient logs in they will have to be saved into the Patient Table.

    echo "$Name, $Surname, $Email, $Phone, $Password";

    mysqli_query($conn, $query1);
    mysqli_query($conn, $query2);

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