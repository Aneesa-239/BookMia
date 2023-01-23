<?php 
    session_start(); 

	require_once('assets/php/config.php');
	

	
		ini_set('display_errors', '1');
		ini_set('display_startup_errors', '1');
		error_reporting(E_ALL);
		
		$authsess = $_SESSION['name'];
		
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
						<a href="index-2.php" class="navbar-brand logo">
							<img src="assets/img/favicon.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index-2.php" class="menu-logo">
								<img src="assets/img/favicon.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li>
								<a href="index-2.php" style="color: #fefefe">Home</a>
							</li>
							<li>
								<a href="search.php" style="color: #fefefe">Search Doctor</a>
							</li>
							<li>
								<a href="p_doctor-profile.php" style="color: #fefefe" >Doctor Profile</a>
							</li>
							<li>
								<a href="patient-dashboard.php"style="color: #fefefe" >Patient Dashboard</a>
							</li>
							
							
						
						
						</ul>	 
						</div>		 
					<<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
	<div class="header-contact-detail">
								<p class="contact-header">Welcome</p>
								<p class="contact-info-header"> <?php echo $_SESSION['name'] . '!'?></p>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link header-login" href="assets/php/logout">logout</a>
						</li>
					</ul>
				</nav>
			</header>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content success-page-cont">
				<div class="container-fluid">
				
					<div class="row justify-content-center">
						<div class="col-lg-6">
						
							<!-- Success Card  $_GET['id'] = "BC001";-->
							<div class="card success-card">
								<div class="card-body">
								    <?php
								    
							    
								    
	 if(isset($_GET['id']) && !empty($_GET['id'])){
        
        $app= $_GET['id'];

	  $query = "SELECT * FROM Booking INNER JOIN Doctor ON Doctor.DoctorCode = Booking.DoctorCode INNER JOIN User ON User.UserCode = Doctor.UserCode WHERE Booking.BookingCode = '$app'";

							
	$result = mysqli_query($conn, $query);
	$row = [];
	
	
	
	if ($result->num_rows > 0) {
									// fetch all data from db into array 
									$row = $result->fetch_all(MYSQLI_ASSOC);

								}        
									
						
                                foreach ($row as $rows) {
                                   
								    
							?>				
									<div class="success-cont">
										<i class="fas fa-check"></i>
										<h3>Payment was Successful!</h3>
										<p>Appointment booked with <strong>Dr. <?php 
													echo $rows['FirstName'];
												?> 	
													<?php echo $rows['LastName']?>
													</strong><br> on <strong><?php 
												        $time = new DateTime($rows["StartDate"]);
												        $date = $time->format('d-M-Y');
														echo $date;?> <?php 
												        $time = new DateTime($rows["StartDate"]);
												        $start= $time->format('H:m');
														echo $start;?> - <?php 
												        $time = new DateTime($rows["EndDate"]);
												        $end = $time->format('H:m');
														echo $end;?></strong></p>
												
														
										<a href="https://divblox-pdf.azurewebsites.net/?api_key=7Qq9cT2PAgWzSmi4FI0R&pdf_url=http://www.motseki.net.za/bookmia/user/assets/php/invoice-view.php?id=<?php echo $app; ?>" name="submit" type="submit" class="btn btn-primary view-inv-btn">View Invoice</a>
									
									</div>
									<?php } } ?>
								</div>
							</div>
							<!-- /Success Card invoice-view.php?id=<?=$inv;?>-->
							
						</div>
					</div>
					
				</div>
			</div>		
			<!-- /Page Content -->
   
		
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

</html>