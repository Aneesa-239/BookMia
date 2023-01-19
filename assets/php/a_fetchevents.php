<?php
//connect to the database
session_start();
require_once "config.php";
$userEmail = $_SESSION['name'];
$isAdmin = false;
$eventsArr = array();
//echo $userEmail;
//if you are a doctor with bookings then show this calendar
$check = "Select * from User 
          where EmailAddress = '$userEmail'";
$answer = mysqli_query($conn, $check);
if ($answer->num_rows > 0) {
    $isAdmin = true;
    //if you are a doctor with bookings then show this calendar
    $sql = "Select * from Doctor
    INNER JOIN User ON User.UserCode = Doctor.UserCode
    INNER JOIN Booking ON Booking.DoctorCode = Doctor.DoctorCode";
    //else change this
//pull the required data from the database
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $eventsArr[] = array(
                'title' => $row['DoctorCode'],
                'start' => $row['StartDate'],
                'end' => $row['EndDate'],
                'color' => '#' . substr(uniqid(), -6)

            );

            //echo '$eventsArr';
        }
    } else {
        //if there are no bookings display empty calendar
        $eventsArr = "";
    }
}
// Render event data in JSON format 
echo json_encode($eventsArr);
?>