<?php
//connect to the database
session_start();
require_once "config.php";
$userEmail = $_SESSION['name'];
$isDoc = false;
$eventsArr = array();
//echo $userEmail;
//if you are a doctor with bookings then show this calendar
$check = "Select * from user INNER JOIN doctor ON user.UserCode = doctor.userCode
          where EmailAddress = '$userEmail'";
$answer = mysqli_query($conn, $check);
if ($answer->num_rows > 0) {
    $isDoc = true;
    //if you are a doctor with bookings then show this calendar
    $sql = "Select * from doctor
    INNER JOIN user ON user.UserCode = doctor.userCode
    INNER JOIN booking ON booking.DoctorCode = doctor.DoctorCode
    where EmailAddress = '$userEmail'";
    //else change this
//pull the required data from the database
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $eventsArr[] = array(
                'title' => $row['Description'],
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
} else {
    //if you arent a doctor see this
    $query = "SELECT * FROM booking ";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $eventsArr[] = array(
                'title' => "Reserved",
                'start' => $row['StartDate'],
                'end' => $row['EndDate']
            );
            //echo '$eventsArr';
        }
    }
}
// Render event data in JSON format 
echo json_encode($eventsArr);
?>