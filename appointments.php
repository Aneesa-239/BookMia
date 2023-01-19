<?php 
    session_start();
    
    ini_set('display_errors', '1');
		ini_set('display_startup_errors', '1');
		error_reporting(E_ALL);
	?>
	


<!DOCTYPE html> 
<html lang="en">
	

<head>
		<meta charset="utf-8">
		<title>BookMia</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		

	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		    
		 <?php

		require_once('assets/php/config.php');
		ini_set('display_errors', '1');
		ini_set('display_startup_errors', '1');
		error_reporting(E_ALL);
		$authsess = $_SESSION['name'];
		?>    
		
			<!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="doctor-dashboard.php" class="navbar-brand logo">
							<img src="assets/img/favicon.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="doctor-dashboard.php" class="menu-logo">
								<img src="assets/img/favicon.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li>
								<a href="doctor-dashboard.php">Home</a>
							</li>
							
							<li>
								<a href="calendar.php">Calendar</a>
							</li>
							
							</li>
							
						</ul>
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							
							<div class="header-contact-detail">
								<p class="contact-header">Welcome</p>
								<p class="contact-info-header"><?php echo $_SESSION['name'] . '!'?></div>
						</li>
						
			<!-- User Menu -->
						<li class="nav-item dropdown has-arrow logged-item">
<?php
								//pull the required data from the database
								$query = "SELECT FirstName,LastName,EmailAddress,PhoneNumber, DateBirth, address, city, province, country, zipcode, image
										  FROM User
										  Where EmailAddress = '$authsess'";
										  
								$result = mysqli_query($conn, $query);
								$row = [];

								if ($result->num_rows > 0) {
									// fetch all data from db into array 
									$row = $result->fetch_all(MYSQLI_ASSOC);
								}
								?>	
								
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="assets/img/<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['image'];
													} ?>" width="31" alt="Darren Elder">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
	<?php
								//pull the required data from the database
								$query = "SELECT FirstName,LastName,EmailAddress,PhoneNumber, DateBirth, address, city, province, country, zipcode, image
										  FROM User
										  Where EmailAddress = '$authsess'";
										  
								$result = mysqli_query($conn, $query);
								$row = [];
								
								$proimg = "SELECT image
										  FROM User
										  Where EmailAddress = '$authsess'";

								if ($result->num_rows > 0) {
									// fetch all data from db into array 
									$row = $result->fetch_all(MYSQLI_ASSOC);
								}
								?>
									<div class="avatar avatar-sm">
										<img src="assets/img/<?php
											if (!empty($rows['image'])) {
												echo $rows['image'];
											}else{
												echo 'patients/patient.jpg';
											}
													 ?>"  alt="User Image" class="avatar-img rounded-circle">
									</div>
 <?php
								//pull the required data from the database
								$query = "SELECT FirstName,LastName,EmailAddress,PhoneNumber, DateBirth, address, city, province, country, zipcode, image
										  FROM User
										  Where EmailAddress = '$authsess'";
								$result = mysqli_query($conn, $query);
								$row = [];

								if ($result->num_rows > 0) {
									// fetch all data from db into array 
									$row = $result->fetch_all(MYSQLI_ASSOC);
								}
								?>  
								
									<div class="user-text">
										<h6>Dr. <?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['FirstName'];
													} ?> <?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['LastName'];
													} ?></h6>
										<p class="text-muted mb-0">Doctor</p>
									</div>
								</div>
								<a class="dropdown-item" href="doctor-dashboard.php">Dashboard</a>
								<a class="dropdown-item" href="doctor-profile-settings.php">Profile Settings</a>
								<a class="dropdown-item" href="assets/php/logout.php">Logout </a>
						</li>
						<!-- /User Menu -->
						
					</ul>
				</nav>
			</header>
			<!-- /Header -->

			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Profile Sidebar -->
							<div class="profile-sidebar">
							    
	  <?php
								//pull the required data from the database
								$query = "SELECT FirstName,LastName,EmailAddress,PhoneNumber, DateBirth, address, city, province, country, zipcode, image, Doctor.Profession FROM User INNER JOIN Doctor ON User.UserCode = Doctor.UserCode WHERE User.UserCode = Doctor.UserCode AND EmailAddress = '$authsess'";
								$result = mysqli_query($conn, $query);
								$row = [];
								
								$proimg = "SELECT image FROM User Where EmailAddress = '$authsess'";

								if ($result->num_rows > 0) {
									// fetch all data from db into array 
									$row = $result->fetch_all(MYSQLI_ASSOC);
								}
								?>	
								
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="assets/img/<?php
											if (!empty($rows['image'])) {
												echo $rows['image'];
											}else{
												echo 'patients/patient.jpg';
											}
													 ?>" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3>Dr. <?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['FirstName'];
													} ?> <?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['LastName'];
													} ?></h3>
											
											<div class="patient-details">
												<h5 class="mb-0"><?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['Profession'];
													} ?></h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li>
												<a href="doctor-dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li class="active">
												<a href="appointments.php">
													<i class="fas fa-calendar-check"></i>
													<span>Appointments</span>
												</a>
											</li>
											<li>
												<a href="my-patients.php">
													<i class="fas fa-user-injured"></i>
													<span>My Patients</span>
												</a>
											</li>
									
											<li>
												<a href="invoices.php">
													<i class="fas fa-file-invoice"></i>
													<span>Invoices</span>
												</a>
											</li>
											<li >
												<a href="doctor-profile-settings.php">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="doctor-change-password.php">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="assets/php/logout.php">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
							<!-- /Profile Sidebar -->
							
						</div>
						
	                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <div class="appointments">
    
 <?php
                            //pull the required data from the database	
                            $today = date("Y-m-d");
                            
                            $query = "SELECT * FROM Booking 
									  INNER JOIN Patient ON Patient.PatientCode = Booking.PatientCode 
									  INNER JOIN User ON User.UserCode = Patient.UserCode 
									  INNER JOIN Invoice ON Booking.BookingCode = Invoice.BookingCode 
									  INNER JOIN Payment ON Payment.InvoiceCode = Invoice.InvoiceCode
									  WHERE DoctorCode = (Select DoctorCode From Doctor inner join User on Doctor.UserCode = User.UserCode 
										 WHERE User.EmailAddress = '$authsess')
																				  AND Date(StartDate) >= '$today'
															  ORDER BY StartDate ASC";

                            $result = mysqli_query($conn, $query);
                            $row = [];

                            if ($result->num_rows > 0) {
                                // fetch all data from db into array 
                                $row = $result->fetch_all(MYSQLI_ASSOC);
                                //$icount = 0;
                            }

                            if (!empty($row)){
                                foreach ($row as $rows) {
                                    $Bookingcode = $rows["BookingCode"];
                                    ?>               
                            <!-- Appointment List -->
                            <div class="appointment-list">
                                
                                <div class="profile-info-widget">
                                    <a href="my-patients.php" class="booking-doc-img">
                                        <img src="assets/img/<?php
											if (!empty($rows['image'])) {
												echo $rows['image'];
											}else{
												echo 'patients/patient.jpg';
											}
													 ?>" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h3><a id="Client name" href="my-patients.php">
                                                <?php echo $rows["FirstName"] ?>
                                                <?php echo $rows["LastName"] ?>
                                            </a></h3>
                                        <div class="Patient-details">
                                            <h5><i class="far fa-clock"></i>
                                                <?php $time = new DateTime($rows["StartDate"]);
                                                        $date = $time->format('d-M-Y');
                                                        echo $date ?>, <?php $starttime = new DateTime($rows["StartDate"]);
                                                          $st = $starttime->format('H:m');
                                                          echo $st ?>
                                            </h5>
                                            <h5><i class="fas fa-map-marker-alt"></i>
                                                <?php echo $rows["address"] ?>,
                                                <?php echo $rows["province"] ?>
                                                <?php echo $rows["country"] ?>
                                            </h5>
                                            <h5><i class="fas fa-envelope"></i>
                                                <?php echo $rows["EmailAddress"] ?>
                                            </h5>
                                            <h5 class="mb-0"><i id="" class="fas fa-phone"></i>
                                                <?php echo $rows["PhoneNumber"] ?>
                                            </h5>
                                            <h5 class="mb-0" id="Patient_code" hidden></h5><i></i>

                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="appointment-action">
                                    <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal"
                                        data-target="#appt_details">
                                        <i class="far fa-eye"></i> View
                                    </a>
                                    <a href="assets/php/send_request.php?id=<?php echo $Bookingcode ?>"
                                        class="btn btn-sm bg-danger-light">
                                        <i class="fas fa-times"></i> Cancel
                                    </a>
                                </div>
                                
							
                            </div>
                            <?php }} ?>
                            <!-- /Appointment List -->
								
								
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
		
		</div>
		<!-- /Main Wrapper -->
		
		<!-- Appointment Details Modal -->
		<div class="modal fade custom-modal" id="appt_details">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Appointment Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<ul class="info-details">
							<li>
								<div class="details-header">
									<div class="row">
										<div class="col-md-6">
											<span class="title">#APT0001</span>
											<span class="text">21 Oct 2019 10:00 AM</span>
										</div>
										<div class="col-md-6">
											<div class="text-right">
												<button type="button" class="btn bg-success-light btn-sm" id="topup_status">Completed</button>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li>
								<span class="title">Status:</span>
								<span class="text">Completed</span>
							</li>
							<li>
								<span class="title">Confirm Date:</span>
								<span class="text">29 Jun 2019</span>
							</li>
							<li>
								<span class="title">Paid Amount</span>
								<span class="text">$450</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /Appointment Details Modal -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>


</html>