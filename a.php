<?php require_once "assets/php/config.php";
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$authsess = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:20 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="a_assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="a_assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="a_assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="a_assets/css/feathericon.min.css">

    <link rel="stylesheet" href="a_assets/plugins/morris/morris.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="a_assets/css/style.css">

    <!--[if lt IE 9]>
            <script src="a_assets/js/html5shiv.min.js"></script>
            <script src="a_assets/js/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left">
                <a href="a.php" class="logo">
                    <img src="assets/img/logo.png" alt="Logo">
                </a>
                <a href="a.php" class="logo logo-small">
                    <img src="assets/img/logo.png" alt="Logo" width="30" height="30">
                </a>
            </div>
            <!-- /Logo -->

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>



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
                            $query = "SELECT COUNT(*) FROM Cancellation where isResolved = 0";
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
                        $query = "SELECT * FROM Cancellation 
                                INNER JOIN Doctor On Cancellation.DoctorCode = Doctor.DoctorCode
                                INNER JOIN User ON Doctor.UserCode = User.UserCode";
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
                                                    src="a_assets/img/aneesa.jpg">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Dr.
                                                        <?php echo $rows['LastName'] ?> requests that Booking
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
                            <a href="#">Close Notifications</a>
                        </div>
                    </div>
                </li>
                <!-- /Notifications -->

                <!-- User Menu -->

                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <?php
                            $query = "SELECT * FROM User WHERE EmailAddress = '$authsess'";
                            $result = mysqli_query($conn, $query);
                            $row = [];

                            if ($result->num_rows > 0) {
                                // fetch all data from db into array 
                                $row = $result->fetch_all(MYSQLI_ASSOC);
                            }


                            if (!empty($row))
                                foreach ($row as $rows) {
                                    ?>
                        <span class="user-img"><img class="rounded-circle" src="a_assets/img/"
                                <?php echo $rows['image']; ?> width="31" alt="none"></span>
                        <?php } ?>
                    </a>
                    <div class="dropdown-menu">
                        <?php
                            $query = "SELECT * FROM User WHERE EmailAddress = '$authsess'";
                            $result = mysqli_query($conn, $query);
                            $row = [];

                            if ($result->num_rows > 0) {
                                // fetch all data from db into array 
                                $row = $result->fetch_all(MYSQLI_ASSOC);
                            }


                            if (!empty($row))
                                foreach ($row as $rows) {
                                    ?>
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="a_assets/img/<?php echo $rows['image']; ?>" alt="none"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6><?php echo $rows['FirstName']; ?> <?php echo $rows['LastName']; ?></h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </div>
                        <?php } ?>
                        <a class="dropdown-item" href="a_profile.php">My Profile</a>
                        <a class="dropdown-item" href="assets/php/logout.php">Logout</a>
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
                            <a href="a.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="a_appointment-list.php"><i class="fe fe-layout"></i> <span>Appointments</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fe fe-user-plus"></i> <span> Doctors</span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="a_doctor-list.php">Doctor List</a></li>
                                <li><a href="a_register_newdoc.php">Add Doctor</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="a_patient-list.php"><i class="fe fe-user"></i> <span>Patients</span></a>
                        </li>
                        <li>
                            <a href="a_transactions-list.php"><i class="fe fe-activity"></i>
                                <span>Transactions</span></a>
                        </li>
                        <li>
                            <a href="a_calendar.php"><i class="fe fe-table"></i> <span>Calendar</span></a>
                        </li>
                        <li class="menu-title">
                            <span>User Settings</span>
                        </li>
                        <li>
                            <a href="a_profile.php"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
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
                                        <div class="progress-bar bg-primary w-25"></div>
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
                                                     Where BookingStatus = 'Active'";
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
                                          User.FirstName,
                                          User.LastName,DoctorType.DoctorTitle,
                                          User.PhoneNumber, 
                                          User.EmailAddress FROM User 
                                          INNER JOIN Doctor ON User.UserCode = Doctor.UserCode 
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
                                            if (!empty($row))
                                                foreach ($row as $rows) {
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
                                          User.FirstName,
                                          User.LastName,
                                          User.PhoneNumber
                                          FROM User 
                                          INNER JOIN Patient ON User.UserCode = Patient.UserCode";
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
                                            if (!empty($row)) {
                                                foreach ($row as $rows) {
                                                    ?>
                                            <tr>
                                                <td><?php echo $rows['PatientCode']; ?></td>
                                                <td><?php echo $rows['FirstName']; ?></td>
                                                <td><?php echo $rows['LastName']; ?></td>
                                                <td><?php echo $rows['PhoneNumber']; ?></td>
                                            </tr>
                                            <?php }
                                            } ?>

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
                                $query = "SELECT Booking.BookingCode,DoctorCode, FirstName, LastName, StartDate, 
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
                                            if (!empty($row)) {
                                                foreach ($row as $rows) {
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

                                                                echo "{$st} - {$et}"; ?>
                                                    </span>
                                                </td>
                                                <?php if ($rows['BookingStatus'] == "Active") { ?>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status" class="check" checked
                                                            disabled>
                                                        <label for="status" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>

                                                <?php } else { ?>

                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status" class="check" unchecked
                                                            disabled>
                                                        <label for="status" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>

                                                <?php } ?>
                                                <td><?php echo "R{$rows['PaymentAmount']}"; ?> </td>

                                            </tr>
                                            <?php }
                                            } ?>

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
    <script src="a_assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="a_assets/js/popper.min.js"></script>
    <script src="a_assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="a_assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="a_assets/plugins/raphael/raphael.min.js"></script>
    <script src="a_assets/plugins/morris/morris.min.js"></script>
    <script src="a_assets/js/chart.morris.js"></script>

    <!-- Custom JS -->
    <script src="a_assets/js/script.js"></script>

</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:34 GMT -->

</html>