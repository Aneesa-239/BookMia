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

<!-- doccure/  30 Nov 2019 04:12:09 GMT -->

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
                        <li class="has-submenu active">
                            <a href="#">Doctors <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li><a href="doctor-dashboard.php">Doctor Dashboard</a></li>
                                <li href="appointments.php" class="active"><a href="">Appointments</a></li>
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
                        <li class="has-submenu">
                            <a href="#">Patients <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li><a href="search.html">Search Doctor</a></li>
                                <li><a href="doctor-profile.html">Doctor Profile</a></li>
                                <li><a href="booking.html">Booking</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="booking-success.html">Booking Success</a></li>
                                <li><a href="patient-dashboard.html">Patient Dashboard</a></li>
                                <li><a href="favourites.html">Favourites</a></li>
                                <li><a href="chat.html">Chat</a></li>
                                <li><a href="profile-settings.html">Profile Settings</a></li>
                                <li><a href="change-password.html">Change Password</a></li>
                            </ul>
                        </li>
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
                            <p class="contact-header">Contact</p>
                            <p class="contact-info-header"> +1 315 369 5943</p>
                        </div>
                    </li>

                    <!-- User Menu -->
                    <li class="nav-item dropdown has-arrow logged-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <span class="user-img">
                                <img class="rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" width="31"
                                    alt="Darren Elder">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    <img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image"
                                        class="avatar-img rounded-circle">
                                </div>
                                <div class="user-text">
                                    <h6>Darren Elder</h6>
                                    <p class="text-muted mb-0">Doctor</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="doctor-dashboard.html">Dashboard</a>
                            <a class="dropdown-item" href="doctor-profile-settings.html">Profile Settings</a>
                            <a class="dropdown-item" href="login.html">Logout</a>
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
                                <li class="breadcrumb-item active" aria-current="page">Appointments</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Appointments</h2>
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
                            <div class="widget-profile pro-widget-content">
                                <div class="profile-info-widget">
                                    <a href="#" class="booking-doc-img">
                                        <img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h3>Dr. Darren Elder</h3>

                                        <div class="patient-details">
                                            <h5 class="mb-0">BDS, MDS - Oral & Maxillofacial Surgery</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-widget">
                                <nav class="dashboard-menu">
                                    <ul>
                                        <li>
                                            <a href="doctor-dashboard.html">
                                                <i class="fas fa-columns"></i>
                                                <span>Dashboard</span>
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="">
                                                <i class="fas fa-calendar-check"></i>
                                                <span>Appointments</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="my-patients.html">
                                                <i class="fas fa-user-injured"></i>
                                                <span>My Patients</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="schedule-timings.html">
                                                <i class="fas fa-hourglass-start"></i>
                                                <span>Schedule Timings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="invoices.html">
                                                <i class="fas fa-file-invoice"></i>
                                                <span>Invoices</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="reviews.html">
                                                <i class="fas fa-star"></i>
                                                <span>Reviews</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="chat-doctor.html">
                                                <i class="fas fa-comments"></i>
                                                <span>Message</span>
                                                <small class="unread-msg">23</small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="doctor-profile-settings.html">
                                                <i class="fas fa-user-cog"></i>
                                                <span>Profile Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="social-media.html">
                                                <i class="fas fa-share-alt"></i>
                                                <span>Social Media</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="doctor-change-password.html">
                                                <i class="fas fa-lock"></i>
                                                <span>Change Password</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index-2.html">
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
                        <div class="appointments">
                            <?php
                            //pull the required data from the database	
                            $today = date("Y-m-d");
                            $query = "SELECT * FROM `booking` 
									  INNER JOIN patient ON patient.PatientCode = booking.PatientCode 
									  INNER JOIN user ON user.UserCode = patient.UserCode 
									  INNER JOIN invoice ON booking.BookingCode = invoice.BookingCode 
									  INNER JOIN payment ON payment.InvoiceCode = invoice.InvoiceCode
									  WHERE DoctorCode = (Select DoctorCode From doctor 
															  					  inner join user on doctor.UserCode = user.UserCode 
																				  WHERE user.EmailAddress = '$authsess')
																				  AND Date(StartDate) >= '$today'
															  ORDER BY StartDate ASC";

                            $result = mysqli_query($conn, $query);
                            $row = [];

                            if ($result->num_rows > 0) {
                                // fetch all data from db into array 
                                $row = $result->fetch_all(MYSQLI_ASSOC);
                                $icount = 0;
                            }

                            if (!empty($row))
                                foreach ($row as $rows) {
                                    $bookingcode = $rows["BookingCode"];
                                    ?>

                            <!-- Appointment List -->
                            <div class="appointment-list">
                                <div class="profile-info-widget">
                                    <a href="patient-profile.html" class="booking-doc-img">
                                        <img src="assets/img/<?php echo $rows["image"] ?>" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h3><a id="Client name" href="patient-profile.html">
                                                <?php echo $rows["FirstName"] ?>
                                                <?php echo $rows["LastName"] ?>
                                            </a></h3>
                                        <div class="patient-details">
                                            <h5><i class="far fa-clock"></i>
                                                <?php $time = new DateTime($rows["StartDate"]);
                                                        $date = $time->format('d-M-Y');
                                                        echo $date ?>, <?php $starttime = new DateTime($rows["StartDate"]);
                                                          $st = $starttime->format('H:m');
                                                          echo $st ?>
                                            </h5>
                                            <h5><i class="fas fa-map-marker-alt"></i>
                                                <?php echo $rows["address"] ?>,
                                                <?php echo $rows["province"] ?>
                                                <?php echo $rows["country"] ?>
                                            </h5>
                                            <h5><i class="fas fa-envelope"></i>
                                                <?php echo $rows["EmailAddress"] ?>
                                            </h5>
                                            <h5 class="mb-0"><i id="" class="fas fa-phone"></i>
                                                <?php echo $rows["PhoneNumber"] ?>
                                            </h5>
                                            <h5 class="mb-0" id="patient_code" hidden></h5><i></i>
                                            <?php echo $rows["PatientCode"] ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="appointment-action">
                                    <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal"
                                        data-target="#appt_details">
                                        <i class="far fa-eye"></i> View
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                        <i class="fas fa-check"></i> Accept
                                    </a>
                                    <a href="assets/php/send_request.php?id=<?php echo $bookingcode ?>"
                                        class="btn btn-sm bg-danger-light">
                                        <i class="fas fa-times"></i> Cancel
                                    </a>
                                </div>
                            </div>
                            <!-- /Appointment List -->
                            <?php } ?>
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
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua. </p>
                                                        <div class="social-icon">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" target="_blank"><i
                                                                            class="fab fa-facebook-f"></i> </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" target="_blank"><i
                                                                            class="fab fa-twitter"></i> </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" target="_blank"><i
                                                                            class="fab fa-linkedin-in"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" target="_blank"><i
                                                                            class="fab fa-instagram"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" target="_blank"><i
                                                                            class="fab fa-dribbble"></i> </a>
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
                                                            <p> 39 Sovereign Dr, Route 21 Business Park,<br> Centurion,
                                                                0178 </p>
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
                                                                            <iframe
                                                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14360.984391829074!2d28.256738442065434!3d-25.861376505012544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e9567b26fcc118f%3A0x164a9f8a696b5813!2sRoute%2021%20Business%20Park%2C%20Centurion%2C%200178!5e0!3m2!1sen!2sza!4v1671531637140!5m2!1sen!2sza"
                                                                                width="400" height="300"
                                                                                style="border:0;" allowfullscreen=""
                                                                                loading="lazy"
                                                                                referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                                                <li><a href="term-condition.html">Terms and
                                                                        Conditions</a></li>
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

                        <!-- Appointment Details Modal -->
                        <div class="modal fade custom-modal" id="appt_details">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Appointment Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="info-details">
                                            <li>
                                                <div class="details-header">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <span class="title">#APT0001</span>
                                                            <span class="text">21 Oct 2019 10:00 AM</span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="text-right">
                                                                <button type="button"
                                                                    class="btn bg-success-light btn-sm"
                                                                    id="topup_status">Completed</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="title">Status:</span>
                                                <span class="text">Completed</span>
                                            </li>
                                            <li>
                                                <span class="title">Confirm Date:</span>
                                                <span class="text">29 Jun 2019</span>
                                            </li>
                                            <li>
                                                <span class="title">Paid Amount</span>
                                                <span class="text">$450</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Appointment Details Modal -->

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
                        <script src="assets/js/Doctor_Request.js"></script>


</body>

<!-- doccure/  30 Nov 2019 04:12:09 GMT -->

</html>