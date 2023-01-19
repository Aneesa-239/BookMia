<?php
	require_once('assets/php/config.php');
						
						
    if(isset($_GET['id']) && !empty($_GET['id'])){
        
        $docE = $_GET['id'];

	$query = "SELECT User.UserCode, User.FirstName, User.LastName, User.EmailAddress, Doctor.Profession, Doctor.Location, Doctor.Fees, Doctor.DoctorCode FROM User 
	        INNER JOIN Doctor ON User.UserCode = Doctor.UserCode 
        	WHERE User.UserCode = Doctor.UserCode AND User.EmailAddress = ' $docE'";
								
	//getting email -> put in var -> 							
	$result = mysqli_query($conn, $query);
	$row = [];
	
	if ($result->num_rows > 0) {
									// fetch all data from db into array 
									$row = $result->fetch_all(MYSQLI_ASSOC);

								}        
									
    }
?>