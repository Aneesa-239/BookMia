<?php require_once "assets/php/config.php";
//pull the required data from the database
$query = "SELECT * FROM Invoice 
                                INNER JOIN Booking ON Booking.BookingCode = Invoice.BookingCode
                                INNER JOIN Patient ON patient.PatientCode = Booking.PatientCode
								INNER JOIN User ON User.UserCode = Patient.UserCode
								INNER JOIN Payment ON Payment.InvoiceCode = Invoice.InvoiceCode";
$result = mysqli_query($conn, $query);
$row = [];

if ($result->num_rows > 0) {
    // fetch all data from db into array 
    $row = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/transactions-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:52 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Transactions List Page</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

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
                            $pull = "SELECT COUNT(*) FROM cancellation where isResolved= 0";
                            $ans = mysqli_query($conn, $pull);
                            $check = [];

                            if ($ans->num_rows > 0) {
                                // fetch all data from db into array 
                                $check = $ans->fetch_all(MYSQLI_ASSOC);
                            }
                            ?>
                            <?php

                            if (!empty($check))
                                foreach ($check as $count) {
                                    echo $count['COUNT(*)'];
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
                        $sql = "SELECT * FROM cancellation 
                                INNER JOIN doctor On cancellation.DoctorCode = doctor.DoctorCode
                                INNER JOIN user ON doctor.UserCode = user.UserCode";
                        $check = mysqli_query($conn, $sql);
                        $arr = [];

                        if ($check->num_rows > 0) {
                            // fetch all data from db into array 
                            $arr = $check->fetch_all(MYSQLI_ASSOC);
                        }
                        ?>

                        <div class="noti-content">
                            <ul class="notification-list">
                                <?php
                                if (!empty($arr))
                                    foreach ($arr as $rows) {
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
                                                        <?php echo $rows['LastName'] ?> requests that Booking
                                                        Number
                                                    </span>
                                                    <?php echo $rows['BookingCode'] ?> <span class="noti-title">be
                                                        canceled
                                                    </span>
                                                </p>
                                                <p class="noti-time"><span class="notification-time">
                                                        <?php
                                                                $time = new DateTime($rows["DateOfCancellation"]);
                                                                $date = $time->format('d-M-Y');
                                                                echo $date ?>
                                                    </span>
                                                    <span>
                                                        <?php
                                                                $time = new DateTime($rows["DateOfCancellation"]);
                                                                $st = $time->format('H:m');
                                                                echo $st;

                                                                ?>
                                                    </span>
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
                        <li>
                            <a href="index.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="appointment-list.php"><i class="fe fe-layout"></i> <span>Appointments</span></a>
                        </li>
                        <li>
                            <a href="specialities.html"><i class="fe fe-users"></i> <span>Specialities</span></a>
                        </li>
                        <li>
                            <a href="doctor-list.html"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                        </li>
                        <li>
                            <a href="patient-list.html"><i class="fe fe-user"></i> <span>Patients</span></a>
                        </li>
                        <li>
                            <a href="reviews.html"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
                        </li>
                        <li class="active">
                            <a href="transactions-list.php"><i class="fe fe-activity"></i>
                                <span>Transactions</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="invoice-report.html">Invoice Reports</a></li>
                            </ul>
                        </li>
                        <li class="menu-title">
                            <span>User Settings</span>
                        </li>
                        <li>
                            <a href="profile.html"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
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
                            <h3 class="page-title">Transactions</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Transactions</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Invoice Number</th>
                                                <th>Patient ID</th>
                                                <th>Patient Name</th>
                                                <th>Total Amount</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($row))
                                                foreach ($row as $rows) {
                                                    ?>
                                            <tr>
                                                <td><a href="invoice.html">#IN00<?php echo $rows["InvoiceCode"] ?></td>
                                                <td>
                                                    <?php echo $rows["PatientCode"] ?>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/<?php echo $rows["image"] ?>"
                                                                alt="User Image"></a>
                                                        <a href="profile.html">
                                                            <?php echo $rows["FirstName"] ?>
                                                            <?php echo $rows["LastName"] ?>
                                                        </a>
                                                    </h2>
                                                </td>
                                                <td>R<?php echo $rows["PaymentAmount"] ?></td>
                                                <?php if ($rows["PaymentStatus"] == "Paid") { ?>
                                                <td class="text-center">
                                                    <span class="badge badge-pill bg-success inv-badge">Paid</span>
                                                </td>
                                                <?php } else { ?>
                                                <td class="text-center">
                                                    <span class="badge badge-pill bg-warning inv-badge">Pending</span>
                                                </td>
                                                <?php } ?>

                                                <td class="text-right">
                                                    <div class="actions">
                                                        <a class="btn btn-sm bg-danger-light" data-toggle="modal"
                                                            href="#delete_modal">
                                                            <i class="fe fe-trash"></i> Delete
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
                </div>
            </div>
        </div>
        <!-- /Page Wrapper -->

        <!-- Delete Modal -->
        <div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <!--	<div class="modal-header">
                            <h5 class="modal-title">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>-->
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <button type="button" class="btn btn-primary">Save </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Modal -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Datatables JS -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/datatables.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/transactions-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:53 GMT -->

</html>