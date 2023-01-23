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
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
		
		<link rel="stylesheet" href="assets/plugins/dropzone/dropzone.min.css">
		
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
							<li >
								<a href="doctor-dashboard.php" style="color: #fefefe">Home</a>
							</li>
							
						
						
					
							<li>
								<a href="calendar.php" style="color: #fefefe">Calendar</a>
							</li>
							
							</li>
							
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
													} ?>"  alt="Doc Photo">
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
										<img src="assets/img/<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['image'];
													} ?>" alt="Doc Image" class="avatar-img rounded-circle">
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
                                    <h6><?php if (!empty($row))
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
								<a class="dropdown-item" href="assets/php/logout.php">Logout</a>
							</div>
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
											<img src="assets/img/<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['image'];
													} ?>" alt="doc image">
										</a>
										<div class="profile-det-info">
											<h3>Dr <?php if (!empty($row))
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
											<li>
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
										
										
											<li class="active">
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
						    <div class="card">
                            <div class="card-body">
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
								
								
						
	<!-- Profile Settings Form -->
                                <form method="post" action="assets/php/update-Docprofile.php">
                                    <div class="row form-row">

                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <div class="change-avatar">
                                                    <div class="profile-img">
                                                        <img src="assets/img/<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['image'];
													} ?>" alt="User Image">
                                                    </div>
                                                    <div class="upload-img">
                                                      
                                                      <input type="file" name="uploadfile" id="file">  
                                                        <input type="submit" value="upload" name="upload">  
                                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max
                                                            size of 2MB</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="col-12 col-md-6">
                                            <div class="form-group card-label">
														<label>First Name</label>
                                                <input type="text" name="f_name" class="form-control" value="<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['FirstName'];
													} ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group card-label">
														<label>Last Name</label>
                                                <input type="text" name="l_name" class="form-control" value="<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['LastName'];
													} ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                           <div class="form-group card-label">
														<label>Date of Birth</label>
                                                <div class="cal-icon">
                                                    <input type="text" name="DOB" class="form-control"
                                                        value="<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['DateBirth'];
													} ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                         <div class="form-group card-label">
														<label>Email Address</label>
                                                <input type="email" name="email" class="form-control" value="<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['EmailAddress'];
													} ?>"disabled=disabled>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                        <div class="form-group card-label">
														<label>Mobile Number</label>
                                                <input type="text" name="phone_nr" class="form-control" value="<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['PhoneNumber'];
													} ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group card-label">
														<label>Home Address</label>
                                                <input type="text" name="address" class="form-control" value="<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['address'];
													} ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                           <div class="form-group card-label">
														<label>City</label>
                                                <input type="text" name="city" class="form-control" value="<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['city'];
													} ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                           <div class="form-group card-label">
														<label>Province</label>
                                                <input type="text" name="province" class="form-control" value="<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['province'];
													} ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                           <div class="form-group card-label">
														<label>Zip Code</label>
                                                <input type="text" name="zipcode"class="form-control" value="<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['zipcode'];
													} ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group card-label">
														<label>Country</label>
                                                <input type="text" name="country"class="form-control" value="<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['country'];
													} ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button type="submit" name="submit" class="btn btn-primary submit-btn">Save
                                            Changes</button>
                                    </div>
                                </form>
                                <!-- /Profile Settings Form -->
							</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
			   
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
		
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		
		<!-- Dropzone JS -->
		<script src="assets/plugins/dropzone/dropzone.min.js"></script>
		
		<!-- Bootstrap Tagsinput JS -->
		<script src="assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
		
		<!-- Profile Settings JS -->
		<script src="assets/js/profile-settings.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>
</html>