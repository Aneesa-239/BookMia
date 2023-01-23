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
if (isset($_GET['code'])) {
    $final = $_GET['code'];
} else {
    $final = "BC00";
}
if (isset($_GET['flag'])) {
    $flag = $_GET['flag'];
} else {
    $flag = "";
}
if (isset($_GET['choice'])) {
    $choice = $_GET['choice'];
} else {
    $choice = "unknown";
}

$authsess = $_SESSION['name'];

$query = "SELECT * FROM User 
	        INNER JOIN Patient ON User.UserCode = Patient.UserCode 
        	WHERE  User.EmailAddress = '$authsess'";

$result = mysqli_query($conn, $query);
$row = [];

if ($result->num_rows > 0) {
    // fetch all data from db into array 
    $row = $result->fetch_all(MYSQLI_ASSOC);


}
foreach ($row as $rows) {
    $patientcode = $rows['PatientCode'];
}


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
                            <a href="index-2.php" style="color: #fefefe">Home</a>
                        </li>
                        <li>
                            <a href="search.php" style="color: #fefefe">Search Doctor</a>
                        </li>
                        <li>
                            <a href="patient-dashboard.php" style="color: #fefefe">Patient Dashboard</a>
                        </li>
                        <li>
                            <a href="profile-settings.php" style="color: #fefefe">Profile Settings</a>
                        </li>
                        < </ul>
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
                                        $doctorcode = $rows['DoctorCode'];

                                        ?>
                                <div class="booking-doc-info">
                                    <a href="doctor-profile.html" class="booking-doc-img">
                                        <img src="assets/img/<?php
                                                echo $rows['image'];
                                                ?>" alt="User Image">
                                    </a>
                                    <div class="booking-info">
                                        <h4><a href="doctor-profile.html">Dr. <?php
                                                echo $rows['FirstName']; ?>

                                                <?php echo $rows['LastName'];
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
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert2" hidden>
                                <strong>Error!</strong> A <a href="#" class="alert-link">Booking </a> has not been made
                                please pick another date.
                                <button onclick="reloadpage()" type="button" class="close" data-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <!-- $pat_book=$rows['EmailAddress'] -->

                            <!-- Schedule Header -->
                            <div class="schedule-header">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="day-slot">
                                            <ul>
                                                <li class="left-arrow">
                                                    <a href="?id=<?= $doctorchoosen; ?>&date=<?= $prev_date; ?>">
                                                        <i class="fa fa-chevron-left"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <span>
                                                        <?php
                                                        $w_day1 = date('Y-m-d', strtotime($date . '+1 day'));
                                                        $day1 = date('D', strtotime($date . '+1 day'));
                                                        $year = date('Y', strtotime($date . '+1 day'));
                                                        $longdate = date('d M', strtotime($date . '+1 day'));
                                                        $weekday = false;
                                                        if ($day1 == 'Sat') {
                                                            $day1 = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else if ($day1 == 'Sun') {
                                                            $day1 = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else {
                                                            $weekday = true;
                                                        }
                                                        if ($weekday) {
                                                            echo $day1;
                                                            ?>
                                                    </span>
                                                    <span class="slot-date">
                                                        <?php echo $longdate; ?>
                                                        <small class="slot-year">
                                                            <?php echo $year ?>
                                                        </small>
                                                    </span>
                                                    <?php } ?>
                                                </li>
                                                <li>
                                                    <span>
                                                        <?php
                                                        $w_day2 = date('Y-m-d', strtotime($date . '+2 day'));
                                                        $day2 = date('D', strtotime($date . '+2 day'));
                                                        $year = date('Y', strtotime($date . '+2 day'));
                                                        $longdate = date('d M', strtotime($date . '+2 day'));
                                                        $weekday = false;
                                                        if ($day2 == 'Sat') {
                                                            $day2 = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else if ($day2 == 'Sun') {
                                                            $day2 = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else {
                                                            $weekday = true;
                                                        }
                                                        if ($weekday) {
                                                            echo $day2;
                                                            ?>
                                                    </span>
                                                    <span class="slot-date"><?php echo $longdate ?>
                                                        <small class="slot-year"><?php echo $year ?></small>
                                                    </span>
                                                    <?php } ?>
                                                </li>
                                                <li>
                                                    <span>
                                                        <?php
                                                        $w_day3 = date('Y-m-d', strtotime($date . '+3 day'));
                                                        $day3 = date('D', strtotime($date . '+3 day'));
                                                        $year = date('Y', strtotime($date . '+3 day'));
                                                        $longdate = date('d M', strtotime($date . '+3 day'));
                                                        $weekday = false;
                                                        if ($day3 == 'Sat') {
                                                            $day3 = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else if ($day3 == 'Sun') {
                                                            $day3 = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else {
                                                            $weekday = true;
                                                        }
                                                        if ($weekday) {
                                                            echo $day3;
                                                            ?>
                                                    </span>
                                                    <span class="slot-date">
                                                        <?php echo $longdate; ?><small class="slot-year">
                                                            <?php echo $year ?></small></span>
                                                    <?php } ?>
                                                </li>
                                                <li>
                                                    <span>
                                                        <?php
                                                        $w_day4 = date('Y-m-d', strtotime($date . '+4 day'));
                                                        $day4 = date('D', strtotime($date . '+4 day'));
                                                        $year = date('Y', strtotime($date . '+4 day'));
                                                        $longdate = date('d M', strtotime($date . '+4 day'));
                                                        $weekday = false;
                                                        if ($day4 == 'Sat') {
                                                            $day4 = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else if ($day4 == 'Sun') {
                                                            $day4 = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else {
                                                            $weekday = true;
                                                        }
                                                        if ($weekday) {
                                                            echo $day4;
                                                            ?></span>
                                                    <span class="slot-date">
                                                        <?php echo $longdate; ?><small class="slot-year">
                                                            <?php echo $year; ?>
                                                        </small></span>
                                                    <?php } ?>
                                                </li>
                                                <li>
                                                    <span>
                                                        <?php
                                                        $w_day5 = date('Y-m-d', strtotime($date . '+5 day'));
                                                        $day5 = date('D', strtotime($date . '+5 day'));
                                                        $year = date('Y', strtotime($date . '+5 day'));
                                                        $longdate = date('d M', strtotime($date . '+5 day'));
                                                        $weekday = false;
                                                        if ($day5 == 'Sat') {
                                                            $day5 = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else if ($day5 == 'Sun') {
                                                            $day5 = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else {
                                                            $weekday = true;
                                                        }
                                                        if ($weekday) {
                                                            echo $day5;
                                                            ?>
                                                    </span>
                                                    <span class="slot-date">
                                                        <?php echo $longdate; ?><small class="slot-year">
                                                            <?php echo $year; ?>
                                                        </small></span>
                                                    <?php } ?>
                                                </li>
                                                <li>
                                                    <span>
                                                        <?php
                                                        $w_day6 = date('Y-m-d', strtotime($date . '+6 day'));
                                                        $day6 = date('D', strtotime($date . '+6 day'));
                                                        $year = date('Y', strtotime($date . '+6 day'));
                                                        $longdate = date('d M', strtotime($date . '+6 day'));
                                                        $weekday = false;
                                                        if ($day6 == 'Sat') {
                                                            $day6 = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else if ($day6 == 'Sun') {
                                                            $day6 = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else {
                                                            $weekday = true;
                                                        }
                                                        if ($weekday) {
                                                            echo $day6;
                                                            ?>
                                                    </span>
                                                    <span class="slot-date"><?php echo $longdate; ?><small
                                                            class="slot-year">
                                                            <?php echo $year; ?></small></span>
                                                    <?php } ?>
                                                </li>
                                                <li>
                                                    <span><?php
                                                    $w_day7 = date('Y-m-d', strtotime($date . '+7 day'));
                                                    $day7 = date('D', strtotime($date . '+7 day'));
                                                    $year = date('Y', strtotime($date . '+7 day'));
                                                    $longdate = date('d M', strtotime($date . '+7 day'));
                                                    $weekday = false;
                                                    if ($day7 == 'Sat') {
                                                        $day7 = "Weekend";
                                                        $longdate = "Closed";
                                                        $year = "";
                                                        $weekday = true;
                                                    } else if ($day7 == 'Sun') {
                                                        $day7 = "Weekend";
                                                        $longdate = "Closed";
                                                        $year = "";
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        echo $day7;
                                                        ?></span>
                                                    <span class="slot-date"><?php echo $longdate; ?>
                                                        <small class="slot-year">
                                                            <?php echo $year; ?></small></span>
                                                    <?php } ?>
                                                </li>
                                                <li class="right-arrow">
                                                    <a href="?id=<?= $doctorchoosen; ?>&date=<?= $next_date; ?>">
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
                                            <ul class="clearfix">
                                                <li>
                                                    <a <?php
                                                    $start = new DateTime($w_day1);
                                                    $start->add(new DateInterval('PT09H00M00S'));
                                                    $end = new DateTime($w_day1);
                                                    $end->add(new DateInterval('PT10H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $start = new DateTime($w_day1);
                                                    $start->add(new DateInterval('PT11H00M00S'));
                                                    $end = new DateTime($w_day1);
                                                    $end->add(new DateInterval('PT12H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $start = new DateTime($w_day1);
                                                    $start->add(new DateInterval('PT13H00M00S'));
                                                    $end = new DateTime($w_day1);
                                                    $end->add(new DateInterval('PT14H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a <?php
                                                    $start = new DateTime($w_day2);
                                                    $start->add(new DateInterval('PT09H00M00S'));
                                                    $end = new DateTime($w_day2);
                                                    $end->add(new DateInterval('PT10H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $start = new DateTime($w_day2);
                                                    $start->add(new DateInterval('PT11H00M00S'));
                                                    $end = new DateTime($w_day2);
                                                    $end->add(new DateInterval('PT12H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $start = new DateTime($w_day2);
                                                    $start->add(new DateInterval('PT13H00M00S'));
                                                    $end = new DateTime($w_day2);
                                                    $end->add(new DateInterval('PT14H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a <?php
                                                    $start = new DateTime($w_day3);
                                                    $start->add(new DateInterval('PT09H00M00S'));
                                                    $end = new DateTime($w_day3);
                                                    $end->add(new DateInterval('PT10H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $start = new DateTime($w_day3);
                                                    $start->add(new DateInterval('PT11H00M00S'));
                                                    $end = new DateTime($w_day3);
                                                    $end->add(new DateInterval('PT12H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $start = new DateTime($w_day3);
                                                    $start->add(new DateInterval('PT13H00M00S'));
                                                    $end = new DateTime($w_day3);
                                                    $end->add(new DateInterval('PT14H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a <?php
                                                    $start = new DateTime($w_day4);
                                                    $start->add(new DateInterval('PT09H00M00S'));
                                                    $end = new DateTime($w_day4);
                                                    $end->add(new DateInterval('PT10H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $start = new DateTime($w_day4);
                                                    $start->add(new DateInterval('PT11H00M00S'));
                                                    $end = new DateTime($w_day4);
                                                    $end->add(new DateInterval('PT12H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $start = new DateTime($w_day4);
                                                    $start->add(new DateInterval('PT13H00M00S'));
                                                    $end = new DateTime($w_day4);
                                                    $end->add(new DateInterval('PT14H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a <?php
                                                    $start = new DateTime($w_day5);
                                                    $start->add(new DateInterval('PT09H00M00S'));
                                                    $end = new DateTime($w_day5);
                                                    $end->add(new DateInterval('PT10H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $start = new DateTime($w_day5);
                                                    $start->add(new DateInterval('PT11H00M00S'));
                                                    $end = new DateTime($w_day5);
                                                    $end->add(new DateInterval('PT12H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $start = new DateTime($w_day5);
                                                    $start->add(new DateInterval('PT13H00M00S'));
                                                    $end = new DateTime($w_day5);
                                                    $end->add(new DateInterval('PT14H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a <?php
                                                    $start = new DateTime($w_day6);
                                                    $start->add(new DateInterval('PT09H00M00S'));
                                                    $end = new DateTime($w_day6);
                                                    $end->add(new DateInterval('PT10H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $start = new DateTime($w_day6);
                                                    $start->add(new DateInterval('PT11H00M00S'));
                                                    $end = new DateTime($w_day6);
                                                    $end->add(new DateInterval('PT12H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $start = new DateTime($w_day6);
                                                    $start->add(new DateInterval('PT13H00M00S'));
                                                    $end = new DateTime($w_day6);
                                                    $end->add(new DateInterval('PT14H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a <?php
                                                    $start = new DateTime($w_day7);
                                                    $start->add(new DateInterval('PT09H00M00S'));
                                                    $end = new DateTime($w_day7);
                                                    $end->add(new DateInterval('PT10H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $start = new DateTime($w_day7);
                                                    $start->add(new DateInterval('PT11H00M00S'));
                                                    $end = new DateTime($w_day7);
                                                    $end->add(new DateInterval('PT12H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $start = new DateTime($w_day7);
                                                    $start->add(new DateInterval('PT13H00M00S'));
                                                    $end = new DateTime($w_day7);
                                                    $end->add(new DateInterval('PT14H30M00S'));
                                                    ?> class="timing" href="#"
                                                        targetLink="<?php echo $start->format('Y-m-d H:i') ?>"
                                                        id="<?php echo $end->format('Y-m-d H:i') ?>" title="">
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
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert1" hidden>
                            <strong>Success!</strong> Your <a href="#" class="alert-link">Booking on
                                <?php echo $choice ?></a> has
                            been placed
                            successfully.
                            <button onclick="reloadpage()" type="button" class="close" data-dismiss="alert"
                                aria-label="Close" id="alertclose">
                                <span aria-hidden="true" onclick="reloadpage()">×</span>
                            </button>
                        </div>

                        <div class="submit-section proceed-btn text-right">
                            <a id="proceed" href="checkout.php?id=" class="btn btn-primary submit-btn">Proceed to
                                Pay</a>
                        </div>
                        <!-- /Submit Section -->

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

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
    <script>
    $(document).on("click", "a", function() {

        if ($(this).attr("targetLink")) {
            // var starttime = new DateTime(event_start_date);
            // alert("You are going to the following page: " + $(this).attr("targetLink"));
            if ($(this).attr("class") == "timing") {
                $(this).removeClass();
                $(this).addClass("timing selected");
            } else {
                $(this).removeClass();
                $(this).addClass("timing");
            }
        }
        var event_end_date = $(this).attr("id");
        var event_start_date = $(this).attr("targetLink");
        $.ajax({
            url: "assets/php/user_booking.php",
            type: "POST",
            dataType: 'json',
            data: {
                email: "<?php echo $doctorchoosen ?>",
                doctorCode: "<?php echo $doctorcode ?>",
                patientCode: "<?php echo $patientcode ?>",
                startdate: event_start_date,
                enddate: event_end_date
            },
            success: function(response) {
                if (response.status == true) {
                    //alert();
                    console.log('ajax success = ' + response.msg);
                    $('#alert1').removeAttr("hidden");
                    $('#proceed').each(function() {
                        var oldUrl = $(this).attr("href"); // Get current url
                        var newUrl = oldUrl.replace("checkout.php?id=",
                            "checkout.php?id=" + response.msg); // Create new url
                        $(this).attr("href", newUrl); // Set herf value
                    });
                    //
                } else {
                    $('#alert2').removeAttr("hidden");
                    console.log('ajax error = ' + response.msg);
                }
            },
            error: function(xhr, status) {
                $('#alert2').removeAttr("hidden");
                console.log('ajax bug = ' + xhr.statusText);
                // alert(response.msg);
            }
        })
    });
    </script>

    <script>
    function reloadpage() {
        location.reload();
    }
    </script>




</body>

</html>