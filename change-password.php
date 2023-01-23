<?php session_start(); ?>

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
								<a href="index-2.php" style="color: #fefefe" >Home</a>
							</li>
								<li>
								<a  href="search.php" style="color: #fefefe" >Search Doctor</a>
							</li>
								<li>
								<a href="patient-dashboard.php" style="color: #fefefe" >Patient Dashboard</a>
							</li>
								<li class="active"><a href="profile-settings.php">Profile Settings</a></li>
						
                        

                        
                    </ul>
                </div>
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
						  <?php
								//pull the required data from the database
								$query = "SELECT FirstName,LastName,EmailAddress,PhoneNumber, DateBirth, address, city, province, country, zipcode,image
										  FROM User
										  Where EmailAddress = '$authsess'";
										  
								$result = mysqli_query($conn, $query);
								$row = [];

								if ($result->num_rows > 0) {
									// fetch all data from db into array 
									$row = $result->fetch_all(MYSQLI_ASSOC);
								}

								?>
							<div class="header-contact-detail">
								<p class="contact-header">Welcome</p>
								<p class="contact-info-header"> <?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['FirstName'];
													} ?> <?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['LastName'];
													} ?> !</p>
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
													} ?>"
                                    alt="Ryan Taylor">
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
													} ?>" alt="User Image"
                                        class="avatar-img rounded-circle">
                                </div>
                            
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
									<li class="breadcrumb-item active" aria-current="page">Change Password</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Change Password</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Profile Sidebar -->
							<div class="profile-sidebar">
							    
					<?php
								//pull the required data from the database
								$query = "SELECT FirstName,LastName,EmailAddress,PhoneNumber, DateBirth, address, city, province, country, zipcode,image
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
												<h5><i class="fas fa-birthday-cake"></i><?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['DateBirth'];
													} ?></h5>
												<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i><?php if (!empty($row))
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
											<li>
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
											<li class="active">
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
							<!-- /Profile Sidebar -->
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 col-lg-6">
										
											<!-- Change Password Form -->
											 <form method="post" action="assets/php/cpassword.php">
											     
											     
											  <div class="form-group card-label">
														<label>Old Password</label>
													<input name="old_pws" type="password" class="form-control" required>
												</div>
												
												<div class="form-group card-label">
														<label>New Password</label>
											<input type="password" id="password" name="new_pws" class="form-control floating" required 
													   pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" 
													   title="Must contain 8 to 12 uppercase, lowercase letters, numbers and symbols">		
										
												</div>
												
											<div class="form-group card-label">
														<label>Confirm Password</label>
													<input type="password" class="form-control floating" id="retype-password">
												</div>
												
												<div class="submit-section">
													<button name="submit" type="submit" class="btn btn-primary submit-btn">Save Changes</button>
												</div>
											</form>
											<!-- /Change Password Form -->

											
										</div>
									</div>
								</div>
							</div>
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
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/change-password.html  30 Nov 2019 04:12:18 GMT -->
</html>