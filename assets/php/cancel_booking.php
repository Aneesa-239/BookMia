<?php
require_once "config.php";
$bookingcode = $_POST['bookID'];

if (!empty($bookingcode)) {
    $sql = "UPDATE Booking SET BookingStatus ='Inactive' WHERE BookingCode = '$bookingcode'";
    $query = "UPDATE Cancellation SET isResolved =1 WHERE BookingCode = '$bookingcode'";
    mysqli_query($conn, $sql);
    mysqli_query($conn, $query);
    $response = true;
    if ($response) {
        $data = array(
            'status' => true,
            'msg' => "Success"
        );
    }
} else {
    $data = array(
        'status' => false,
        'msg' => "failure"
    );
}
echo json_encode($data);
?>