<?php

require_once "config.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    if(isset($_POST['submit']) && !empty($_POST['submit'])) {/* */

        if(isset($_GET['id']) && !empty($_GET['id'])) {

			$book = $_GET['id'];

			$pat = "SELECT * FROM User INNER JOIN Patient ON Patient.UserCode = User.UserCode INNER JOIN Booking ON Booking.PatientCode = Patient.PatientCode WHERE Booking.BookingCode = '$book'";

			$result = mysqli_query($conn, $pat);
			$data = mysqli_fetch_assoc($result);

			$name = $data['FirstName'];
			$lastname = $data['LastName'];
			$patemail = $data['EmailAddress'];


			$doc = "SELECT * FROM User INNER JOIN Doctor ON Doctor.UserCode = User.UserCode INNER JOIN Booking ON Booking.DoctorCode = Doctor.DoctorCode WHERE Booking.BookingCode = '$book'";

			$res = mysqli_query($conn, $doc);
			$info = mysqli_fetch_assoc($res);

			$d_name = $info['FirstName'];
			$d_lastname = $info['LastName'];
			$d_cost = $info['Fees'];

			$b_detail = "SELECT * FROM Booking INNER JOIN Invoice ON Invoice.BookingCode = Booking.BookingCode WHERE Booking.BookingCode = '$book'";

			$resul = mysqli_query($conn, $b_detail);
			$b_data = mysqli_fetch_assoc($resul);

			$d_numinv = $b_data['InvoiceCode'];

			$time = new DateTime($b_data["StartDate"]);
			$date = $time->format('d-M-Y');

			$time = new DateTime($b_data["StartDate"]);
			$start = $time->format('H:m');

			$time = new DateTime($b_data["EndDate"]);
			$end = $time->format('H:m');
        
            
            			// generate a unique random token of length 100
			$token = bin2hex(random_bytes(50));

			$to = $patemail;
			$subject = "BookMia Booking Confirmation";

			$msg = "
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
			<img src='http://www.motseki.net.za/bookmia/user/assets/img/email/bookmia-check.png' alt='BookMia Check Icon' width='20%'>
			<h1>Thank you for the payment</h1>
		</header>
		<section>
			<p>Dear " . $name . " " . $lastname . ",</p>
			
			<p>We are looking forward to welcoming you to Mia on: " . $date . " at " . $start . " - " . $end . ".</p>
			
			<p>You’ve booked a 1 hour appointment with Dr. " . $d_name . " " . $d_lastname . ". Please try to arrive 15-20 minutes early.</p>
			
			<p>If you have questions or concerns before your session, kindly let us know using the contact details below.</p>
			
			<p>To reschedule or cancel your appointment before the scheduled time, please call our office at +27 15 369 5943 or email us at bookmia.stratusolve@gmail.com.</p>
			
			<p>Please refer to our cancellation and rescheduling policy to see if you are eligible for a full refund.</p>
			
			<p>Thanks for booking with Mia!</p>
			
			<p></p>
			
			<p>Warm regards,
			<br />
			BookMia Team
			
			Tel: +27 15 369 5943

            Email: bookmia.stratusolve@gmail.com</p>
		</section>
						<section>
			<div class='grid-container'>
			  <div class='item1'>
			  	<p><strong>INVOICE NUMBER</strong></p>
				<p> " . $d_numinv . " </p>
			  </div>
			  <div class='item2'>
			  	<p><strong>TOTAL</strong></p>
				<p> " . $d_cost . " </p>
			  </div>
			  
			</div>
		</section>
		<section id='footer'>
			<img src='http://www.motseki.net.za/bookmia/user/assets/img/email/bookmia-facebook.png' alt='Facebook'><img src='http://www.motseki.net.za/bookmia/user/assets/img/email/bookmia-twitter.png' alt='Twitter'><img src='http://www.motseki.net.za/bookmia/user/assets/img/email/bookmia-linkedin.png' alt='Linkedin'><img src='http://www.motseki.net.za/bookmia/user/assets/img/email/bookmia-instagram.png' alt='Instagram'>
			<p>Last updated December 13, 2022</p>
			<p>The information provided by BookMia ('we,' 'us,' or 'our') on www.bookmia.com (the 'Site') is for general informational purposes only. All information on the Site is provided in good faith, however we make no representation or warranty of any kind, express or implied, regarding the accuracy, adequacy, validity, reliability, availability, or completeness of any information on the Site. UNDER NO CIRCUMSTANCE SHALL WE HAVE ANY LIABILITY TO YOU FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF THE SITE OR RELIANCE ON ANY INFORMATION PROVIDED ON THE SITE. YOUR USE OF THE SITE AND YOUR RELIANCE ON ANY INFORMATION ON THE SITE IS SOLELY AT YOUR OWN RISK.</p>
		</section>
	</body>
</html>
    ";
		

		// To send HTML mail, the Content-type header must be set
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		



	 if(mail($to, $subject, $msg, $headers)){
			header("Location: ../../booking-success.php?id=$book"); // takes user to next page - end of patient experience    
			echo "Your Password has been sent to your email id";
		}
	 else {
		header("Location: ../../checkout.php");
		echo 'Please choose one of the radio buttons'; // keeps user on page
	}

	

}
}




?>