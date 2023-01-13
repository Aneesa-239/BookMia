<?php require_once "assets/php/config.php";?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left">
                <a href="index.php" class="logo">
                    <img src="" alt="Logo">
                </a>
                <a href="index.php" class="logo logo-small">
                    <img src="" alt="Logo" width="30" height="30">
                </a>
            </div>
            <!-- /Logo -->

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fa fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->

            <!-- Header Right Menu -->
            <ul class="nav user-menu">

                <!-- Notifications -->
                <li class="nav-item dropdown noti-dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fe fe-bell"></i> <span class="badge badge-pill">
                            <?php
                            //pull the required data from the database
                            $query = "SELECT COUNT(*) FROM cancellation where isResolved = 0";
                            $result = mysqli_query($conn, $query);
                            $row = [];

                            if ($result->num_rows > 0) {
                                // fetch all data from db into array 
                                $row = $result->fetch_all(MYSQLI_ASSOC);
                            }
                            ?>
                            <?php

                            if (!empty($row))
                                foreach ($row as $rows) {
                                    echo $rows['COUNT(*)'];
                                }
                            ?>
                        </span>

                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <?php
                            //pull the required data from the database
                                $query = "SELECT * FROM cancellation 
                                INNER JOIN doctor On cancellation.DoctorCode = doctor.DoctorCode
                                INNER JOIN user ON doctor.UserCode = user.UserCode";
                                                    $result = mysqli_query($conn, $query);
                                                    $row = [];

                                                    if ($result->num_rows > 0) {
                                                        // fetch all data from db into array 
                                                        $row = $result->fetch_all(MYSQLI_ASSOC);
                                                    }
                                                    ?>
                        <div class="noti-content">


                            <ul class="notification-list">
                                <?php  
                                if (!empty($row))
                                    foreach ($row as $rows) {
                                        ?>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="assets/img/aneesa.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Dr.
                                                        <?php echo $rows['LastName']?> requests that Booking
                                                        Number</span>
                                                    <?php echo $rows['BookingCode'] ?> <span class="noti-title">be
                                                        canceled
                                                    </span></p>
                                                <p class="noti-time"><span class="notification-time">
                                                        <?php 
                                                    $time = new DateTime($rows["DateOfCancellation"]);
                                                        $date = $time->format('d-M-Y');
                                                        echo $date ?> </span>
                                                    <span> <?php
                                                            $time = new DateTime($rows["DateOfCancellation"]);
                                                            $st = $time->format('H:m');
                                                    echo $st; 

                                                    ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <!-- /Notifications -->

                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg"
                                width="31" alt="Ryan Taylor"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="assets/img/profiles/avatar-01.jpg" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>Ryan Taylor</h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="settings.html">Settings</a>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
                <!-- /User Menu -->

            </ul>
            <!-- /Header Right Menu -->

        </div>
        <!-- /Header -->

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main</span>
                        </li>
                        <li class="active">
                            <a href="index.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="appointment-list.php"><i class="fe fe-layout"></i> <span>Appointments</span></a>
                        </li>
                        <li>
                            <a href="specialities.html"><i class="fe fe-users"></i> <span>Specialities</span></a>
                        </li>
                        <li>
                            <a href="Doctor-list.html"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                        </li>
                        <li>
                            <a href="Patient-list.html"><i class="fe fe-user"></i> <span>Patients</span></a>
                        </li>
                        <li>
                            <a href="reviews.html"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
                        </li>
                        <li>
                            <a href="transactions-list.html"><i class="fe fe-activity"></i>
                                <span>Transactions</span></a>
                        </li>
                        <li>
                            <a href="settings.html"><i class="fe fe-vector"></i> <span>Settings</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="Invoice-report.html">Invoice Reports</a></li>
                            </ul>
                        </li>
                        <li class="menu-title">
                            <span>Pages</span>
                        </li>

                        <li class="submenu">
                            <a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="login.html"> Login </a></li>
                                <li><a href="register.html"> Register </a></li>
                                <li><a href="forgot-password.html"> Forgot Password </a></li>
                                <li><a href="lock-screen.html"> Lock Screen </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="error-404.html">404 Error </a></li>
                                <li><a href="error-500.html">500 Error </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="blank-page.html"><i class="fe fe-file"></i> <span>Blank Page</span></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome Admin!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon text-primary border-primary">
                                        <i class="fe fe-users"></i>
                                    </span>
                                    <div class="dash-count">
                                        <?php
										//connect to the database
										require_once "assets/php/config.php";

										//pull the required data from the database
										$query = "SELECT COUNT(*) FROM Doctor";
										$result = mysqli_query($conn, $query);
										$row = [];

										if ($result->num_rows > 0) {
											// fetch all data from db into array 
											$row = $result->fetch_all(MYSQLI_ASSOC);
										}
										?>
                                        <h3>
                                            <?php

											if (!empty($row))
												foreach ($row as $rows) {
													echo $rows['COUNT(*)'];
												}
											?>
                                        </h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">
                                    <h6 class="text-muted">Doctors</h6>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary w-50"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon text-success">
                                        <i class="fe fe-credit-card"></i>
                                    </span>
                                    <div class="dash-count">
                                        <?php
										//connect to the database
                                        require_once "assets/php/config.php";

										//pull the required data from the database
										$query = "SELECT COUNT(*) FROM Patient";
										$result = mysqli_query($conn, $query);
										$row = [];

										if ($result->num_rows > 0) {
											// fetch all data from db into array 
											$row = $result->fetch_all(MYSQLI_ASSOC);
										}
										?>
                                        <h3>
                                            <?php

											if (!empty($row))
												foreach ($row as $rows) {
													echo $rows['COUNT(*)'];
												}

											?>


                                        </h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Patients</h6>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success w-50"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon text-danger border-danger">
                                        <i class="fe fe-folder"></i>
                                    </span>
                                    <div class="dash-count">
                                        <?php
										//connect to the database
                                        require_once "assets/php/config.php";

										//pull the required data from the database
										$query = "SELECT COUNT(*) FROM Booking 
                                                    Inner Join Cancellation On Booking.BookingCode = Cancellation.BookingCode
                                                    Where isResolved = 0";
										$result = mysqli_query($conn, $query);
										$row = [];

										if ($result->num_rows > 0) {
											// fetch all data from db into array 
											$row = $result->fetch_all(MYSQLI_ASSOC);
										}
										?>
                                        <h3>
                                            <?php

											if (!empty($row))
												foreach ($row as $rows) {
													echo $rows['COUNT(*)'];
												}
											?>
                                        </h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Appointment</h6>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger w-50"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon text-warning border-warning">
                                        <i class="fe fe-money"></i>
                                    </span>
                                    <div class="dash-count">
                                        <?php
										//connect to the database
                                        require_once "assets/php/config.php";

										//pull the required data from the database
										$query = "SELECT SUM(PaymentAmount)From Payment where PaymentStatus ='Paid'";
										$result = mysqli_query($conn, $query);
										$row = [];

										if ($result->num_rows > 0) {
											// fetch all data from db into array 
											$row = $result->fetch_all(MYSQLI_ASSOC);
										}
										?>
                                        <h3>
                                            <?php

											if (!empty($row))
												foreach ($row as $rows) {
													echo "R{$rows['SUM(PaymentAmount)']}";
												}
											?>
                                        </h3>
                                    </div>
                                </div>
                                <div class="dash-widget-info">

                                    <h6 class="text-muted">Revenue</h6>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning w-50"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-6">

                        <!-- Sales Chart -->
                        <div class="card card-chart">
                            <div class="card-header">
                                <h4 class="card-title">Revenue</h4>
                            </div>
                            <div class="card-body">
                                <div id="morrisArea"></div>
                            </div>
                        </div>
                        <!-- /Sales Chart -->

                    </div>
                    <div class="col-md-12 col-lg-6">

                        <!-- Invoice Chart -->
                        <div class="card card-chart">
                            <div class="card-header">
                                <h4 class="card-title">Status</h4>
                            </div>
                            <div class="card-body">
                                <div id="morrisLine"></div>
                            </div>
                        </div>
                        <!-- /Invoice Chart -->

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-flex">

                        <!-- Recent Orders -->
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h4 class="card-title">Doctors List</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                //connect to the database
                                require_once "assets/php/config.php";

                                //pull the required data from the database
                                $query = "SELECT Doctor.DoctorCode, 
                                          user.FirstName,
                                          user.LastName,DoctorType.DoctorTitle,
                                          user.PhoneNumber, 
                                          user.EmailAddress FROM user 
                                          INNER JOIN Doctor ON user.UserCode = Doctor.UserCode 
                                          INNER JOIN DoctorType ON DoctorType.DocTypeID = Doctor.DoctorType";
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
                                                <th>Doctor Code</th>
                                                <th>Doctor Name</th>
                                                <th>Doctor Surname</th>
                                                <th>Speciality</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                 if(!empty($row))
                                                foreach($row as $rows)
                                                    { 
                                            ?>
                                            <tr>
                                                <td><?php echo $rows['DoctorCode']; ?></td>
                                                <td><?php echo $rows['FirstName']; ?></td>
                                                <td><?php echo $rows['LastName']; ?></td>
                                                <td><?php echo $rows['DoctorTitle']; ?></td>
                                                <td><?php echo $rows['EmailAddress']; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Doctors -->

                    </div>
                    <div class="col-md-6 d-flex">

                        <!-- Feed Activity -->
                        <div class="card  card-table flex-fill">
                            <div class="card-header">
                                <h4 class="card-title">Patients List</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                //connect to the database
                                require_once "assets/php/config.php";

                                //pull the required data from the database
                                $query = "SELECT Patient.PatientCode, 
                                          user.FirstName,
                                          user.LastName,
                                          user.PhoneNumber
                                          FROM user 
                                          INNER JOIN Patient ON user.UserCode = Patient.UserCode";
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
                                                <th>Patient Code</th>
                                                <th>Patient Name</th>
                                                <th>Patient Surname</th>
                                                <th>Phone Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                 if(!empty($row))
                                                foreach($row as $rows)
                                                    { 
                                            ?>
                                            <tr>
                                                <td><?php echo $rows['PatientCode']; ?></td>
                                                <td><?php echo $rows['FirstName']; ?></td>
                                                <td><?php echo $rows['LastName']; ?></td>
                                                <td><?php echo $rows['PhoneNumber']; ?></td>
                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Feed Activity -->

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <!-- Recent Orders -->
                        <div class="card card-table">
                            <div class="card-header">
                                <h4 class="card-title">Appointment List</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                //connect to the database
                                require_once "assets/php/config.php";

                                //pull the required data from the database
                                $query = "SELECT booking.BookingCode,DoctorCode, FirstName, LastName, StartDate, 
                                            EndDate, BookingStatus, Payment.PaymentAmount 
                                            FROM Booking 
                                            INNER JOIN Invoice ON Invoice.BookingCode = Booking.BookingCode 
                                            INNER JOIN Payment ON Invoice.InvoiceCode = Payment.InvoiceCode
                                            INNER JOIN Patient ON Patient.PatientCode = Booking.PatientCode
                                            INNER JOIN User ON Patient.UserCode = User.UserCode
                                            WHERE BookingStatus = 'Active'"
                                            ;

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
                                                <th>Booking Code</th>
                                                <th>Doctor Code</th>
                                                <th>Patient Name</th>
                                                <th>Apointment Time</th>
                                                <th>Status</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                 if(!empty($row))
                                                foreach($row as $rows)
                                                    { 
                                            ?>
                                            <tr>
                                                <td><?php echo $rows['BookingCode']; ?></td>
                                                <td><?php echo $rows['DoctorCode']; ?></td>
                                                <td><?php echo $rows['FirstName']; ?> <?php echo $rows['LastName']; ?>
                                                </td>
                                                <td><?php
                                                        $time = new DateTime($rows['StartDate']);
                                                        $date = $time->format('Y-M-d'); 
                                                 echo $date ?>
                                                    <span class="text-primary d-block">
                                                        <?php
                                                                $startdate = new DateTime($rows['StartDate']);
                                                                $st = $startdate->format('H:m');

                                                                $enddate = new DateTime($rows['EndDate']);
                                                                $et = $enddate->format('H:m');

                                                        echo "{$st} - {$et}";?>
                                                    </span>
                                                </td>
                                                <?php if($rows['BookingStatus'] == "Active"){ ?>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status" class="check" checked
                                                            disabled>
                                                        <label for="status" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>

                                                <?php }else{?>

                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status" class="check" unchecked
                                                            disabled>
                                                        <label for="status" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>

                                                <?php }?>
                                                <td><?php echo "R{$rows['PaymentAmount']}"; ?> </td>

                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Recent Orders -->

                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/plugins/raphael/raphael.min.js"></script>
    <script src="assets/plugins/morris/morris.min.js"></script>
    <script src="assets/js/chart.morris.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:34 GMT -->

</html>