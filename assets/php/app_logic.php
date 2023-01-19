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
  
  $sql = "SELECT FirstName, LastName FROM User WHERE EmailAddress = '$email'";
  
  $res = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($res); 
  
  $name = $data['FirstName'];
  $lastname = $data['LastName'];
  

  
 
  // generate a unique random token of length 100
  $token = bin2hex(random_bytes(50));

  if (count($errors) == 0) {
    // store token in the password-reset database table against the user's email
    $sql = "INSERT INTO password_reset (email, token) VALUES ('$email', '$token')";
    $results = mysqli_query($conn, $sql);

    // Send email to user with the token in a link they can click on
    $link= "<a href=  \"http://www.motseki.net.za/bookmia/user/new_password.php?token=" . $token . "\">Click here.</a>";
    $to = $email;
    $subject = "Reset Password";
    //$msg = "<a href=  \"http://www.motseki.net.za/bookmia/user/new_password.php?token=" . $token . "\">Hi there, click on this to reset your password on our site </a>";
    
    $msg="
    <!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8' />
		<title>BookMia Email Template</title>
		<style type='text/css'>
			header{
				text-align: center;
			}
			section{
				width: 50%;
				margin:  0 auto;
			}
			.grid-container {
			  display: grid;
			  grid-template-columns: auto auto;
			  grid-gap: 10px;
			  padding: 10px;
			}
			
			.grid-container > div {
			  text-align: center;
			  padding: 40px 0;
			}
			
			.grid-container strong {
			  color: #a2a9ad;
			}
			
			.item1,
			.item2 {
			  background-color: #f3fafa;
			  border-top: 5px solid #136c20;
			}
			
			.item3 {
			  grid-column: 1 / span 2;
			}
			button {
			  color: #ffffff;
			  background-color: #136c20;
			  border-radius: 60px;
			  width: auto;
			  border: 0px solid transparent;
			  padding: 15px;
			}
			#footer{
			  color: #555555;
				border-top: 5px dashed #136c20;
				border-bottom: 5px solid #136c20;
			}
			#footer img{
			  text-align: center;
			  padding-top: 10px;
			  padding-left: 10px;
			  width: 5%;
			}
		</style>
	</head>
	<body>
		<header>
			<img src='http://www.motseki.net.za/bookmia/user/assets/img/email/bookmia-logo.png' alt='BookMia Logo' width='50%'>
			<br />
			<img src='http://www.motseki.net.za/bookmia/user/assets/img/email/reset.jpg' alt='BookMia Check Icon' width='20%'>
			<h1>Password Reset</h1>
		</header>
		<section>
			<p>Dear " . $name . ",</p>
			<p>
It seems like you forgot your password for Mia's Booking application, BookMia. If this is true, click the link below to reset your password.

Reset my password ".$link."

If you did not forget your password, please disregard this email.</p>
			<p></p>
			<p>Thanks for booking with Mia!</p>
			<p>Location: 39 Sovereign Dr, Route 21 Business Park,
Centurion, 0178</p>
			<p>Warm regards,
			<br />
			BookMia Team
			
			Tel: +27 15 369 5943

            Email: bookmia.stratusolve@gmail.com</p>
		</section>
		<section id='footer'>
			
			<p>Last updated December 13, 2022</p>
			<p>The information provided by BookMia ('we,' 'us,' or 'our') on www.bookmia.com (the 'Site') is for general informational purposes only. All information on the Site is provided in good faith, however we make no representation or warranty of any kind, express or implied, regarding the accuracy, adequacy, validity, reliability, availability, or completeness of any information on the Site. UNDER NO CIRCUMSTANCE SHALL WE HAVE ANY LIABILITY TO YOU FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF THE SITE OR RELIANCE ON ANY INFORMATION PROVIDED ON THE SITE. YOUR USE OF THE SITE AND YOUR RELIANCE ON ANY INFORMATION ON THE SITE IS SOLELY AT YOUR OWN RISK.</p>
		</section>
	</body>
</html>
    ";
    
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