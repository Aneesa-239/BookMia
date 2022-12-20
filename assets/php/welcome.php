<?php
// start the session
session_start();

//check if the user is not logged in, then redirect the user to login page
if (!isset($_SESSION["userid"] || $_SESSION ["userid"] !== true){
    header("location: login.php");
    exit;
}
?>