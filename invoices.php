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
							<li class="active">
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
                            <p class="contact-info-header">
                                <?php echo $_SESSION['name'] . '!' ?>
                            </p>
                        </div>
                    </li>

                    <!-- User Menu -->
                    <li class="nav-item dropdown has-arrow logged-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <span class="user-img">
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
                                
                                <?php if (!empty($row))
                                    foreach ($row as $rows) { ?>
                                <img class="rounded-circle" src="assets/img/<?php
											if (!empty($rows['image'])) {
												echo $rows['image'];
											}else{
												echo 'patients/patient.jpg';
											}
													 ?>" width="31"
                                    alt="Ryan Taylor">
                                <?php } ?>
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

                                if ($result->num_rows > 0) {
                                    // fetch all data from db into array 
                                    $row = $result->fetch_all(MYSQLI_ASSOC);
                                }
                                ?>   
                                <div class="avatar avatar-sm">
                                      <?php if (!empty($row))
                                    foreach ($row as $rows) { ?>
                                <img class="rounded-circle" src="assets/img/<?php
											if (!empty($rows['image'])) {
												echo $rows['image'];
											}else{
												echo 'patients/patient.jpg';
											}
													 ?>" width="31"
                                    alt="Ryan Taylor">
                                <?php } ?>
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
                                    <h6> Dr.
                                        <?php if (!empty($row))
                                            foreach ($row as $rows) {
                                                echo $rows['FirstName'];
                                            } ?> <?php if (!empty($row))
                                                  foreach ($row as $rows) {
                                                      echo $rows['LastName'];
                                                  } ?>
                                    </h6>
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
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Invoices</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Invoices</h2>
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

                        <?php
                        //pull the required data from the database
                        $query = "SELECT FirstName,LastName,EmailAddress,PhoneNumber, DateBirth, address, city, image, province, country, zipcode, Doctor.Profession FROM User INNER JOIN Doctor ON User.UserCode = Doctor.UserCode WHERE User.UserCode = Doctor.UserCode AND EmailAddress = '$authsess'";

                        $result = mysqli_query($conn, $query);
                        $row = [];

                        if ($result->num_rows > 0) {
                            // fetch all data from db into array 
                            $row = $result->fetch_all(MYSQLI_ASSOC);
                        }
                        ?>

                       
								<!-- Profile Sidebar -->
							<div class="profile-sidebar">
							    
	  <?php
								//pull the required data from the database
								$query = "SELECT FirstName, LastName, EmailAddress, PhoneNumber, DateBirth, address, city, province, country, zipcode, image, Doctor.Profession FROM User 
								          INNER JOIN Doctor ON User.UserCode = Doctor.UserCode
								          WHERE User.UserCode = Doctor.UserCode AND EmailAddress = '$authsess'";
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
                                        <h3> Dr <?php if (!empty($row))
                                            foreach ($row as $rows) {
                                                echo $rows['FirstName'];
                                            } ?>
                                            <?php if (!empty($row))
                                                foreach ($row as $rows) {
                                                    echo $rows['LastName'];
                                                } ?>
                                        </h3>
                                        </h3>

                                        <div class="patient-details">
                                            <h5 class="mb-0">
                                                <?php if (!empty($row))
                                                    foreach ($row as $rows) {
                                                        echo $rows['Profession'];
                                                    } ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-widget">
                                <nav class="dashboard-menu">
                                    <ul>
                                        <li >
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
                                   
                                        <li class="active" >
                                            <a href="invoices.php">
                                                <i class="fas fa-file-invoice"></i>
                                                <span>Invoices</span>
                                            </a>
                                        </li>
                                        <li>
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
                                            <a href="assest/php/logout.php">
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
							<div class="card card-table">
								<div class="card-body">
								
									<!-- Invoice Table -->
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Invoice No</th>
													<th>Patient</th>
													<th>Amount</th>
													<th>Paid On</th>
													<th></th>
												</tr>
											</thead>
			  <?php
                                //pull the required data from the database
                                $query = "SELECT * FROM Invoice 
                                          INNER JOIN Booking ON Booking.BookingCode = Invoice.BookingCode 
                                          INNER JOIN Patient ON Patient.PatientCode = Booking.PatientCode 
                                          INNER JOIN Doctor on  Booking.DoctorCode = 
                                            (SELECT DoctorCode FROM Doctor INNER JOIN User on User.UserCode = Doctor.UserCode WHERE EmailAddress  = '$authsess')
                                         INNER JOIN User ON User.UserCode = Patient.UserCode";
                                $result = mysqli_query($conn, $query);
                                $row = [];

                                if ($result->num_rows > 0) {
                                    // fetch all data from db into array 
                                    $row = $result->fetch_all(MYSQLI_ASSOC);
                                }
                                
                                if (!empty($arr2))
                                                                foreach ($arr2 as $rows) {
                                                                    $inv = $rows['BookingCode'];
                                                                    ?>		
											<tbody>
												<tr>
													<td>
														<a href="#">#INV00<?php if (!empty($row))
                                            foreach ($row as $rows) {
                                                echo $rows['InvoiceCode'];
                                            } ?></a>
													</td>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2">
																<img class="avatar-img rounded-circle" src="assets/img/<?php
											if (!empty($rows['image'])) {
												echo $rows['image'];
											}else{
												echo 'patients/patient.jpg';
											}
													 ?>" alt="User Image">
															</a>
															<a href="#"><?php if (!empty($row))
                                            foreach ($row as $rows) {
                                                echo $rows['FirstName'];
                                            } ?>
                                            <?php if (!empty($row))
                                                foreach ($row as $rows) {
                                                    echo $rows['LastName'];
                                                } ?><span> <?php if (!empty($row))
                                                foreach ($row as $rows) {
                                                    echo $rows['PatientCode'];
                                                } ?></span></a>
														</h2>
													</td>
													<td>R <?php if (!empty($row))
                                                foreach ($row as $rows) {
                                                    echo $rows['Fees'];
                                                } ?></td>
													<td> <?php if (!empty($row))
                                                foreach ($row as $rows) {
                                                    echo $rows['StartDate'];
                                                } ?></td>
													<td class="text-right">
														<div class="table-action">
														    
														  <form method="get" action="assets/php/invoice-view.php?id=<?php echo $inv; ?>">   
                                                                        <button class="btn btn-sm bg-info-light" type='submit' id='<?php echo $inv; ?>' name='id' value="<?php echo $inv; ?>"
                                                                            ><i class="far fa-eye"></i> View</button>
                                                                            
                                                                        </button>
                                                                     </form>   
														</div>
													</td>
												</tr>
									<?php } ?>
											</tbody>
										</table>
									</div>
									<!-- /Invoice Table -->
									
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<footer class="footer">
				
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<img src="assets/img/favicon.png" alt="logo">
									</div>
									<div class="footer-about-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<div class="social-icon">
											<ul>
												<li>
													<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /Footer Widget -->
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
										<h2 class="footer-title">Contact Us</h2>
										<div class="footer-contact-info">
											<div class="footer-address">
												<span><i class="fas fa-map-marker-alt"></i></span>
												<p> 39 Sovereign Dr, Route 21 Business Park,<br> Centurion, 0178 </p>
											</div>
											<p>
												<i class="fas fa-phone-alt"></i>
												+27 15 369 5943
											</p>
											<p class="mb-0">
												<i class="fas fa-envelope"></i>
												bookmia.stratusolve@gmail.com
											</p>
										</div>
									</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
<!-- Footer Widget -->
<div class="footer-widget footer-about">
	<div class="footer-about-content">
		<h3>Our locations</h3>
		<a href="#"> <i class="fas fa-map-marker-alt"></i> Mia </a>

		<!-- google maps location -->
			 <div class="container-fluid">
				<div class="row">
					   <div class="col-md-6">
					  <div class="map_main">
					 <div class="map-responsive">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14360.984391829074!2d28.256738442065434!3d-25.861376505012544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e9567b26fcc118f%3A0x164a9f8a696b5813!2sRoute%2021%20Business%20Park%2C%20Centurion%2C%200178!5e0!3m2!1sen!2sza!4v1671531637140!5m2!1sen!2sza" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				 </div>
			  </div>
		   </div>
		<!-- google maps location -->
<!-- /Footer Widget -->
								
							</div>
							
						</div>
					</div>
				</div>
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container-fluid">				
									<!-- Copyright Menu -->
									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="term-condition.html">Terms and Conditions</a></li>
											<li><a href="privacy-policy.html">Policy</a></li>
										</ul>
									</div>
									<!-- /Copyright Menu -->
						
					</div>
				</div>
				<!-- /Footer Bottom -->
				
			</footer>
			<!-- /Footer -->
		   
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

<!-- doccure/invoices.html  30 Nov 2019 04:12:14 GMT -->
</html>