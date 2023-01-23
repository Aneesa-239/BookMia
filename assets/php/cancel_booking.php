<?php
require_once "config.php";
$bookingcode = $_REQUEST['id'];

if (!empty($bookingcode)) {
    $sql = "UPDATE Booking SET BookingStatus ='Inactive' WHERE BookingCode = '$bookingcode'";
    $query = "UPDATE Cancellation SET isResolved =1 WHERE BookingCode = '$bookingcode'";
    mysqli_query($conn, $sql);
    mysqli_query($conn, $query);
    header("Location: ../../a_appointment-list.php");
} else {
    echo "im empty";
}

?>