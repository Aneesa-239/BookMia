<?php
session_start();
require_once('config.php');


$doctor_email = $_SESSION['name'];
var_dump($_GET["id"]);

$bookingcode = $_REQUEST["id"];


$sql = "Select * from Doctor INNER JOIN User ON User.UserCode = Doctor.UserCode WHERE EmailAddress = '$doctor_email'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $doctor_code = $row['DoctorCode'];
    }
}

date_default_timezone_set('Africa/Johannesburg');
$date = date('Y-m-d H:i');

if (!empty($bookingcode)) {
    echo "$bookingcode is not empty";
    $query = "INSERT INTO Cancellation SET  
                DoctorCode = (SELECT DoctorCode FROM Doctor WHERE DoctorCode = '$doctor_code') ,
                BookingCode = (SELECT BookingCode FROM Booking WHERE BookingCode = '$bookingcode'),
                DateOfCancellation = '$date', 
                isResolved = 0";
    ;
    $result = mysqli_query($conn, $query);
    header("Location: ../../appointments.php");
    //add a way to alert the user that their request has been set successfully

    exit;
}

?>