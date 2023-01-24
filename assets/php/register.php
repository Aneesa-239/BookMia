<?php


ini_set('display_errors', 'On');
error_reporting(E_ALL);
/*
echo "account already exists! please login";*/

//call the database config file, with the database connection
require_once "config.php";

$patientcount = "Select COUNT(*) from Patient";
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

$Name = $_POST['name'];
$Surname = $_POST['surname'];
$Email = $_POST['email'];
$Phone = $_POST['phone'];
$Password = $_POST['password'];


$checker = mysqli_query($conn, "SELECT EmailAddress FROM User WHERE EmailAddress = '$Email'");

$sql_num = mysqli_num_rows($checker);

if ($sql_num > 0) {
    $data = array(
        'status' => false,
        'msg' => 'user already exists'
    );

} else {
    if ($Name != "" || $Surname != "" || $Email != "" || $Password != "") {
        $hash = password_hash($Password, PASSWORD_DEFAULT); // The hash of the password that
        $query1 = "INSERT INTO User ( FirstName, LastName, EmailAddress, PhoneNumber, UserPassword, IsAdmin) 
            VALUES ('$Name', '$Surname', '$Email', '$Phone', '$hash', '0')";

        $string = "INSERT INTO Patient SET PatientCode = 'PT00$number',UserCode = (SELECT UserCode
         FROM User WHERE EmailAddress = '$Email')"; // can be stored in the database
        //when Patient logs in they will have to be saved into the Patient Table.
        echo "$Name, $Surname, $Email, $Phone, $Password, $number";
        ;
        //mysqli_query($conn, $string);
        if (mysqli_query($conn, $query1)) {
            if (mysqli_query($conn, $string)) {
                $data = array(
                    'status' => true,
                    'msg' => "registered."
                );
                // mysqli_close($conn);
            } else {
                $data = array(
                    'status' => false,
                    'msg' => 'Sorry, patient not added.'
                );
            }

        } else {
            $data = array(
                'status' => false,
                'msg' => 'Sorry, user not added.'
            );

        }

    } else {
        $data = array(
            'status' => false,
            'msg' => 'Sorry, no data registered.'
        );

    }



    // header("Location: ../../login.php");
}
echo json_encode($data);
?>