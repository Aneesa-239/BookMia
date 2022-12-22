<?php
    //Start the session
session_start();

    //If the user is already loggin in the redirect user to welcom page
if (isset($_SESSION["userid"]) && $_SESSION["userid"] === true){
    header("location: indext-2.html");
    exit;
}
//include('config.php');

//session_start();

//$user_check=$_SESSION['login_user'];
//$ses_sql=mysqli_query($con,"select username,mem_id from member where username='$user_check'");
//$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
//$loggedin_session=$row['username'];
//$loggedin_id=$row['mem_id'];
//if(!isset($loggedin_session) || $loggedin_session==NULL) {
// echo "Go back";
// header("Location: indext-2.html");
//}

?>