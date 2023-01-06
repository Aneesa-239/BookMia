<?php
    //Start the session
include('config.php');

session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($conn,"select EmailAddress from User where EmailAddress ='$user_check'");
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$loggedin_session = $row['EmailAddress'];
$loggedin_id = $row['UserCode'];

if (!isset($loggedin_session) || $loggedin_session == NULL) {
    echo "Go back";
    header("Location: index-2.html"); //If the user is already loggin in the redirect user to welcom page
}

?>