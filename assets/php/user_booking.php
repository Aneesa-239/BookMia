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

$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];
$user = $_POST['patientCode'];
$doctor = $_POST['doctorCode'];
$doc_email = $_POST['email'];


$BC = "BC00$number";
$checkrow = [];

$st = "SELECT * FROM Booking 
          WHERE DoctorCode = '$doctor' AND StartDate ='$startdate';";

$check = mysqli_query($conn, $st);
if ($check->num_rows > 0) {
    $data = array(
        'status' => false,
        'msg' => 'Sorry, Booking already exists'
    );

} else {
    $insert_invoice = "INSERT INTO Invoice SET BookingCode=(SELECT BookingCode  FROM Booking Where BookingCode = 'BC00$number'); ";
    $insert_payment = "INSERT INTO Payment SET PaymentAmount = (SELECT Fees FROM Doctor Where DoctorCode = '$doctor'),
    InvoiceCode=(SELECT MAX(InvoiceCode) FROM Invoice ORDER BY InvoiceCode), PaymentStatus= 'Pending'";
    $insert_query = "INSERT INTO Booking SET 
    BookingCode = 'BC00$number',PatientCode = (SELECT PatientCode
    FROM Patient
    WHERE PatientCode = '$user'),DoctorCode =(SELECT DoctorCode FROM Doctor WHERE DoctorCode = '$doctor'),StartDate ='$startdate', EndDate ='$enddate',BookingStatus = 'Active' ";
    if (mysqli_query($conn, $insert_query)) {
        if (mysqli_query($conn, $insert_invoice)) {
            if (mysqli_query($conn, $insert_payment)) {
                $data = array(
                    'status' => true,
                    'msg' => "BC00$number"
                );
            } else {
                $data = array(
                    'status' => false,
                    'msg' => 'Sorry, Payment not added.'
                );
            }
        } else {
            $data = array(
                'status' => false,
                'msg' => 'Sorry, Invoice not added.'
            );
        }
    } else {
        $data = array(
            'status' => false,
            'msg' => 'Sorry, Booking not added.'
        );
    }
}

echo json_encode($data);
?>