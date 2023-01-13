<?php
session_start();

require_once('assets/php/config.php');

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$authsess = $_SESSION['name'];

//pull the required data from the database
$query = "SELECT FirstName,LastName,EmailAddress,PhoneNumber, DateBirth, 
										  address, city, province, country, zipcode, image
										  FROM User
										  Where EmailAddress = '$authsess'";
$result = mysqli_query($conn, $query);
$row = [];

if ($result->num_rows > 0) {
    // fetch all data from db into array 
    $row = $result->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- doccure/patient-dashboard.html  30 Nov 2019 04:12:16 GMT -->

<head>
    <meta charset="utf-8">
    <title>Doccure</title>
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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->

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
                    <a href="index-2.html" class="navbar-brand logo">
                        <img src="assets/img/logo.png" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="index-2.html" class="menu-logo">
                            <img src="assets/img/logo.png" class="img-fluid" alt="Logo">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    <ul class="main-nav">
                        <li>
                            <a href="index-2.html">Home</a>
                        </li>

                        <li class="has-submenu">
                            <a href="#">Doctors <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li><a href="doctor-dashboard.html">Doctor Dashboard</a></li>
                                <li><a href="appointments.html">Appointments</a></li>
                                <li><a href="schedule-timings.html">Schedule Timing</a></li>
                                <li><a href="my-patients.html">Patients List</a></li>
                                <li><a href="patient-profile.html">Patients Profile</a></li>
                                <li><a href="chat-doctor.html">Chat</a></li>
                                <li><a href="invoices.html">Invoices</a></li>
                                <li><a href="doctor-profile-settings.html">Profile Settings</a></li>
                                <li><a href="reviews.html">Reviews</a></li>
                                <li><a href="doctor-register.html">Doctor Register</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu active">
                            <a href="#">Patients <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li><a href="search.html">Search Doctor</a></li>
                                <li><a href="doctor-profile.html">Doctor Profile</a></li>
                                <li><a href="booking.html">Booking</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="booking-success.html">Booking Success</a></li>
                                <li class="active"><a href="patient-dashboard.html">Patient Dashboard</a></li>
                                <li><a href="favourites.html">Favourites</a></li>
                                <li><a href="chat.html">Chat</a></li>
                                <li><a href="profile-settings.html">Profile Settings</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu"><a href="change-password.html">Change Password</a></li>
                        <li class="has-submenu">
                            <a href="#">Pages <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li><a href="voice-call.html">Voice Call</a></li>
                                <li><a href="video-call.html">Video Call</a></li>
                                <li><a href="search.html">Search Doctors</a></li>
                                <li><a href="calendar.html">Calendar</a></li>
                                <li><a href="components.html">Components</a></li>
                                <li class="has-submenu">
                                    <a href="invoices.html">Invoices</a>
                                    <ul class="submenu">
                                        <li><a href="invoices.html">Invoices</a></li>
                                        <li><a href="invoice-view.html">Invoice View</a></li>
                                    </ul>
                                </li>
                                <li><a href="blank-page.html">Starter Page</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="register.html">Register</a></li>
                                <li><a href="forgot-password.html">Forgot Password</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="admin/index.html" target="_blank">Admin</a>
                        </li>
                        <li class="login-link">
                            <a href="login.html">Login / Signup</a>
                        </li>
                    </ul>
                </div>
                <ul class="nav header-navbar-rht">
                    <li class="nav-item contact-item">
                        <div class="header-contact-img">
                            <i class="far fa-hospital"></i>
                        </div>
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
                                <?php if (!empty($row))
                                    foreach ($row as $rows) { ?>
                                <img class="rounded-circle" src="assets/img/<?php echo $rows['image'] ?>" width="31"
                                    alt="Ryan Taylor">
                                <?php } ?>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php if (!empty($row))
                                foreach ($row as $rows) { ?>
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    <img src="assets/img/<?php echo $rows['image'] ?>" alt="User Image"
                                        class="avatar-img rounded-circle">
                                </div>
                                <div class="user-text">
                                    <h6>
                                        <?php echo $rows['FirstName'] ?> <?php echo $rows['LastName'] ?>
                                    </h6>
                                    <p class="text-muted mb-0">Patient</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="patient-dashboard.php">Dashboard</a>
                            <a class="dropdown-item" href="profile-settings.php">Profile Settings</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                            <?php } ?>

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
                            <div class="widget-profile pro-widget-content">
                                <?php if (!empty($row))
                                    foreach ($row as $rows) { ?>
                                <div class="profile-info-widget">
                                    <a href="#" class="booking-doc-img">
                                        <img src="assets/img/<?php echo $rows['image'] ?>" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h3>
                                            <?php echo $rows['FirstName'] ?> <?php echo $rows['LastName'] ?>
                                        </h3>
                                        <div class="patient-details">
                                            <h5><i class="fas fa-user-check">

                                                </i>
                                                <?php echo $rows['EmailAddress'] ?>
                                            </h5>
                                            <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>
                                                <?php echo $rows['city'] ?>, <?php echo $rows['province'] ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
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
                                            <a class="nav-link active" href="#pat_appointments"
                                                data-toggle="tab">Appointments</a>
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
                                                                <th>Appointment Date</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $ans1 = "SELECT BookingCode, DoctorCode FROM `Booking` 
                                                                        INNER JOIN `patient` ON `patient`.PatientCode = `booking`.PatientCode 
                                                                        INNER JOIN user ON `patient`.UserCode = `user`.UserCode
                                                                        Where EmailAddress = '$authsess';";
                                                            $result = mysqli_query($conn, $ans1);
                                                            $arr = [];

                                                            if ($result->num_rows > 0) {
                                                                // fetch all data from db into array 
                                                                $arr = $result->fetch_all(MYSQLI_ASSOC);
                                                            }
                                                            if (!empty($arr))
                                                                foreach ($arr as $val) {
                                                                    $BCode = $val['BookingCode'];
                                                                    // $Doctor_Code = $val['DoctorCode'];
                                                                }
                                                            $ans2 = "SELECT * FROM `Doctor` 
                                                                        INNER JOIN `Booking` ON `Booking`.DoctorCode = `Doctor`.DoctorCode 
                                                                        INNER JOIN `user` ON `User`.UserCode = `Doctor`.UserCode
                                                                        INNER JOIN `DoctorType` ON `Doctor`.DoctorType = `DoctorType`.DocTypeID
                                                                        Where BookingCode = '$BCode';";
                                                            $result = mysqli_query($conn, $ans2);
                                                            $arr2 = [];

                                                            if ($result->num_rows > 0) {
                                                                // fetch all data from db into array 
                                                                $arr2 = $result->fetch_all(MYSQLI_ASSOC);
                                                            }

                                                            if (!empty($arr2))
                                                                foreach ($arr2 as $rows) {
                                                                    ?>
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="doctor-profile.html"
                                                                            class="avatar avatar-sm mr-2">
                                                                            <img class="avatar-img rounded-circle"
                                                                                src="assets/img/doctors/doctor-thumb-01.jpg"
                                                                                alt="User Image">
                                                                        </a>
                                                                        <a href="doctor-profile.html">Dr.
                                                                            <?php echo $rows['FirstName'] ?>
                                                                            <?php echo $rows['LastName'] ?>
                                                                            <span>
                                                                                <?php echo $rows['DoctorTitle'] ?>
                                                                            </span>
                                                                        </a>
                                                                    </h2>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                            $time = new DateTime($rows["StartDate"]);
                                                                            $date = $time->format('d-M-Y');
                                                                            echo $date ?> <span
                                                                        class="d-block text-info"><?php
                                                                                $time = new DateTime($rows["StartDate"]);
                                                                                $st = $time->format('H:m');
                                                                                echo $st;

                                                                                ?></span>
                                                                </td>
                                                                <td>
                                                                    <?php echo $rows['Fees'] ?>
                                                                </td>
                                                                <?php if ($rows['BookingStatus'] == "Active") { ?>
                                                                <td><span
                                                                        class="badge badge-pill bg-success-light">Active</span>
                                                                </td>
                                                                <?php } else { ?>
                                                                <td><span
                                                                        class="badge badge-pill bg-danger-light">Inactive</span>
                                                                </td>
                                                                <?php } ?>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="javascript:void(0);"
                                                                            class="btn btn-sm bg-primary-light">
                                                                            <i class="fas fa-print"></i> Print
                                                                        </a>
                                                                        <a href="javascript:void(0);"
                                                                            class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
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
                                                            <?php
                                                            $ans2 = "SELECT * FROM `Invoice` 
                                                                        INNER JOIN `Payment` ON `Payment`.InvoiceCode = `Invoice`.InvoiceCode 
                                                                        INNER JOIN `Booking` ON `Booking`.BookingCode = `Invoice`.BookingCode 
                                                                        INNER JOIN `Doctor` ON `Booking`.DoctorCode = `Doctor`.DoctorCode 
                                                                        INNER JOIN `user` ON `User`.UserCode = `Doctor`.UserCode
                                                                        INNER JOIN `DoctorType` ON `Doctor`.DoctorType = `DoctorType`.DocTypeID
                                                                        Where `Invoice`.BookingCode = '$BCode';";
                                                            $result = mysqli_query($conn, $ans2);
                                                            $arr2 = [];

                                                            if ($result->num_rows > 0) {
                                                                // fetch all data from db into array 
                                                                $arr2 = $result->fetch_all(MYSQLI_ASSOC);
                                                            }

                                                            if (!empty($arr2))
                                                                foreach ($arr2 as $rows) {
                                                                    ?>

                                                            <tr>
                                                                <td>
                                                                    <a
                                                                        href="invoice-view.html">#INV00<?php echo $rows['InvoiceCode'] ?></a>
                                                                </td>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="doctor-profile.html"
                                                                            class="avatar avatar-sm mr-2">
                                                                            <img class="avatar-img rounded-circle"
                                                                                src="assets/img/doctors/doctor-thumb-01.jpg"
                                                                                alt=" User Image">
                                                                        </a>
                                                                        <a href="doctor-profile.html"><?php echo $rows['FirstName']?>
                                                                            <?php echo $rows['LastName'] ?>
                                                                            <span><?php echo $rows['DoctorTitle'] ?></span></a>
                                                                    </h2>
                                                                </td>
                                                                <td>R<?php echo $rows['PaymentAmount'] ?></td>

                                                                <?php if ($rows['PaymentStatus'] == "Paid") { ?>
                                                                <td><?php
                                                                                $time = new DateTime($rows["PaymentDate"]);
                                                                                $date = $time->format('d-M-Y');
                                                                                echo $date ?>

                                                                </td>
                                                                <?php } else { ?>
                                                                <td>Pending
                                                                </td>
                                                                <?php } ?>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <a href="invoice-view.html?id=<?php echo $rows['InvoiceCode'] ?>"
                                                                            class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> View
                                                                        </a>
                                                                        <a href="javascript:void(0);"
                                                                            class="btn btn-sm bg-primary-light">
                                                                            <i class="fas fa-print"></i> Print
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
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