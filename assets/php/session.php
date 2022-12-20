<?php
    //Start the session
session_start();

    //If the user is already loggin in the redirect user to welcom page
if (isset($_SESSION["userid"]) && $_SESSION["userid"] === true){
    header("location: indext-2.html");
    exit;
}
?>