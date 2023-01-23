<?php 
	require_once('assets/php/config.php');
	
	include('assets/php/confirm_email.php');
	
	 session_start(); 
	 
		ini_set('display_errors', '1');
		ini_set('display_startup_errors', '1');
		error_reporting(E_ALL);
		
		$authsess = $_SESSION['name'];
		
		  if(isset($_GET['id']) && !empty($_GET['id'])){
        
        $book = $_GET['id'];
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
								<a href="search.php" style="color: #fefefe" >Search Doctor</a>
							</li>
							<li>
								<a href="patient-dashboard.php" style="color: #fefefe">Patient Dashboard</a>
							</li>
							<li>
								<a href="profile-settings.php" style="color: #fefefe">Profile Settings</a>
							</li>
							
							
						
						</ul>
						</li>
						</ul>
					</div>		 
					<<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
	<div class="header-contact-detail">
								<p class="contact-header">Welcome</p>
								<p class="contact-info-header"> <?php echo $_SESSION['name'] . '!'?></p>
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
									<li class="breadcrumb-item active" aria-current="page">Checkout</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Checkout</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-7 col-lg-8">
							<div class="card">
								<div class="card-body">
								    <?php
						
		    
								
								//pull the required data from the database
								$query = "SELECT FirstName,LastName,EmailAddress,PhoneNumber, DateBirth, address, city, province, country, zipcode
										  FROM User
										  Where EmailAddress = '$authsess'";
								$result = mysqli_query($conn, $query);
								$row = [];

								if ($result->num_rows > 0) {
									// fetch all data from db into array 
									$row = $result->fetch_all(MYSQLI_ASSOC);
								}
								?>
								
									<!-- Checkout Form -->
									<form action="assets/php/confirm_email.php?id=<?php echo $book; ?>" method="post">
									    
									
										<!-- Personal Information -->
										<div class="info-widget">
										    
											<h4 class="card-title">Personal Information</h4>
											
											<div class="row">
												<div class="col-md-6 col-sm-12">
												    
													<div class="form-group card-label">
														<label>First Name</label>
														
														<input type="text" name="f_name" class="form-control" value="<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['FirstName'];
													} ?>">
													</div>
												</div>
												
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Last Name</label>
														
														<input type="text" name="l_name" class="form-control" value="<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['LastName'];
													} ?>">
													</div>
												</div>
												
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Email</label>
														<input type="email" name="email" class="form-control" value="<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['EmailAddress'];
													} ?>">
													</div>
												</div>
												
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Phone</label>
														<input type="text" name="phone_nr" class="form-control" value="<?php if (!empty($row))
													foreach ($row as $rows) {
														echo $rows['PhoneNumber'];
													} ?>">
													</div>
													
												</div>
											</div>
										</div>
										<!-- /Personal Information -->
										
										<div class="payment-widget">
											<h4 class="card-title">Payment Method</h4>
											
											
											<!--Radio buttons -->
											<!-- Credit Card Payment -->
											
											<div class="payment-list">
												<label class="payment-radio credit-card-option">
													<input type="radio" name="radiobtn" value="1">
													<span class="checkmark"></span>
													Credit card
												</label>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_name">Name on Card</label>
															<input class="form-control" id="card_name" name="card_name" placeholder = "Name Surname"type="text"pattern="[A-Za-z/\s/]+"required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_number">Card Number</label>
															<input class="form-control" id="card_number" name ="card_number" placeholder="1234  5678  9876  5432" type="number" pattern="[0-9]{14}"required>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_month">Expiry Month</label>
															<input class="form-control" id="expiry_month" name="expiry_month"  type="number" min="1" max="12" pattern="\d+" placeholder="Month (1-12)"required>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_year">Expiry Year</label>
															<input class="form-control" id="expiry_year" name="expiry_year" placeholder="YYYY eg. 2023" type="text" pattern="20[0-9][0-9]" required>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="cvv">CVV</label>
															<input class="form-control" id="cvv" name="cvv" type="number" pattern="[0-9]{3,}"required>
														</div>
													</div>
												</div>
											</div>
											
											<!-- /Credit Card Payment -->
											
											<!-- Paypal Payment 
											<div class="payment-list">
												<label class="payment-radio paypal-option">
													<input type="radio" name="radiobtn" value="2" >
													<span class="checkmark"></span>
													PayFast
												</label>
											</div>
											<!-- /Paypal Payment -->
											
											
<!--						<script type="text/javascript">
  function checkInput() {
    var inputNum = document.getElementById("card_number").value;
    if (inputNum.length == 14) {
      //no action
    } else {
      alert("Please enter a 14 digit card number");
      header("location:../../checkout.php")
    }
    
  } <!-- onclick="checkInput()
</script>	-->


													<!--/Radio buttons -->
											
											
											<!-- Submit Section -->
<div class="submit-section proceed-btn text-right">
    
								  
								<button class="btn btn-primary submit-btn" type='submit' id='<?=$book ?>' name='submit' value="submit">Confirm and Pay</button>
							</div>
										
											
										</div>
									</form>
									<!-- /Checkout Form -->
									
								</div>
							</div>
							
						</div>
						
						<div class="col-md-5 col-lg-4 theiaStickySidebar">
						
							<!-- Booking Summary -->
							<div class="card booking-card">
								<div class="card-header">
									<h4 class="card-title">Booking Summary</h4>
								</div>
								<div class="card-body">
            	    						    
						<?php
						
									
    if(isset($_GET['id']) && !empty($_GET['id'])){
        
        $book = $_GET['id'];

	  $query = "SELECT * FROM Doctor INNER JOIN Booking ON Booking.DoctorCode = Doctor.DoctorCode INNER JOIN User ON Doctor.UserCode= User.UserCode WHERE BookingCode = '$book'";
							
	$result = mysqli_query($conn, $query);
	$row = [];
	
	if ($result->num_rows > 0) {
									// fetch all data from db into array 
									$row = $result->fetch_all(MYSQLI_ASSOC);

								}        
									
						
                                foreach ($row as $rows) {
                                    
								    
							?>     
								
									<!-- Booking Doctor Info -->
									<div class="booking-doc-info">
										<a href="doctor-profile.html" class="booking-doc-img">
											<img src="assets/img/<?php 
														echo $rows['image'];
													?>" alt="User Image">
										</a>
										<div class="booking-info">
											<h4><a href="p_doctor-profile.php">Dr. <?php 
														echo $rows['FirstName'];
													?> <?php 
														echo $rows['LastName'];
													?></a></h4>
								
											<div class="clinic-details">
												<p class="doc-location"><i class="fas fa-map-marker-alt"><?php 
														echo $rows['Location'];
													?></i> </p>
											</div>
										</div>
											<?php } }?>
									</div>
									<!-- Booking Doctor Info -->
									
								
				<?php
						
									
    if(isset($_GET['id']) && !empty($_GET['id'])){
        
        $book = $_GET['id'];

	  $query = "SELECT * FROM Doctor INNER JOIN Booking ON Booking.DoctorCode = Doctor.DoctorCode INNER JOIN User ON Doctor.UserCode= User.UserCode WHERE BookingCode = '$book'";
							
	$result = mysqli_query($conn, $query);
	$row = [];
	
	if ($result->num_rows > 0) {
									// fetch all data from db into array 
									$row = $result->fetch_all(MYSQLI_ASSOC);

								}        
									
						
                                foreach ($row as $rows) {
                                    
								    
							?>     
														
									<div class="booking-summary">
										<div class="booking-item-wrap">
											<ul class="booking-date">
												<li>Date<span>
												<?php 
												        $time = new DateTime($rows["StartDate"]);
												        $date = $time->format('d-M-Y');
														echo $date;?></span></li>
												<li>Time <span>
												<?php 
												        $time = new DateTime($rows["StartDate"]);
												        $start= $time->format('H:i');
														echo $start;?>- <?php 
												        $time = new DateTime($rows["EndDate"]);
												        $end = $time->format('H:i');
														echo $end;?></span></li>
											</ul>
											<ul class="booking-fee">
												<li>Consulting Fee <span>
												R <?php 
														echo $rows['Fees'];
													?>
													</span></li>
												
											</ul>
											<div class="booking-total">
												<ul class="booking-total-list">
													<li>
														<span>Total</span>
														<span class="total-cost">R<?php 
														echo $rows['Fees'];
													?></span>
													</li>
												</ul>
											</div>
										</div>
										<?php } }?>	
									</div>
								</div>
							</div>
							<!-- /Booking Summary -->
							
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   


		
	</body>

</html>