<?php
require_once "config.php";

$patientcount = "Select COUNT(*) from Booking";
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
$startdate = $_GET['startdate'];
$enddate = $_GET['enddate'];
$user = $_GET['patientCode'];
$doctor = $_GET['doctorCode'];
$doc_email = $_GET['email'];


if ($startdate != "" and $enddate != "") {
    $string = "INSERT INTO Booking SET 
BookingCode = 'BC00$number',PatientCode = (SELECT PatientCode
FROM Patient
WHERE PatientCode = '$user'),DoctorCode =(SELECT DoctorCode
FROM Doctor
WHERE DoctorCode = '$doctor'),StartDate ='$startdate', EndDate ='$enddate',BookingStatus = 'Active' ";
    $string2 = "INSERT INTO Invoice SET BookingCode=(SELECT MAX( BookingCode ) FROM Booking); ";
    $string3 = "INSERT INTO Payment SET PaymentAmount = 500,
InvoiceCode=(SELECT MAX( InvoiceCode ) FROM Invoice), 
PaymentStatus= 'Pending'";
    $query = "SELECT MAX(BookingCode) AS BCode FROM Booking";
    $result = mysqli_query($conn, $query);
    $row = [];

    if ($result->num_rows > 0) {
        // fetch all data from db into array 
        $row = $result->fetch_all(MYSQLI_ASSOC);
    }
    ?>
<?php

    if (!empty($row))
        foreach ($row as $rows) {

            $code = $rows['BCode'];
        }
    if (mysqli_query($conn, $string) and !empty($doc_email)) {
        if (mysqli_query($conn, $string2)) {
            if (mysqli_query($conn, $string3)) {
                header("Location: ../../booking.php?id=$doc_email&flag=false&code=$code&choice=$startdate");
            }
        } else {
            header("Location: ../../booking.php?flag=true");
        }
    } else {
        header("Location: ../../booking.php?flag=true");
    }
    //echo $startdate, $enddate, $doctor, $user;
//write the code to add to the invoice and payments table
//change the 
}

?>