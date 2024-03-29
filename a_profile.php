<?php require_once "assets/php/config.php";

session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$authsess = $_SESSION['name'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>BookMia</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="a_assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="a_assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="a_assets/css/feathericon.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="a_assets/css/style.css">

</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left">
                <a href="a.php" class="logo">
                    <img src="assets/img/favicon.png" alt="Logo">
                </a>
                <a href="a.php" class="logo logo-small">
                    <img src="assets/img/favicon.png" alt="Logo" width="30" height="30">
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
                                INNER JOIN User ON Doctor.UserCode = User.UserCode Where isResolved = 0";
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
                                                    src="assets/img/<?php echo $rows['image'] ?>">
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
                            <a href="#">Close Notifications</a>
                        </div>
                    </div>
                </li>
                <!-- /Notifications -->

                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/admin.jpg" width="31"
                                alt="Ryan Taylor"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="assets/img/admin.jpg" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>Ryan Taylor</h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="a_profile.html">My Profile</a>

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
                        <li>
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
                            <a href="a_transactions-list.php"><i class="fe fe-activity"></i>
                                <span>Transactions</span></a>
                        </li>
                        <li>
                            <a href="a_calendar.php"><i class="fe fe-table"></i> <span>Calendar</span></a>
                        </li>
                        <li class="menu-title">
                            <span>User Settings</span>
                        </li>

                        <li class="active">
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
                        <div class="col">
                            <h3 class="page-title">Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="a.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-header">
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
                            <div class="row align-items-center">
                                <div class="col-auto profile-image">
                                    <a href="#">
                                        <img class="rounded-circle" alt="User Image" src="assets/img/admin.jpg">
                                    </a>
                                </div>
                                <div class="col ml-md-n2 profile-user-info">
                                    <h4 class="user-name mb-0">
                                        <?php echo $rows['FirstName']; ?>
                                        <?php echo $rows['LastName']; ?>
                                    </h4>
                                    <h6 class="text-muted">
                                        <?php echo $rows['EmailAddress']; ?>
                                    </h6>
                                    <div class="user-Location"><i class="fa fa-map-marker"></i>
                                        <?php echo $rows['province']; ?>,
                                        <?php echo $rows['country']; ?>
                                    </div>
                                    <div class="about-text">Admin.</div>
                                </div>
                                <div class="col-auto profile-btn">
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="profile-menu">
                            <ul class="nav nav-tabs nav-tabs-solid">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                                </li>

                            </ul>
                        </div>
                        <div class="tab-content profile-tab-cont">

                            <!-- Personal Details Tab -->
                            <div class="tab-pane fade show active" id="per_details_tab">
                                <div class="alert alert-info alert-dismissible fade show" role="alert" id="alert1"
                                    hidden>
                                    <strong>Success!</strong> Your <a href="#" class="alert-link">Details</a>
                                    have been changed.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert2"
                                    hidden>
                                    <strong>Oh no!</strong> There was a problem changing your details. <a href="#"
                                        class="alert-link">Try again later</a>.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>


                                <!-- Personal Details -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
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
                                                <h5 class="card-title d-flex justify-content-between">
                                                    <span>Personal Details</span>
                                                    <a href="#edit_personal_details" data-toggle="modal"
                                                        class="btn btn-primary">
                                                        Edit
                                                    </a>
                                                </h5>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                                    <p class="col-sm-10">
                                                        <?php echo $rows['FirstName']; ?>
                                                        <?php echo $rows['LastName']; ?>
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of
                                                        Birth</p>
                                                    <p class="col-sm-10">
                                                        <?php echo $rows['DateBirth']; ?>
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID
                                                    </p>
                                                    <p class="col-sm-10">
                                                        <?php echo $rows['EmailAddress']; ?>
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                                    <p class="col-sm-10">
                                                        <?php echo $rows['PhoneNumber']; ?>
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
                                                    <p class="col-sm-10 mb-0">
                                                        <?php echo $rows['country']; ?>,<br>
                                                        <?php echo $rows['province']; ?>,<br>
                                                        <?php echo $rows['city']; ?>,<br>
                                                        <?php echo $rows['address']; ?>
                                                    </p>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <!-- Edit Details Modal -->
                                        <div class="modal fade" id="edit_personal_details" aria-hidden="true"
                                            role="dialog">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
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
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Personal Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" id="AdminForm"
                                                            action="assets/php/update-Admin.php">

                                                            <div class="row form-row">
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>First Name</label>
                                                                        <input type="text" name="f_name" id="name"
                                                                            class="form-control"
                                                                            value="<?php echo $rows['FirstName']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Last Name</label>
                                                                        <input type="text" name="l_name" id="surname"
                                                                            class="form-control"
                                                                            value="<?php echo $rows['LastName']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Date of Birth</label>

                                                                        <input type="text" name="DOB" id="DOB"
                                                                            class="form-control" value="<?php if (!$rows['DateBirth'] == "") {
                                                                                        $date = new DateTime($rows['DateBirth']);
                                                                                        echo $date->format('Y/m/d');
                                                                                    } else {
                                                                                        echo "1983/02/03";
                                                                                    }
                                                                                    ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Email ID</label>
                                                                        <input type="email" class="form-control"
                                                                            id="email"
                                                                            value="<?php echo $rows['EmailAddress']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Mobile</label>
                                                                        <input type="text" name="phone_nr" id="phone_nr"
                                                                            value="<?php if (!$rows['PhoneNumber'] == "") {
                                                                                        echo $rows['PhoneNumber'];
                                                                                    } else {
                                                                                        echo "Not Set";
                                                                                    }
                                                                                    ?>" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <h5 class="form-title"><span>Address</span></h5>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Address</label>
                                                                        <input type="text" class="form-control"
                                                                            id="address" name="address" value="<?php if (!$rows['address'] == "") {
                                                                                        echo $rows['address'];
                                                                                    } else {
                                                                                        echo "Not Set";
                                                                                    }
                                                                                    ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>City</label>
                                                                        <input type="text" class="form-control"
                                                                            id="city" name="city" value="<?php if (!$rows['city'] == "") {
                                                                                        echo $rows['city'];
                                                                                    } else {
                                                                                        echo "Not Set";
                                                                                    }
                                                                                    ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Province</label>
                                                                        <input type="text" class="form-control"
                                                                            id="province" name="province" value="<?php if (!$rows['province'] == "") {
                                                                                        echo $rows['province'];
                                                                                    } else {
                                                                                        echo "Not Set";
                                                                                    }
                                                                                    ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Zip Code</label>
                                                                        <input type="text" class="form-control"
                                                                            id="zipcode" name="zipcode" value="<?php if (!$rows['zipcode'] == "") {
                                                                                        echo $rows['zipcode'];
                                                                                    } else {
                                                                                        echo "Not Set";
                                                                                    }
                                                                                    ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <div class="form-group">
                                                                        <label>Country</label>
                                                                        <input type="text" class="form-control"
                                                                            id="country" name="country" value="<?php if (!$rows['country'] == "") {
                                                                                        echo $rows['country'];
                                                                                    } else {
                                                                                        echo "Not Set";
                                                                                    }
                                                                                    ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php } ?>

                                                            <button type="submit" class="btn btn-primary btn-block">Save
                                                                Changes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Edit Details Modal -->

                                    </div>


                                </div>
                                <!-- /Personal Details -->

                            </div>
                            <!-- /Personal Details Tab -->

                            <!-- Change Password Tab -->
                            <div id="password_tab" class="tab-pane fade">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Change Password</h5>
                                        <div class="row">
                                            <div class="col-md-10 col-lg-6">
                                                <form method="post" action="assets/php/cpassword.php">
                                                    <div class="form-group card-label">
                                                        <label>Old Password</label>
                                                        <input name="old_pws" required autocomplete="off"
                                                            type="password" class="form-control" required>
                                                    </div>
                                                    <div class="form-group card-label">
                                                        <label>New Password</label>
                                                        <input type="password" id="password" name="new_pws"
                                                            class="form-control floating" required autocomplete="off"
                                                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$"
                                                            title="Must contain 8 to 12 uppercase, lowercase letters, numbers and symbols">
                                                    </div>
                                                    <div class="form-group card-label">
                                                        <label>Confirm Password</label>
                                                        <input type="password" class="form-control floating"
                                                            autocomplete="off" id="retype-password">
                                                    </div>
                                                    <div class="submit-section">
                                                        <button name="submit" type="submit"
                                                            class="btn btn-primary submit-btn">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Change Password Tab -->

                        </div>
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

    <!-- Custom JS -->
    <script src="a_assets/js/script.js"></script>
    <script>
    function check() {
        alert("im working")
    }
    </script>
    <script>
    $(document).ready(function() {
        $("#AdminForm").submit(function(event) {
            var formData = {
                f_name: $('#name').val(),
                l_name: $("#surname").val(),
                DOB: $("#DOB").val(),
                phone_nr: $("#phone_nr").val(),
                //email: $("#email").val(),
                address: $("#address").val(),
                city: $("#city").val(),
                province: $("#province").val(),
                country: $("#country").val(),
                zipcode: $("#zipcode").val()
            };

            $.ajax({
                    type: "POST",
                    url: "assets/php/update-Admin.php",
                    data: formData,
                    dataType: "json",
                    encode: true,
                }).done(function(data) {
                    if (data.msg !== "unsuccessful") {
                        console.log('ajax success = ' + data.msg);
                        $('#alert1').removeAttr("hidden");
                    } else {
                        $('#alert2').removeAttr("hidden");
                        console.log('ajax error = ' + data.msg);
                    }
                })
                .fail(function(xhr) {
                    $('#alert2').removeAttr("hidden");
                    console.log(xhr.responseText);

                });
            event.preventDefault();
        });
    });
    </script>


</body>



</html>