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
                            <a href="index-2.php">Home</a>
                        </li>
                        <li>
                            <a href="search.php">Search Doctor</a>
                        </li>
                        <li>
                            <a href="patient-dashboard.php">Patient Dashboard</a>
                        </li>
                        <li>
                            <a href="profile-settings.php">Profile Settings</a>
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
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert2"
                                style="visibility: hidden">
                                <strong>Error!</strong> A <a href="#" class="alert-link">problem</a> has been occurred
                                while
                                submitting your data.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                                                        $day = date('D', strtotime($date . '+1 day'));
                                                        $year = date('Y', strtotime($date . '+1 day'));
                                                        $longdate = date('d M', strtotime($date . '+1 day'));
                                                        $weekday = false;
                                                        if ($day == 'Sat') {
                                                            $day = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else if ($day == 'Sun') {
                                                            $day = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else {
                                                            $weekday = true;
                                                        }
                                                        if ($weekday) {
                                                            echo $day;
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
                                                        $day = date('D', strtotime($date . '+2 day'));
                                                        $year = date('Y', strtotime($date . '+2 day'));
                                                        $longdate = date('d M', strtotime($date . '+2 day'));
                                                        $weekday = false;
                                                        if ($day == 'Sat') {
                                                            $day = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else if ($day == 'Sun') {
                                                            $$day = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else {
                                                            $weekday = true;
                                                        }
                                                        if ($weekday) {
                                                            echo $day;
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
                                                        $day = date('D', strtotime($date . '+3 day'));
                                                        $year = date('Y', strtotime($date . '+3 day'));
                                                        $longdate = date('d M', strtotime($date . '+3 day'));
                                                        $weekday = false;
                                                        if ($day == 'Sat') {
                                                            $day = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else if ($day == 'Sun') {
                                                            $day = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else {
                                                            $weekday = true;
                                                        }
                                                        if ($weekday) {
                                                            echo $day;
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
                                                        $day = date('D', strtotime($date . '+4 day'));
                                                        $year = date('Y', strtotime($date . '+4 day'));
                                                        $longdate = date('d M', strtotime($date . '+4 day'));
                                                        $weekday = false;
                                                        if ($day == 'Sat') {
                                                            $day = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else if ($day == 'Sun') {
                                                            $day = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else {
                                                            $weekday = true;
                                                        }
                                                        if ($weekday) {
                                                            echo $day;
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
                                                        $day = date('D', strtotime($date . '+5 day'));
                                                        $year = date('Y', strtotime($date . '+5 day'));
                                                        $longdate = date('d M', strtotime($date . '+5 day'));
                                                        $weekday = false;
                                                        if ($day == 'Sat') {
                                                            $day = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else if ($day == 'Sun') {
                                                            $day = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else {
                                                            $weekday = true;
                                                        }
                                                        if ($weekday) {
                                                            echo $day;
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
                                                        $day = date('D', strtotime($date . '+6 day'));
                                                        $year = date('Y', strtotime($date . '+6 day'));
                                                        $longdate = date('d M', strtotime($date . '+6 day'));
                                                        $weekday = false;
                                                        if ($day == 'Sat') {
                                                            $day = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else if ($day == 'Sun') {
                                                            $day = "Weekend";
                                                            $longdate = "Closed";
                                                            $year = "";
                                                            $weekday = true;
                                                        } else {
                                                            $weekday = true;
                                                        }
                                                        if ($weekday) {
                                                            echo $day;
                                                            ?>
                                                    </span>
                                                    <span class="slot-date"><?php echo $longdate; ?><small
                                                            class="slot-year">
                                                            <?php echo $year; ?></small></span>
                                                    <?php } ?>
                                                </li>
                                                <li>
                                                    <span><?php
                                                    $day = date('D', strtotime($date . '+7 day'));
                                                    $year = date('Y', strtotime($date . '+7 day'));
                                                    $longdate = date('d M', strtotime($date . '+7 day'));
                                                    $weekday = false;
                                                    if ($day == 'Sat') {
                                                        $day = "Weekend";
                                                        $longdate = "Closed";
                                                        $year = "";
                                                        $weekday = true;
                                                    } else if ($day == 'Sun') {
                                                        $day = "Weekend";
                                                        $longdate = "Closed";
                                                        $year = "";
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        echo $day;
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
                                            <ul class="clearfix" id="slots">
                                                <li>
                                                    <a <?php

                                                    $day = date('d-M-Y', strtotime($date . '+1 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $weekday = false;
                                                    if ($startdatetime->format('D') == 'Sat') {
                                                        $day = date('d-M-Y', strtotime($date . '+2 day'));
                                                        $weekday = true;
                                                        $startdatetime = new DateTime($day);
                                                    } else if ($startdatetime->format('D') == 'Sun') {
                                                        $day = date('d-M-Y', strtotime($date . '+1 day'));
                                                        $startdatetime = new DateTime($day);
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        $startdatetime->add(new DateInterval('PT09H00M00S'));

                                                        $enddatetime = new DateTime($day);
                                                        $enddatetime->add(new DateInterval('PT10H30M00S'));

                                                        $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                            "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                            "&doctorCode=" . $doctorcode .
                                                            "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen);
                                                    } ?> class="timing" id="slot_1" href="<?php echo $url ?>">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+1 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $weekday = false;
                                                    if ($startdatetime->format('D') == 'Sat') {
                                                        $day = date('d-M-Y', strtotime($date . '+3 day'));
                                                        $weekday = true;
                                                        $startdatetime = new DateTime($day);
                                                    } else if ($startdatetime->format('D') == 'Sun') {
                                                        $day = date('d-M-Y', strtotime($date . '+2 day'));
                                                        $startdatetime = new DateTime($day);
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        $startdatetime->add(new DateInterval('PT11H00M00S'));

                                                        $enddatetime = new DateTime($day);
                                                        $enddatetime->add(new DateInterval('PT12H30M00S'));

                                                        $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                            "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                            "&doctorCode=" . $doctorcode .
                                                            "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen);
                                                    } ?> class="timing" id="slot_2" href="<?php echo $url ?>">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+1 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $startdatetime->add(new DateInterval('PT13H00M00S'));



                                                    $day = date('d-M-Y', strtotime($date . '+1 day'));
                                                    $enddatetime = new DateTime($day);
                                                    $enddatetime->add(new DateInterval('PT14H30M00S'));

                                                    $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                        "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                        "&doctorCode=" . urlencode($doctorcode) .
                                                        "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen); ?>
                                                        class="timing" id="slot_3" href="<?php echo $url ?>">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+2 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $startdatetime->add(new DateInterval('PT09H00M00S'));

                                                    $day = date('d-M-Y', strtotime($date . '+2 day'));
                                                    $enddatetime = new DateTime($day);
                                                    $enddatetime->add(new DateInterval('PT10H30M00S'));

                                                    $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                        "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                        "&doctorCode=" . urlencode($doctorcode) .
                                                        "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen); ?>
                                                        class="timing" id="slot_4" href="<?php echo $url ?>">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+2 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $startdatetime->add(new DateInterval('PT11H00M00S'));



                                                    $day = date('d-M-Y', strtotime($date . '+2 day'));
                                                    $enddatetime = new DateTime($day);
                                                    $enddatetime->add(new DateInterval('PT12H30M00S'));

                                                    $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                        "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                        "&doctorCode=" . urlencode($doctorcode) .
                                                        "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen); ?>
                                                        class="timing" id="slot_5" href="<?php echo $url ?>">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+2 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $startdatetime->add(new DateInterval('PT13H00M00S'));



                                                    $day = date('d-M-Y', strtotime($date . '+2 day'));
                                                    $enddatetime = new DateTime($day);
                                                    $enddatetime->add(new DateInterval('PT14H30M00S'));

                                                    $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                        "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                        "&doctorCode=" . urlencode($doctorcode) .
                                                        "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen); ?>
                                                        class="timing" id="slot_6" href="<?php echo $url ?>">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+3 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $weekday = false;
                                                    if ($startdatetime->format('D') == 'Sat') {
                                                        $day = date('d-M-Y', strtotime($date . '+5 day'));
                                                        $weekday = true;
                                                        $startdatetime = new DateTime($day);
                                                    } else if ($startdatetime->format('D') == 'Sun') {
                                                        $day = date('d-M-Y', strtotime($date . '+4 day'));
                                                        $startdatetime = new DateTime($day);
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        $startdatetime = new DateTime($day);
                                                        $startdatetime->add(new DateInterval('PT09H00M00S'));


                                                        $enddatetime = new DateTime($day);
                                                        $enddatetime->add(new DateInterval('PT10H30M00S'));

                                                        $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                            "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                            "&doctorCode=" . urlencode($doctorcode) .
                                                            "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen);
                                                    } ?> class="timing" id="slot_7" href="<?php echo $url ?>">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+3 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $weekday = false;
                                                    if ($startdatetime->format('D') == 'Sat') {
                                                        $day = date('d-M-Y', strtotime($date . '+5 day'));
                                                        $weekday = true;
                                                        $startdatetime = new DateTime($day);
                                                    } else if ($startdatetime->format('D') == 'Sun') {
                                                        $day = date('d-M-Y', strtotime($date . '+4 day'));
                                                        $startdatetime = new DateTime($day);
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {

                                                        $startdatetime->add(new DateInterval('PT11H00M00S'));
                                                        $enddatetime = new DateTime($day);
                                                        $enddatetime->add(new DateInterval('PT12H30M00S'));

                                                        $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                            "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                            "&doctorCode=" . urlencode($doctorcode) .
                                                            "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen);
                                                    } ?> class="timing" id="slot_8" href="<?php echo $url ?>">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+3 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $weekday = false;
                                                    if ($startdatetime->format('D') == 'Sat') {
                                                        $day = date('d-M-Y', strtotime($date . '+5 day'));
                                                        $weekday = true;
                                                        $startdatetime = new DateTime($day);
                                                    } else if ($startdatetime->format('D') == 'Sun') {
                                                        $day = date('d-M-Y', strtotime($date . '+4 day'));
                                                        $startdatetime = new DateTime($day);
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        $startdatetime->add(new DateInterval('PT13H00M00S'));

                                                        $enddatetime = new DateTime($day);
                                                        $enddatetime->add(new DateInterval('PT14H30M00S'));

                                                        $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                            "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                            "&doctorCode=" . urlencode($doctorcode) .
                                                            "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen);
                                                    } ?> class="timing" id="slot_9" href="<?php echo $url ?>">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+4 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $weekday = false;
                                                    if ($startdatetime->format('D') == 'Sat') {
                                                        $day = date('d-M-Y', strtotime($date . '+6 day'));
                                                        $weekday = true;
                                                        $startdatetime = new DateTime($day);
                                                    } else if ($startdatetime->format('D') == 'Sun') {
                                                        $day = date('d-M-Y', strtotime($date . '+5 day'));
                                                        $startdatetime = new DateTime($day);
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        $startdatetime->add(new DateInterval('PT09H00M00S'));

                                                        $enddatetime = new DateTime($day);
                                                        $enddatetime->add(new DateInterval('PT10H30M00S'));

                                                        $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                            "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                            "&doctorCode=" . urlencode($doctorcode) .
                                                            "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen);
                                                    } ?> class="timing" href="<?php echo $url ?>" id="slot_10">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+4 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $weekday = false;
                                                    if ($startdatetime->format('D') == 'Sat') {
                                                        $day = date('d-M-Y', strtotime($date . '+6 day'));
                                                        $weekday = true;
                                                        $startdatetime = new DateTime($day);
                                                    } else if ($startdatetime->format('D') == 'Sun') {
                                                        $day = date('d-M-Y', strtotime($date . '+5 day'));
                                                        $startdatetime = new DateTime($day);
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        $startdatetime->add(new DateInterval('PT11H00M00S'));

                                                        $enddatetime = new DateTime($day);
                                                        $enddatetime->add(new DateInterval('PT12H30M00S'));

                                                        $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                            "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                            "&doctorCode=" . urlencode($doctorcode) .
                                                            "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen);
                                                    } ?> class="timing" href="<?php echo $url ?>" id="slot_11">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+4 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $weekday = false;
                                                    if ($startdatetime->format('D') == 'Sat') {
                                                        $day = date('d-M-Y', strtotime($date . '+6 day'));
                                                        $weekday = true;
                                                        $startdatetime = new DateTime($day);
                                                    } else if ($startdatetime->format('D') == 'Sun') {
                                                        $day = date('d-M-Y', strtotime($date . '+5 day'));
                                                        $startdatetime = new DateTime($day);
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        $startdatetime = new DateTime($day);
                                                        $startdatetime->add(new DateInterval('PT13H00M00S'));

                                                        $enddatetime = new DateTime($day);
                                                        $enddatetime->add(new DateInterval('PT14H30M00S'));

                                                        $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                            "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                            "&doctorCode=" . urlencode($doctorcode) .
                                                            "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen);
                                                    } ?> class="timing" href="<?php echo $url ?>" id="slot_12">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+5 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $weekday = false;
                                                    if ($startdatetime->format('D') == 'Sat') {
                                                        $day = date('d-M-Y', strtotime($date . '+7 day'));
                                                        $weekday = true;
                                                        $startdatetime = new DateTime($day);
                                                    } else if ($startdatetime->format('D') == 'Sun') {
                                                        $day = date('d-M-Y', strtotime($date . '+6 day'));
                                                        $startdatetime = new DateTime($day);
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        $startdatetime->add(new DateInterval('PT09H00M00S'));

                                                        $enddatetime = new DateTime($day);
                                                        $enddatetime->add(new DateInterval('PT10H30M00S'));

                                                        $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                            "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                            "&doctorCode=" . urlencode($doctorcode) .
                                                            "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen);
                                                    } ?> class="timing" href="<?php echo $url ?>" id="slot_13">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+5 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $weekday = false;
                                                    if ($startdatetime->format('D') == 'Sat') {
                                                        $day = date('d-M-Y', strtotime($date . '+7 day'));
                                                        $weekday = true;
                                                        $startdatetime = new DateTime($day);
                                                    } else if ($startdatetime->format('D') == 'Sun') {
                                                        $day = date('d-M-Y', strtotime($date . '+6 day'));
                                                        $startdatetime = new DateTime($day);
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        $startdatetime->add(new DateInterval('PT11H00M00S'));

                                                        $enddatetime = new DateTime($day);
                                                        $enddatetime->add(new DateInterval('PT12H30M00S'));

                                                        $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                            "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                            "&doctorCode=" . urlencode($doctorcode) .
                                                            "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen);
                                                    } ?> class="timing" href="<?php echo $url ?>" id="slot_14">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+5 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $weekday = false;
                                                    if ($startdatetime->format('D') == 'Sat') {
                                                        $day = date('d-M-Y', strtotime($date . '+7 day'));
                                                        $weekday = true;
                                                        $startdatetime = new DateTime($day);
                                                    } else if ($startdatetime->format('D') == 'Sun') {
                                                        $day = date('d-M-Y', strtotime($date . '+6 day'));
                                                        $startdatetime = new DateTime($day);
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        $startdatetime->add(new DateInterval('PT13H00M00S'));

                                                        $enddatetime = new DateTime($day);
                                                        $enddatetime->add(new DateInterval('PT14H30M00S'));

                                                        $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                            "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                            "&doctorCode=" . urlencode($doctorcode) .
                                                            "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen);
                                                    } ?> class="timing" href="<?php echo $url ?>" id="slot_15">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+6 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $weekday = false;
                                                    if ($startdatetime->format('D') == 'Sat') {
                                                        $day = date('d-M-Y', strtotime($date . '+8 day'));
                                                        $weekday = true;
                                                        $startdatetime = new DateTime($day);
                                                    } else if ($startdatetime->format('D') == 'Sun') {
                                                        $day = date('d-M-Y', strtotime($date . '+7 day'));
                                                        $startdatetime = new DateTime($day);
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        $startdatetime->add(new DateInterval('PT09H00M00S'));

                                                        $enddatetime = new DateTime($day);
                                                        $enddatetime->add(new DateInterval('PT10H30M00S'));

                                                        $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                            "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                            "&doctorCode=" . urlencode($doctorcode) .
                                                            "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen);
                                                    } ?> class="timing" href="<?php echo $url ?>" id="slot_16">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+6 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $weekday = false;
                                                    if ($startdatetime->format('D') == 'Sat') {
                                                        $day = date('d-M-Y', strtotime($date . '+8 day'));
                                                        $weekday = true;
                                                        $startdatetime = new DateTime($day);
                                                    } else if ($startdatetime->format('D') == 'Sun') {
                                                        $day = date('d-M-Y', strtotime($date . '+7 day'));
                                                        $startdatetime = new DateTime($day);
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        $startdatetime->add(new DateInterval('PT11H00M00S'));

                                                        $enddatetime = new DateTime($day);
                                                        $enddatetime->add(new DateInterval('PT12H30M00S'));

                                                        $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                            "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                            "&doctorCode=" . urlencode($doctorcode) .
                                                            "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen);
                                                    } ?> class="timing" href="<?php echo $url ?>" id="slot_17">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+6 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $weekday = false;
                                                    if ($startdatetime->format('D') == 'Sat') {
                                                        $day = date('d-M-Y', strtotime($date . '+8 day'));
                                                        $weekday = true;
                                                        $startdatetime = new DateTime($day);
                                                    } else if ($startdatetime->format('D') == 'Sun') {
                                                        $day = date('d-M-Y', strtotime($date . '+7 day'));
                                                        $startdatetime = new DateTime($day);
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        $startdatetime->add(new DateInterval('PT13H00M00S'));
                                                        $enddatetime = new DateTime($day);
                                                        $enddatetime->add(new DateInterval('PT14H30M00S'));

                                                        $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                            "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                            "&doctorCode=" . urlencode($doctorcode) .
                                                            "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen);
                                                    } ?> class="timing" href="<?php echo $url ?>" id="slot_18">
                                                        <span>13:00 - 14:30</span> <span></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+7 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $weekday = false;
                                                    if ($startdatetime->format('D') == 'Sat') {
                                                        $day = date('d-M-Y', strtotime($date . '+9 day'));
                                                        $weekday = true;
                                                        $startdatetime = new DateTime($day);
                                                    } else if ($startdatetime->format('D') == 'Sun') {
                                                        $day = date('d-M-Y', strtotime($date . '+8 day'));
                                                        $startdatetime = new DateTime($day);
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        $startdatetime->add(new DateInterval('PT09H00M00S'));
                                                        $enddatetime = new DateTime($day);
                                                        $enddatetime->add(new DateInterval('PT10H30M00S'));

                                                        $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                            "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                            "&doctorCode=" . urlencode($doctorcode) .
                                                            "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen);
                                                    } ?> class="timing" href="<?php echo $url ?>" id="slot_19">
                                                        <span>09:00 - 10:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+7 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $weekday = false;
                                                    if ($startdatetime->format('D') == 'Sat') {
                                                        $day = date('d-M-Y', strtotime($date . '+9 day'));
                                                        $weekday = true;
                                                        $startdatetime = new DateTime($day);
                                                    } else if ($startdatetime->format('D') == 'Sun') {
                                                        $day = date('d-M-Y', strtotime($date . '+8 day'));
                                                        $startdatetime = new DateTime($day);
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        $startdatetime->add(new DateInterval('PT11H00M00S'));
                                                        $enddatetime = new DateTime($day);
                                                        $enddatetime->add(new DateInterval('PT12H30M00S'));

                                                        $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                            "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                            "&doctorCode=" . urlencode($doctorcode) .
                                                            "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen);
                                                    } ?> class="timing" href="<?php echo $url ?>" id="slot_20">
                                                        <span>11:00 - 12:30</span> <span></span>
                                                    </a>
                                                    <a <?php
                                                    $day = date('d-M-Y', strtotime($date . '+7 day'));
                                                    $startdatetime = new DateTime($day);
                                                    $weekday = false;
                                                    if ($startdatetime->format('D') == 'Sat') {
                                                        $day = date('d-M-Y', strtotime($date . '+9 day'));
                                                        $weekday = true;
                                                        $startdatetime = new DateTime($day);
                                                    } else if ($startdatetime->format('D') == 'Sun') {
                                                        $day = date('d-M-Y', strtotime($date . '+8 day'));
                                                        $startdatetime = new DateTime($day);
                                                        $weekday = true;
                                                    } else {
                                                        $weekday = true;
                                                    }
                                                    if ($weekday) {
                                                        $startdatetime->add(new DateInterval('PT13H00M00S'));

                                                        $enddatetime = new DateTime($day);
                                                        $enddatetime->add(new DateInterval('PT14H30M00S'));

                                                        $url = "assets/php/user_booking.php?startdate=" . urlencode($startdatetime->format('Y-m-d H:i:s')) .
                                                            "&enddate=" . urlencode($enddatetime->format('Y-m-d H:i:s')) .
                                                            "&doctorCode=" . urlencode($doctorcode) .
                                                            "&patientCode=" . urlencode($patientcode) . "&email=" . urlencode($doctorchoosen);
                                                    } ?> class="timing" href="<?php echo $url ?>" id="slot_21">
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
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert1"
                            style="visibility: hidden">
                            <strong>Success!</strong> Your <a href="#" class="alert-link">Booking on
                                <?php echo $choice ?></a> has
                            been placed
                            successfully.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <div class="submit-section proceed-btn text-right">
                            <a href="checkout.php?id=<?= $final ?>" class="btn btn-primary submit-btn">Proceed to
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
    <?php if ($flag == "true") {
        echo '<script>
    window.onload = function () {
    let element = document.getElementById("alert2");
    element.style.visibility = "visible";
    }
  
    </script>';
    } else if ($flag == "false") {
        echo '<script>
    window.onload = function () {
         let element = document.getElementById("alert1");
        element.style.visibility = "visible";
    }
  
    </script>';

    } ?>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>




</body>

</html>