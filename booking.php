<?php
session_start();

require_once('assets/php/config.php');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

date_default_timezone_set('Africa/Johannesburg');
$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
$prev_date = date('Y-m-d', strtotime($date . ' -1 day'));
$next_date = date('Y-m-d', strtotime($date . ' +1 day'));

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

                                <li><a href="patient-dashboard.php">Patient Dashboard</a></li>

                                <li><a href="profile-settings.php">Profile Settings</a></li>

                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Pages <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">

                                <li><a href="calendar.html">Calendar</a></li>

                        </li>

                    </ul>
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
                    <div class="col-md-12 col-12">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index-2.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Booking</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Booking</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Content -->
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">

                                <?php


								if (isset($_GET['id']) && !empty($_GET['id'])) {

									$doctorchoosen = $_GET['id'];

									$query = "SELECT User.UserCode, User.FirstName, User.LastName, User.EmailAddress, Doctor.Profession, Doctor.Location, Doctor.Fees, Doctor.DoctorCode, User.image FROM User 
	        INNER JOIN Doctor ON User.UserCode = Doctor.UserCode 
        	WHERE User.UserCode = Doctor.UserCode AND User.EmailAddress = '$doctorchoosen'";

									$result = mysqli_query($conn, $query);
									$row = [];

									if ($result->num_rows > 0) {
										// fetch all data from db into array 
										$row = $result->fetch_all(MYSQLI_ASSOC);

									}


									foreach ($row as $rows) {
										$doctorchose = $rows['EmailAddress'];

										?>
                                <div class="booking-doc-info">
                                    <a href="doctor-profile.html" class="booking-doc-img">
                                        <img src="assets/img/<?php
												echo $rows['image'];
												?>" alt="User Image">
                                    </a>
                                    <div class="booking-info">
                                        <h4><a href="doctor-profile.html">Dr.<?php
												echo $rows['FirstName'];
												echo $rows['LastName'];
												?></a></h4>

                                        <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i>
                                            <?php
													echo $rows['Location'];
													?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <?php }
								} ?>
                        </div>

                        <!-- Schedule Widget -->
                        <div class="card booking-schedule schedule-widget">




                            <!-- $pat_book=$rows['EmailAddress'] -->

                            <!-- Schedule Header -->
                            <div class="schedule-header">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="day-slot">
                                            <ul>
                                                <li class="left-arrow">
                                                    <a href="?date=<?= $prev_date; ?>">
                                                        <i class="fa fa-chevron-left"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <span>
                                                        <?php echo $day = date('D', strtotime($date . '+1 day')); ?>
                                                    </span>
                                                    <span class="slot-date">
                                                        <?php echo $day = date('d M', strtotime($date . '+1 day')); ?>
                                                        <small class="slot-year">
                                                            <?php echo $day = date('Y', strtotime($date . '+1 day')); ?>
                                                        </small>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        <?php echo $day = date('D', strtotime($date . '+2 day')); ?>
                                                    </span>
                                                    <span
                                                        class="slot-date"><?php echo $day = date('d M', strtotime($date . '+2 day')); ?>
                                                        <small
                                                            class="slot-year"><?php echo $day = date('Y', strtotime($date . '+2 day')); ?></small></span>
                                                </li>
                                                <li>
                                                    <span>
                                                        <?php echo $day = date('D', strtotime($date . '+3 day')); ?></span>
                                                    <span class="slot-date">
                                                        <?php echo $day = date('d M', strtotime($date . '+3 day')); ?><small
                                                            class="slot-year">
                                                            <?php echo $day = date('Y', strtotime($date . '+3 day')); ?></small></span>
                                                </li>
                                                <li>
                                                    <span>
                                                        <?php echo $day = date('D', strtotime($date . '+4 day')); ?></span>
                                                    <span class="slot-date">
                                                        <?php echo $day = date('d M', strtotime($date . '+4 day')); ?><small
                                                            class="slot-year">
                                                            <?php echo $day = date('Y', strtotime($date . '+4 day')); ?></small></span>
                                                </li>
                                                <li>
                                                    <span>
                                                        <?php echo $day = date('D', strtotime($date . '+5 day')); ?></span>
                                                    <span class="slot-date">
                                                        <?php echo $day = date('d M', strtotime($date . '+5 day')); ?><small
                                                            class="slot-year">
                                                            <?php echo $day = date('Y', strtotime($date . '+5 day')); ?></small></span>
                                                </li>
                                                <li>
                                                    <span><?php echo $day = date('D', strtotime($date . '+6 day')); ?></span>
                                                    <span
                                                        class="slot-date"><?php echo $day = date('d M', strtotime($date . '+6 day')); ?><small
                                                            class="slot-year">
                                                            <?php echo $day = date('Y', strtotime($date . '+6 day')); ?></small></span>
                                                </li>
                                                <li>
                                                    <span><?php echo $day = date('D', strtotime($date . '+7 day')); ?></span>
                                                    <span
                                                        class="slot-date"><?php echo $day = date('d M', strtotime($date . '+7 day')); ?>
                                                        <small
                                                            class="slot-year"><?php echo $day = date('Y', strtotime($date . '+7 day')); ?></small></span>
                                                </li>
                                                <li class="right-arrow">
                                                    <a href="?date=<?= $next_date; ?>">
                                                        <i class="fa fa-chevron-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /Day Slot -->

                                    </div>
                                </div>
                            </div>
                            <!-- /Schedule Header -->

                            <!-- Schedule Content -->
                            <div class="schedule-cont">
                                <div class="row">
                                    <div class="col-md-12">

                                        <!-- Time Slot -->
                                        <div class="time-slot">
                                            <ul class="clearfix" id="slots">
                                                <li>
                                                    <a class="timing" id="slot" href="booking.php?startdate= <?php
													$day = date('d-M-Y', strtotime($date . '+1 day'));
													$startdatetime = new DateTime($day);
													$startdatetime->add(new DateInterval('PT9H00M00S'));
													// Getting the new date after addition
													echo $startdatetime->format('Y-m-d H:i:s') . "\n";
													?>?enddate= <?php
													$day = date('d-M-Y', strtotime($date . '+1 day'));
													$enddatetime = new DateTime($day);
													$enddatetime->add(new DateInterval('PT10H30M00S'));
													// Getting the new date after addition
													echo $enddatetime->format('Y-m-d H:i:s') . "\n";
													?>
														">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a class="timing" id="slot" href="#?startdate= <?php
													$day = date('d-M-Y', strtotime($date . '+1 day'));
													$startdatetime = new DateTime($day);
													$startdatetime->add(new DateInterval('PT11H00M00S'));
													// Getting the new date after addition
													echo $startdatetime->format('Y-m-d H:i:s') . "\n";
													?>?enddate= <?php
													$day = date('d-M-Y', strtotime($date . '+1 day'));
													$enddatetime = new DateTime($day);
													$enddatetime->add(new DateInterval('PT12H30M00S'));
													// Getting the new date after addition
													echo $enddatetime->format('Y-m-d H:i:s') . "\n";
													?>
														">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a class="timing" id="slot" href="#?startdate= <?php
													$day = date('d-M-Y', strtotime($date . '+1 day'));
													$startdatetime = new DateTime($day);
													$startdatetime->add(new DateInterval('PT13H00M00S'));
													// Getting the new date after addition
													echo $startdatetime->format('Y-m-d H:i:s') . "\n";
													?>?enddate= <?php
													$day = date('d-M-Y', strtotime($date . '+1 day'));
													$enddatetime = new DateTime($day);
													$enddatetime->add(new DateInterval('PT14H30M00S'));
													// Getting the new date after addition
													echo $enddatetime->format('Y-m-d H:i:s') . "\n";
													?>
														">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="timing" id="slot" href="#?startdate= <?php
													$day = date('d-M-Y', strtotime($date . '+2 day'));
													$startdatetime = new DateTime($day);
													$startdatetime->add(new DateInterval('PT9H00M00S'));
													// Getting the new date after addition
													echo $startdatetime->format('Y-m-d H:i:s') . "\n";
													?>?enddate= <?php
													$day = date('d-M-Y', strtotime($date . '+2 day'));
													$enddatetime = new DateTime($day);
													$enddatetime->add(new DateInterval('PT10H30M00S'));
													// Getting the new date after addition
													echo $enddatetime->format('Y-m-d H:i:s') . "\n";
													?>
														">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a class="timing" id="slot" href="#?startdate= <?php
													$day = date('d-M-Y', strtotime($date . '+2 day'));
													$startdatetime = new DateTime($day);
													$startdatetime->add(new DateInterval('PT11H00M00S'));
													// Getting the new date after addition
													echo $startdatetime->format('Y-m-d H:i:s') . "\n";
													?>?enddate= <?php
													$day = date('d-M-Y', strtotime($date . '+2 day'));
													$enddatetime = new DateTime($day);
													$enddatetime->add(new DateInterval('PT12H30M00S'));
													// Getting the new date after addition
													echo $enddatetime->format('Y-m-d H:i:s') . "\n";
													?>
														">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a class="timing" id="slot" href="#?startdate= <?php
													$day = date('d-M-Y', strtotime($date . '+2 day'));
													$startdatetime = new DateTime($day);
													$startdatetime->add(new DateInterval('PT13H00M00S'));
													// Getting the new date after addition
													echo $startdatetime->format('Y-m-d H:i:s') . "\n";
													?>?enddate= <?php
													$day = date('d-M-Y', strtotime($date . '+2 day'));
													$enddatetime = new DateTime($day);
													$enddatetime->add(new DateInterval('PT14H30M00S'));
													// Getting the new date after addition
													echo $enddatetime->format('Y-m-d H:i:s') . "\n";
													?>
														">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="timing" href="#">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a class="timing" href="#">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a class="timing" href="#">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="timing" href="#">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a class="timing" href="#">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a class="timing" href="#">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="timing" href="#">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a class="timing" href="#">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a class="timing" href="#">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="timing" href="#">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a class="timing" href="#">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a class="timing" href="#">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="timing" href="#">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a class="timing" href="#">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a class="timing" href="#">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /Time Slot -->

                                    </div>
                                </div>
                            </div>
                            <!-- /Schedule Content -->

                        </div>
                        <!-- /Schedule Widget -->

                        <!-- Submit Section -->
                        <div class="submit-section proceed-btn text-right">
                            <a href="checkout.php?start=<?php $_GET['startdate'] ?>"
                                class="btn btn-primary submit-btn">Proceed to Pay</a>
                        </div>
                        <!-- /Submit Section -->

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
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
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
                                                        <iframe
                                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14360.984391829074!2d28.256738442065434!3d-25.861376505012544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e9567b26fcc118f%3A0x164a9f8a696b5813!2sRoute%2021%20Business%20Park%2C%20Centurion%2C%200178!5e0!3m2!1sen!2sza!4v1671531637140!5m2!1sen!2sza"
                                                            width="400" height="300" style="border:0;"
                                                            allowfullscreen="" loading="lazy"
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

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

    <script>
    $("#slots a").click(function() {

        $("#slots a").removeClass();
        $("#slots a").addClass("timing");
        // Removes existing classes

        var linkid = $(this).attr("id");

        if (linkid == "slot") {

            $(this).addClass("timing selected"); // You can add the class to something else

        }

    });
    </script>

</body>

</html>