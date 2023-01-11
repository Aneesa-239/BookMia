<?php

require_once "config.php";

session_start();
$errors = [];
$user_id = "";

        ini_set('display_errors', '1');
		ini_set('display_startup_errors', '1');
		error_reporting(E_ALL);
		
		
/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if(isset($_POST) & !empty($_POST)){
  $email = $_POST['forgotpws_email'];
  $sql = "SELECT * FROM User WHERE EmailAddress = '$email'";
  $res = mysqli_query($conn, $sql);

  
 
  // generate a unique random token of length 100
  $token = bin2hex(random_bytes(50));

  if (count($errors) == 0) {
    // store token in the password-reset database table against the user's email
    $sql = "INSERT INTO password_reset (email, token) VALUES ('$email', '$token')";
    $results = mysqli_query($conn, $sql);

    // Send email to user with the token in a link they can click on
    $link= "http://www.motseki.net.za/bookmia/user/new_password.php";
    $to = $email;
    $subject = "Reset Password";
    $msg = "<a href=  \"http://www.motseki.net.za/bookmia/user/new_password.php?token=" . $token . "\">Hi there, click on this to reset your password on our site </a>";
    
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    //$headers .= 'info@examplesite.com';
    
    
   
    if(mail($to, $subject, $msg, $headers)){
      header("Location: ../../login.php");      
      echo "Your Password has been sent to your email id";
    }else{
      header("Location: ../../new_password.php");   
      echo "Failed to Recover your password, try again";
    }
  }else{
    echo "Email does not exist in database";
  }
  
}
 
if(isset($_POST) & !empty($_POST)){
    
  $new_pass = $_POST['new_pass'];
  $new_pass_c = $_POST['new_pass_c'];
  $email = $_POST['email'];
  
          ini_set('display_errors', '1');
		ini_set('display_startup_errors', '1');
		error_reporting(E_ALL);

 $token = $_SESSION['token'];
 
  if ($new_pass != $new_pass_c) array_push($errors, "Password do not match");
  
  if (count($errors) === 0)
    // select email address of user from the password_reset table 
    $sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
    $results = mysqli_query($conn, $sql);
    $email = mysqli_fetch_assoc($results)['email'];

    if ($email) {
      $new_pas = md5($new_pass);
      $sql = "UPDATE User SET UserPassword='$new_pas' WHERE EmailAddress ='$email'";
      $results = mysqli_query($conn, $sql);
       header("Location: ../../login.php");      
      echo "Your Password has been sent to your email id";
    }
  
}

?>