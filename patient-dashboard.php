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
                        <li class="active"><a href="patient-dashboard.php">Patient Dashboard</a></li>
                        <li>
                            <a href="profile-settings.php" style="color: #fefefe">Profile Settings</a>
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
                            <p class="contact-info-header">
                                <?php if (!empty($row))
									foreach ($row as $rows) {
										echo $rows['FirstName'];
									} ?>
                                <?php if (!empty($row))
									foreach ($row as $rows) {
										echo $rows['LastName'];
									} ?> !
                            </p>
                        </div>
                    </li>

                    <!-- User Menu -->
                    <li class="nav-item dropdown has-arrow logged-item">
                        <?php
						//pull the required data from the database
						$query = "SELECT FirstName,LastName,EmailAddress,PhoneNumber, DateBirth, address, city, province, country, zipcode,image
										  FROM User
										  Where EmailAddress = '$authsess'";
						$result = mysqli_query($conn, $query);
						$row = [];

						$proimg = "SELECT image FROM User Where EmailAddress = '$authsess'";




						if ($result->num_rows > 0) {
							// fetch all data from db into array 
							$row = $result->fetch_all(MYSQLI_ASSOC);
						}
						?>
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <span class="user-img">
                                <?php if (!empty($row))
									foreach ($row as $rows) { ?>
                                <img class="rounded-circle" src="assets/img/<?php
										if (!empty($rows['image'])) {
											echo $rows['image'];
										} else {
											echo 'patients/patient.jpg';
										}
										?>" width="31" alt="Ryan Taylor">
                                <?php } ?>
                            </span>
                        </a>
                        <?php
						//pull the required data from the database
						$query = "SELECT FirstName,LastName,EmailAddress,PhoneNumber, DateBirth, address, city, province, country, zipcode,image
										  FROM User
										  Where EmailAddress = '$authsess'";
						$result = mysqli_query($conn, $query);
						$row = [];

						$proimg = "SELECT image FROM User Where EmailAddress = '$authsess'";




						if ($result->num_rows > 0) {
							// fetch all data from db into array 
							$row = $result->fetch_all(MYSQLI_ASSOC);
						}
						?>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php if (!empty($row))
								foreach ($row as $rows) { ?>
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    <img src="assets/img/<?php
											if (!empty($rows['image'])) {
												echo $rows['image'];
											} else {
												echo 'patients/patient.jpg';
											}
											?>>" alt="User Image" class="avatar-img rounded-circle">
                                </div>
                                <div class="user-text">
                                    <h6>
                                        <?php echo $rows['FirstName'] ?>
                                        <?php echo $rows['LastName'] ?>
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
                                <li class="breadcrumb-item"><a href="index-2.php">Home</a></li>
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

                            <?php
							//pull the required data from the database
							$query = "SELECT FirstName,LastName,EmailAddress,PhoneNumber, DateBirth, address, city, province, country, zipcode, image
										  FROM User
										  Where EmailAddress = '$authsess'";
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
										} else {
											echo 'patients/patient.jpg';
										}
										?>" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h3>
                                            <?php if (!empty($row))
												foreach ($row as $rows) {
													echo $rows['FirstName'];
												} ?>
                                            <?php if (!empty($row))
												foreach ($row as $rows) {
													echo $rows['LastName'];
												} ?>
                                        </h3>
                                        <div class="patient-details">
                                            <h5><i class="fas fa-birthday-cake"></i>
                                                <?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['DateBirth'];
													} ?>
                                            </h5>
                                            <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i></i>
                                                <?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['city'];
													} ?> ,
                                                <?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['province'];
													} ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
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
                                        <!-- <li class="nav-item">
												<a class="nav-link" href="#pat_billing" data-toggle="tab">Billing</a>
											</li> -->
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
															$ans1 = "SELECT BookingCode, DoctorCode FROM Booking 
                                                                        INNER JOIN Patient ON Patient.PatientCode = Booking.PatientCode 
                                                                        INNER JOIN User ON Patient.UserCode = User.UserCode
                                                                        Where EmailAddress = '$authsess'
																		ORDER BY StartDate ASC";


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
															
																	$ans2 = "SELECT * FROM Doctor 
                                                            INNER JOIN Booking ON Booking.DoctorCode = Doctor.DoctorCode 
                                                            INNER JOIN User ON User.UserCode = Doctor.UserCode 
                                                            INNER JOIN DoctorType ON Doctor.DoctorType = DoctorType.DocTypeID 
                                                            WHERE BookingCode = '$BCode'
															";

																	$result = mysqli_query($conn, $ans2);
																	$arr2 = [];

																	if ($result->num_rows > 0) {
																		// fetch all data from db into array 
																		$arr2 = $result->fetch_all(MYSQLI_ASSOC);
																	}

																	if (!empty($arr2))
																		foreach ($arr2 as $rows) {
																			$inv = $rows['BookingCode'];
																			?>
                                                            <tr>
                                                                <td>
                                                                    <h2 class="table-avatar">
                                                                        <a href="doctor-profile.html"
                                                                            class="avatar avatar-sm mr-2">
                                                                            <img class="avatar-img rounded-circle" src="assets/img/<?php
																							if (!empty($rows['image'])) {
																								echo $rows['image'];
																							} else {
																								echo 'patients/patient.jpg';
																							}
																							?>" alt="User Image">
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
																					echo $date ?>
                                                                    <span class="d-block text-info">
                                                                        <?php
																						$time = new DateTime($rows["StartDate"]);
																						$st = $time->format('H:i');
																						echo $st;

																						?>
                                                                    </span>
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
                                                                        class="badge badge-pill bg-danger-light">Cancelled</span>
                                                                </td>
                                                                <?php } ?>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <form method="get"
                                                                            action="assets/php/invoice-view.php?id=<?php echo $inv; ?>">
                                                                            <button class="btn btn-sm bg-info-light"
                                                                                type='submit' id='<?php echo $inv; ?>'
                                                                                name='id' value="<?php echo $inv; ?>"><i
                                                                                    class="far fa-eye"></i>
                                                                                View</button>

                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="table-action">
                                                                        <a href="#" data-toggle="modal" name="Cancel"
                                                                            class="btn btn-sm bg-danger-light"
                                                                            id="<?php echo $rows['BookingCode']; ?>">
                                                                            <i class="fe fe-trash"></i> Delete
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php }
																} ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Appointment Tab -->

                                    <!-- Billing Tab 
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
														<tbody> -->
                                    <?php

									$ans2 = "SELECT * FROM Invoice 
                                                                        INNER JOIN Payment ON Payment.InvoiceCode = Invoice.InvoiceCode 
                                                                        INNER JOIN Booking ON Booking.BookingCode = Invoice.BookingCode 
                                                                        INNER JOIN Doctor ON Booking.DoctorCode = Doctor.DoctorCode 
                                                                        INNER JOIN User ON User.UserCode = Doctor.UserCode
                                                                        INNER JOIN DoctorType ON Doctor.DoctorType = DoctorType.DocTypeID
                                                                        Where Invoice.BookingCode = '$BCode'";

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
                                            <a href="invoice-view.html">#INV00<?php echo $rows['InvoiceCode'] ?></a>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img rounded-circle"
                                                        src="assets/img/doctors/doctor-thumb-01.jpg" alt=" User Image">
                                                </a>
                                                <a href="doctor-profile.html"><?php echo $rows['FirstName'] ?>
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
                                        <?php
												} ?>
                                        <td class="text-right">
                                            <div class="table-action">
                                                <a href="invoice-view.html?id=<?php echo $rows['InvoiceCode'] ?>"
                                                    class="btn btn-sm bg-info-light">
                                                    <i class="far fa-eye"></i> View
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
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
                    <!--/Billing Tab -->


                </div>
                <!-- Tab Content -->

            </div>
        </div>
    </div>
    </div>

    </div>

    </div>
    <!-- /Page Content -->
    <script>
    $('.Cancel').click(function(event) {
        event.preventDefault();
        var book_id = $(this).attr("id");
        $.ajax({
            url: 'assets/php/cancel_booking.php',
            dataType: 'json',
            data: {
                "bookID": book_id
            },
            type: 'post',
            success: function(result) {
                if (result.msg == "Success") {
                    $('#alert').removeAttr("hidden");
                    console.console.log(result.msg);
                } else {
                    console.console.log(result.msg);
                }
            },
            error: function(xhr, error) {
                console.log(xhr.responseText);
            }
        });
    });
    </script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/jquery.min.js"></script>


</body>

</html>