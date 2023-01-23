<?php require_once "assets/php/config.php";
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$authsess = $_SESSION['name'];
//pull the required data from the database
$query = "SELECT * FROM Invoice 
                                INNER JOIN Booking ON Booking.BookingCode = Invoice.BookingCode
                                INNER JOIN Patient ON Patient.PatientCode = Booking.PatientCode
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

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="a_assets/plugins/datatables/datatables.min.css">

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



            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fa fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->

            <!-- Header Right Menu -->
            <ul class="nav user-menu">

 	<!-- Notifications -->
				<!-- Notifications -->
				<li class="nav-item dropdown noti-dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<i class="fe fe-bell"></i> <span class="badge badge-pill">
							<?php
							//pull the required data from the database
							$query1 = "SELECT COUNT(*) FROM Cancellation where isResolved = 0";
							$res = mysqli_query($conn, $query1);
							$row1 = [];

							if ($res->num_rows > 0) {
								// fetch all data from db into array 
								$row1 = $res->fetch_all(MYSQLI_ASSOC);
							}
							?>
							<?php

							if (!empty($row1))
								foreach ($row1 as $rows) {
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
						$query1 = "SELECT * FROM Cancellation 
                                INNER JOIN Doctor On Cancellation.DoctorCode = Doctor.DoctorCode
                                INNER JOIN User ON Doctor.UserCode = User.UserCode";
						$res = mysqli_query($conn, $query1);
						$canrow = [];

						if ($res->num_rows > 0) {
							// fetch all data from db into array 
							$canrow = $res->fetch_all(MYSQLI_ASSOC);
						}
						?>
						<div class="noti-content">


							<ul class="notification-list">
								<?php
								if (!empty($canrow))
									foreach ($canrow as $rows) {
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
						<span class="user-img"><img class="rounded-circle" src="assets/img/admin.jpg"
								width="31" alt="Ryan Taylor"></span>
					</a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm">
								<img src="assets/img/admin.jpg" alt="User Image"
									class="avatar-img rounded-circle">
							</div>
							<div class="user-text">
								<h6>Ryan Taylor</h6>
								<p class="text-muted mb-0">Administrator</p>
							</div>
						</div>
						<a class="dropdown-item" href="a_profile.php">My Profile
						<a class="dropdown-item" href="assets/php/logout.php">Logout</a>
					</div>
				</li>
				<!-- /User Menu -->

            </ul>
            <!-- /Header Right Menu -->

        </div>
        <!-- /Header -->

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
                        
                        <li class="active">
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

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Transactions</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="a.php">Dashboard</a></li>
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
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           
                                            if (!empty($row))
                                                foreach ($row as $rows) {
                                                    ?>
                                            <tr>
                                                <td><a href="#">#IN00<?php echo $rows["InvoiceCode"] ?></td>
                                                <td>
                                                    <?php echo $rows["PatientCode"] ?>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar avatar-sm mr-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/<?php echo $rows["image"] ?>"
                                                                alt="User Image"></a>
                                                        <a href="#">
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
    <script src="a_assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="a_assets/js/popper.min.js"></script>
    <script src="a_assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="a_assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Datatables JS -->
    <script src="a_assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="a_assets/plugins/datatables/datatables.min.js"></script>

    <!-- Custom JS -->
    <script src="a_assets/js/script.js"></script>

</body>


</html>