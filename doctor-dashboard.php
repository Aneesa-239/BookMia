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
								<a href="doctor-dashboard.php" style = "color: #fefefe">Home</a>
							</li>
							
							<li>
								<a href="calendar.php" style = "color: #fefefe" >Calendar</a>
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
								<p class="contact-info-header">Dr. <?php if (!empty($row))
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
											<li class="active">
												<a href="doctor-dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li >
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card dash-card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-4">
                                                <div class="dash-widget dct-border-rht">
                                                    <div class="circle-bar circle-bar1">
                                                        <div class="circle-graph1" data-percent="75">
                                                            <img src="assets/img/icon-01.png" class="img-fluid"
                                                                alt="patient">
                                                        </div>
                                                    </div>
                                             <?php
                                        //connect to the database
                                        require_once "assets/php/config.php";

                                        //pull the required data from the database
                                        $query = "SELECT Booking.DoctorCode, Count(Distinct(PatientCode)) FROM Booking 
				                        INNER JOIN Doctor ON Doctor.DoctorCode = Booking.DoctorCode
				                        INNER JOIN User ON User.UserCode = Doctor.UserCode
				                         WHERE User.EmailAddress =  '$authsess' ";
				
                                        $result = mysqli_query($conn, $query);
                                        $row = [];

                                        if ($result->num_rows > 0) {
                                            // fetch all data from db into array 
                                            $row = $result->fetch_all(MYSQLI_ASSOC);
                                        }
                                        ?>        
                                                    <div class="dash-widget-info">
                                                        <h6>Total Patient</h6>
                                                        <h3><?php

                                            if (!empty($row))
                                                foreach ($row as $rows) {
                                                    echo $rows['Count(Distinct(PatientCode))'];
                                                }

                                            ?></h3>
                                                        <p class="text-muted">Till Today</p>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-lg-4">
                                                <div class="dash-widget dct-border-rht">
                                                    <div class="circle-bar circle-bar2">
                                                        <div class="circle-graph2" data-percent="65">
                                                            <img src="assets/img/icon-02.png" class="img-fluid"
                                                                alt="Patient">
                                                        </div>
                                                    </div>
                                                    
              <?php
                                                    //pull the required data from the database	
                                                    $today = date("Y-m-d");
                                                    
                                                    $query = "SELECT COUNT(*) FROM Booking 
															  INNER JOIN Patient ON Patient.PatientCode = Booking.PatientCode 
															  INNER JOIN User ON User.UserCode = Patient.UserCode 
															  INNER JOIN Invoice ON Booking.BookingCode = Invoice.BookingCode 
															  INNER JOIN Payment ON Payment.InvoiceCode = Invoice.InvoiceCode
															  WHERE DoctorCode = (Select DoctorCode From Doctor 
															  					  inner join User on Doctor.UserCode = User.UserCode 
																				  WHERE User.EmailAddress = '$authsess')
																				  AND Date(StartDate) >= '$today'
															  ORDER BY StartDate ASC";

                                                    $result = mysqli_query($conn, $query);
                                                    $row = [];

                                                    if ($result->num_rows > 0) {
                                                        // fetch all data from db into array 
                                                        $row = $result->fetch_all(MYSQLI_ASSOC);
                                                    }
                                                    ?>                                      
                                                    
                                                    <div class="dash-widget-info">
                                                        <h6>Today Patient</h6>
                                                        <h3><?php

                                            if (!empty($row))
                                                foreach ($row as $rows) {
                                                    echo $rows['COUNT(*)'];
                                                }

                                            ?></h3>
                                                        <p class="text-muted"><?php echo $today ?></p>
                                                    </div>
                                                    
                                                    
                                                    
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-lg-4">
                                                <div class="dash-widget">
                                                    <div class="circle-bar circle-bar3">
                                                        <div class="circle-graph3" data-percent="50">
                                                            <img src="assets/img/icon-03.png" class="img-fluid"
                                                                alt="Patient">
                                                        </div>
                                                    </div>
                  <?php
                                                    //pull the required data from the database	
                                                    $today = date("Y-m-d");
                                                    
                                                    $query = "SELECT COUNT(*) FROM Booking 
															  INNER JOIN Patient ON Patient.PatientCode = Booking.PatientCode 
															  INNER JOIN User ON User.UserCode = Patient.UserCode 
															  INNER JOIN Invoice ON Booking.BookingCode = Invoice.BookingCode 
															  INNER JOIN Payment ON Payment.InvoiceCode = Invoice.InvoiceCode
															  WHERE DoctorCode = (Select DoctorCode From Doctor 
															  					  inner join User on Doctor.UserCode = User.UserCode 
																				  WHERE User.EmailAddress = '$authsess')
																				  
															  ";

                                                    $result = mysqli_query($conn, $query);
                                                    $row = [];

                                                    if ($result->num_rows > 0) {
                                                        // fetch all data from db into array 
                                                        $row = $result->fetch_all(MYSQLI_ASSOC);
                                                    }
                                                    ?>                                      
                                                    
                                                    <div class="dash-widget-info">
                                                        <h6>Appoinments</h6>
                                                        <h3><?php

                                            if (!empty($row))
                                                foreach ($row as $rows) {
                                                    echo $rows['COUNT(*)'];
                                                }

                                            ?></h3>
                                                        <p class="text-muted">2023</p>
                                                    </div>
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="mb-4">Patient Appoinment</h4>
                                <div class="appointment-tab">


                                    <!-- Appointment Tab -->
                                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#upcoming-appointments"
                                                data-toggle="tab">Upcoming</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#today-appointments" data-toggle="tab">Today</a>
                                        </li>
                                    </ul>
                                    <!-- /Appointment Tab -->

                                    <div class="tab-content">



                                        <!-- Upcoming Appointment Tab -->
                                        <div class="tab-pane show active" id="upcoming-appointments">
                                            <div class="card card-table mb-0">
                                                <div class="card-body">
                                                    <?php
                                                    //pull the required data from the database	
                                                    $today = date("Y-m-d");
                                                    
                                                    $query = "SELECT * FROM Booking 
															  INNER JOIN Patient ON Patient.PatientCode = Booking.PatientCode 
															  INNER JOIN User ON User.UserCode = Patient.UserCode 
															  INNER JOIN Invoice ON Booking.BookingCode = Invoice.BookingCode 
															  INNER JOIN Payment ON Payment.InvoiceCode = Invoice.InvoiceCode
															  WHERE DoctorCode = (Select DoctorCode From Doctor 
															  					  inner join User on Doctor.UserCode = User.UserCode 
																				  WHERE User.EmailAddress = '$authsess')
																				  AND Date(StartDate) >= '$today'
															  ORDER BY StartDate ASC";

                                                    $result = mysqli_query($conn, $query);
                                                    $row = [];

                                                    if ($result->num_rows > 0) {
                                                        // fetch all data from db into array 
                                                        $row = $result->fetch_all(MYSQLI_ASSOC);
                                                    }
                                                    ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-center mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Patient Name</th>
                                                                    <th>Appointment Date</th>
                                                                    <th class="text-left">Invoice Code</th>
                                                                    <th class="text-center">Paid Amount</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if (!empty($row))
                                                                    foreach ($row as $rows) {
                                                                        ?>
                                                                <tr>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="patient-profile.php"
                                                                                class="avatar avatar-sm mr-2"><img
                                                                                    class="avatar-img rounded-circle"
                                                                                    src="assets/img/<?php
											if (!empty($rows['image'])) {
												echo $rows['image'];
											}else{
												echo 'patients/patient.jpg';
											}
													 ?>"
                                                                                    alt="User Image"></a>
                                                                            <a href="patient-profile.html">
                                                                                <?php echo $rows["FirstName"] ?>
                                                                                <?php echo $rows["LastName"] ?>
                                                                                <span>
                                                                                    <?php echo $rows["PatientCode"] ?>
                                                                                </span>
                                                                            </a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>
                                                                        <?php $time = new DateTime($rows["StartDate"]);
                                                                                $date = $time->format('Y-M-d');
                                                                                echo $date ?><span
                                                                            class="d-block text-info">Time:
                                                                            <?php $starttime = new DateTime($rows["StartDate"]);
                                                                                    $st = $starttime->format('H:i');
                                                                                    echo $st ?>-<?php $endtime = new DateTime($rows["EndDate"]);
                                                                                      $et = $endtime->format('H:i');
                                                                                      echo $et ?></span>
                                                                    </td>
                                                                    <td class="text-left">
                                                                        #INV00<?php echo $rows["InvoiceCode"] ?></td>
                                                                    <td class="text-center">
                                                                        R<?php echo $rows["PaymentAmount"] ?></td>
                                                                    <td class="text-right">
                                                                        <div class="table-action">
                                                                            <a href="javascript:void(0);"
                                                                                class="btn btn-sm bg-info-light">
                                                                                <i class="far fa-eye"></i> View
                                                                            </a>

                                                                            <a href="javascript:void(0);"
                                                                                class="btn btn-sm bg-danger-light">
                                                                                <i class="fas fa-times"></i> Cancel
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Upcoming Appointment Tab -->

                                        <!-- Today Appointment Tab -->
                                        <div class="tab-pane" id="today-appointments">
                                            <div class="card card-table mb-0">
                                                <div class="card-body">
                                                    <?php
                                                    //pull the required data from the database	
                                                    //$today = date("Y-m-d");
                                                    $query1 = "SELECT * FROM Booking 
															  INNER JOIN Patient ON Patient.PatientCode = Booking.PatientCode 
															  INNER JOIN User ON User.UserCode = Patient.UserCode 
															  INNER JOIN Invoice ON Booking.BookingCode = Invoice.BookingCode 
															  INNER JOIN Payment ON Payment.InvoiceCode = Invoice.InvoiceCode
															  WHERE DoctorCode = (Select DoctorCode From Doctor 
															  					  inner join User on Doctor.UserCode = User.UserCode 
																				  WHERE User.EmailAddress = '$authsess')
																				  AND Date(StartDate) = '$today'
															";

                                                    $result = mysqli_query($conn, $query1);
                                                    $row2 = [];

                                                    if ($result->num_rows >= 0) {
                                                        // fetch all data from db into array 
                                                        $row2 = $result->fetch_all(MYSQLI_ASSOC);

                                                        ?>
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-center mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Patient Name</th>
                                                                    <th>Appointment Date</th>

                                                                    <th class="text-center">Paid Amount</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    if (!empty($row2))
                                                                        foreach ($row2 as $rows2) {
                                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="patient-profile.php"
                                                                                class="avatar avatar-sm mr-2"><img
                                                                                    class="avatar-img rounded-circle"
                                                                                    src="assets/img/<?php
											if (!empty($rows2['image'])) {
												echo $rows2['image'];
											}else{
												echo 'patients/patient.jpg';
											}
													 ?>"
                                                                                    alt="User Image"></a>
                                                                            <a href="patient-profile.html">
                                                                                <?php echo $rows2["FirstName"] ?>
                                                                                <?php echo $rows2["LastName"] ?>
                                                                                <span>#INV00<?php echo $rows2["InvoiceCode"] ?></span>
                                                                            </a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>
                                                                        <?php $time = new DateTime($rows2["StartDate"]);
                                                                                    $date = $time->format('Y-M-d');
                                                                                    echo $date ?><span
                                                                            class="d-block text-info">Time:
                                                                            <?php $starttime = new DateTime($rows2["StartDate"]);
                                                                                        $st = $starttime->format('H:i');
                                                                                        echo $st ?>-<?php $endtime = new DateTime($rows2["EndDate"]);
                                                                                          $et = $endtime->format('H:i');
                                                                                          echo $et ?></span>
                                                                    </td>

                                                                    <td class="text-center">
                                                                        R<?php echo $rows2["PaymentAmount"] ?></td>
                                                                    <td class="text-right">
                                                                        <div class="table-action">
                                                                            <a href="javascript:void(0);"
                                                                                class="btn btn-sm bg-info-light">
                                                                                <i class="far fa-eye"></i> View
                                                                            </a>

                                                                            <a href="javascript:void(0);"
                                                                                class="btn btn-sm bg-danger-light">
                                                                                <i class="fas fa-times"></i> Cancel
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                        <?php } else { ?>
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-center mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Patient Name</th>
                                                                        <th>Appt Date</th>

                                                                        <th class="text-center">Paid Amount</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>

                                                                        </td>
                                                                        <td></td>

                                                                        <td class="text-center"></td>
                                                                        <td class="text-right">

                                                                        </td>
                                                                    </tr>
                                                                    </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Today Appointment Tab -->
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

        <!-- Circle Progress JS -->
        <script src="assets/js/circle-progress.min.js"></script>

        <!-- Custom JS -->
        <script src="assets/js/script.js"></script>

</body>

</html>