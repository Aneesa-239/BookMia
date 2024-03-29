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
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
		
		<!-- Fancybox CSS -->
		<link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">
		
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
							<li class="active"><a href="search.php">Search Doctor</a></li>
							<li>
								<a href="patient-dashboard.php" style="color: #fefefe">Patient Dashboard</a>
							</li>
							<li>
								<a href="profile-settings.php" style="color: #fefefe">Profile Settings</a>
							</li>
						</ul>
					</div>		 
					<<ul class="nav header-navbar-rht">
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
						<li class="nav-item">
							<a class="nav-link header-login" href="assets/php/logout.php">logout</a>
						</li>
					</ul>
				</nav>
			</header>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-8 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Search</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title"></h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
						</div>
						
						<div class="col-md-12 col-lg-8 col-xl-9">
						    
			<?php
				//pull the required data from the database
				$query = "SELECT User.FirstName, User.EmailAddress, User.LastName, Doctor.Profession, Doctor.Location, Doctor.Fees, Doctor.Services, image, DoctorType.DoctorTitle FROM User INNER JOIN Doctor ON User.UserCode = Doctor.UserCode INNER JOIN DoctorType ON Doctor.DoctorType = DoctorType.DocTypeID WHERE User.UserCode = Doctor.UserCode";
					$result = mysqli_query($conn, $query);
					$row = [];

				if ($result->num_rows > 0) {
					// fetch all data from db into array 
					$row = $result->fetch_all(MYSQLI_ASSOC);
					}
								
					foreach ($row as $rows) {
							$docE =$rows['EmailAddress'];	    
				    ?> 			    

							<!-- Doctor Widget -->
							<div class="card">
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img">
												<a href="p_doctor-profile.php">
													<img src="assets/img/<?php
											if (!empty($rows['image'])) {
												echo $rows['image'];
											}else{
												echo 'patients/patient.jpg';
											}
													 ?>" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div class="doc-info-cont">
												<h4 class="doc-name"><a href="p_doctor-profile.php">Dr <?php 
													
														echo $rows['FirstName'];
													 ?> <?php 
													
														echo $rows['LastName'];
													 ?></a></h4>
												<p class="doc-speciality"><?php 
														echo $rows['Profession'];
													?></p>
												<h5 class="doc-department"><?php 
														echo $rows['DoctorTitle'];
													?></h5>
											
												<div class="clinic-details">
													<p class="doc-location"><i class="fas fa-map-marker-alt"></i> <?php 
														echo $rows['Location'];
													?></p>
													<ul class="clinic-gallery">
														<li>
															<a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
																<img src="assets/img/features/feature-01.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
																<img  src="assets/img/features/feature-02.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">
																<img src="assets/img/features/feature-03.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">
																<img src="assets/img/features/feature-04.jpg" alt="Feature">
															</a>
														</li>
													</ul>
												</div>
												<div class="clinic-services">
												<?php 
														echo $rows['Services'];
													?>
												</div>
											</div>
										</div>
										<div class="doc-info-right">
											<div class="clini-infos">
												<ul>
													<li><i class="fas fa-map-marker-alt"></i><?php 
														echo $rows['Location'];
													?></li>
													<li><i class="far fa-money-bill-alt"></i>R <?php 
														echo $rows['Fees'];
													?> per hour. </li>
												</ul>
											</div>
											<div class="clinic-booking">
												<a class="view-pro-btn" href="p_doctor-profile.php">View Profile</a>
												<a class="apt-btn" href="booking.php?id=<?=$docE;?>">Book Appointment</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Doctor Widget -->
		<?php }?>
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
		
		<!-- Slick JS -->
		<script src="assets/js/slick.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

</html>