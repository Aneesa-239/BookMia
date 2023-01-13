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
								<a href="index-2.php">Home</a>
							</li>
							<li class="has-submenu active">
								<a href="#">Patients <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="search.php">Search Doctor</a></li>
									<li class="active"><a href="patient-dashboard.php">Patient Dashboard</a></li>
									<li><a href="profile-settings.php">Profile Settings</a></li>
							</ul>
							</li>	
							<li class="has-submenu">
								<a href="#">Pages <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="p_calendar.php">Calendar</a></li>
								</ul>
						</ul>
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
						
							<div class="header-contact-detail">
								<p class="contact-header">Welcome</p>
								<p class="contact-info-header"> <?php echo $_SESSION['name'] . '!'?></p>
							</div>
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
								
								$proimg = "SELECT image
										  FROM User
										  Where EmailAddress = '$authsess'";
								
								

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
													} ?>" alt="Ryan Taylor">
								</span>
							</a>
							
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
													
							
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="assets/img/<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['image'];
													} ?>" alt="User Image" class="avatar-img rounded-circle">
									</div>
									
			 <?php
								//pull the required data from the database
								$query = "SELECT FirstName,LastName,EmailAddress,PhoneNumber, DateBirth, address, city, province, country, zipcode
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
										<h6><?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['FirstName'];
													} ?> <?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['LastName'];
													} ?></h6>
										<p class="text-muted mb-0">Patient</p>
									</div>
								</div>
								<a class="dropdown-item" href="patient-dashboard.php">Dashboard</a>
								<a class="dropdown-item" href="profile-settings.php">Profile Settings</a>
								<a class="dropdown-item" href="assets/php/logout.php">Logout</a>
							</div>
						</li>
						<!-- /User Menu -->
						
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
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						
						<!-- Profile Sidebar -->
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
			
			<?php
								//pull the required data from the database
								$query = "SELECT FirstName,LastName,EmailAddress,PhoneNumber, DateBirth, address, city, province, country, zipcode, image
										  FROM User
										  Where EmailAddress = '$authsess'";
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
											<img src="assets/img/<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['image'];
													} ?>" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['FirstName'];
													} ?> <?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['LastName'];
													} ?></h3>
											<div class="patient-details">
												<h5><i class="fas fa-birthday-cake"></i> <?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['DateBirth'];
													} ?></h5>
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i></i><?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['city'];
													} ?> , <?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['province'];
													} ?></h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li class="active">
												<a href="patient-dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li>
												<a href="profile-settings.php">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="change-password.php">
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
						</div>
						<!-- / Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_billing" data-toggle="tab">Billing</a>
											</li>
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-0">
										
										<!-- Appointment Tab -->
										<div id="pat_appointments" class="tab-pane fade show active">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Doctor</th>
																	<th>Appt Date</th>
																	<th>Booking Date</th>
																	<th>Amount</th>
																	<th>Status</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Name and Surname <span>Doctor Type</span></a>
																		</h2>
																	</td>
																	<td>Appointment date <span class="d-block text-info">start time</span></td>
																	<td>Booking Date</td>
																	<td>Cost </td>
																	
																		<td><span class="badge badge-pill bg-success-light">Chose "pay name" option</span></td>
																	
																	<td class="text-right">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Name and Surname <span>Doctor Type</span></a>
																		</h2>
																	</td>
																	<td>Appointmnet date <span class="d-block text-info">tart time</span></td>
																	<td>Booking Date</td>
																	<td>Cost</td>
																	<td><span class="badge badge-pill bg-danger-light">Appointment Cancelled</span></td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-04.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Dr. Name and Surname <span>Doctor Type</span></a>
																		</h2>
																	</td>
																	<td>Appointmnet date<span class="d-block text-info">start time</span></td>
																	<td>Booking Date</td>
																	<td>Cost</td>
																
																	<td><span class="badge badge-pill bg-warning-light">Chose "Pay later" option - Billing</span></td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
														
																
														
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Appointment Tab -->
										
										<!-- Billing Tab -->
										<div id="pat_billing" class="tab-pane fade">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Invoice No</th>
																	<th>Doctor</th>
																	<th>Amount</th>
																	<th>Paid On</th>
																	<th></th>
																</tr>
															</thead>
															
															<tbody>
																<tr>
																	<td>
																		<a href="invoice-view.html">Invoive Number</a>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
																			</a>
																			<a href="doctor-profile.html">Doctor Name and Surname <span>Doctor Type</span></a>
																		</h2>
																	</td>
																	<td>Cost</td>
																	<td>Date of Billing appt</td>
																	<td class="text-right">
																		<div class="table-action">
																			<a href="invoice-view.html" class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																			<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a>
																		</div>
																	</td>
																</tr>
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Billing Tab -->
										
									</div>
									<!-- Tab Content -->
									
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
	
		
	</body>