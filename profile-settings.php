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

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

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
                            <a href="search.php" style="color: #fefefe" >Search Doctor</a>
                        </li>
                        <li>
                            <a href="patient-dashboard.php" style="color: #fefefe">Patient Dashboard</a>
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
                                  <img class="rounded-circle" alt="User Image" src="assets/img/<?php
											if (!empty($rows['image'])) {
												echo $rows['image'];
											}else{
												echo 'patients/patient.jpg';
											}
													 ?>">
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
                                      <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/<?php
											if (!empty($rows['image'])) {
												echo $rows['image'];
											}else{
												echo 'patients/patient.jpg';
											}
													 ?>"> 
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
                                <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Profile Settings</h2>
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
                                     <img class="rounded-circle" alt="User Image" src="assets/img/<?php
											if (!empty($rows['image'])) {
												echo $rows['image'];
											}else{
												echo 'patients/patient.jpg';
											}
													 ?>">
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
                                        <li class="active">
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
                    <!-- /Profile Sidebar -->

                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <div class="card">
                            <div class="card-body">
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

                                <!-- Profile Settings Form -->
                                <form method="post" action="assets/php/update-profile.php" enctype="multipart/form-data">
                                    <div class="row form-row">
                                        
            

                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <div class="change-avatar">
                                                    <div class="profile-img">
                                                         <img class="img-fluid" alt="User Image" src="assets/img/<?php
											if (!empty($rows['image'])) {
												echo $rows['image'];
											}else{
												echo 'patients/patient.jpg';
											}
													 ?>">
                                                    </div>
                                                    <div class="upload-img">
                                                      
                                                      <input type="file" name="uploadfile" id="file">  
                                                        <input type="submit" value="upload" name="upload">  
                                                        <small class="form-text text-muted">Allowed JPG, JPEG or PNG. Max
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
													} ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group card-label">
														<label>Last Name</label>
                                                <input type="text" name="l_name" class="form-control" value="<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['LastName'];
													} ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                           <div class="form-group card-label">
														<label>Date of Birth</label>
                                                <div class="cal-icon">
                                                    <input type="text" name="DOB" class="form-control" placeholder="0000-00-00" value="<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['DateBirth'];
													} ?> ">
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
        <!-- /Page Content -->



</body>

</html>