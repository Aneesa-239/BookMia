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
	<body class="account-page">

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
						<a href="index.php" class="navbar-brand logo">
							<img src="assets/img/favicon.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index.php" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li>
								<a href="index.php">Home</a>
							</li>
						</ul>
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">

							<div class="header-contact-detail">

							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link header-login" href="login.php">login / Signup </a>
						</li>
					</ul>
				</nav>
			</header>
			<!-- /Header -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
								
							<!-- Register Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="BookMia Register">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Patient Register </h3>
										</div>
										
										<!-- Register Form -->
										<form action="assets/php/register.php" id="RegisterForm" method="post" onsubmit="">
										    
										    
							                <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <div class="change-avatar">
                                                    <div class="profile-img">
                                                        <img src="assets/img/patients/patient.jpg" alt="User Image">
                                                    </div>
                                                    <div class="upload-img">
                                                      
                                                      <input type="file" name="uploadfile" id="file">  
                                                        <input type="submit" value="upload" name="upload">  
                                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max
                                                            size of 2MB</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	    
										    
											   <div class="form-group card-label">
														<label>Name</label>
												<input type="text" name="name" class="form-control floating" required pattern="[a-zA-Z]+" title="Letters Only" >
											</div>
											   <div class="form-group card-label">
														<label>Surname</label>
												<input type="text" name="surname" class="form-control floating" required pattern="[a-zA-Z]+" title="Letters Only">
											</div>
											   <div class="form-group card-label">
														<label>Email Address</label>
												<input type="text" class="form-control floating" name="email" required
														pattern="[A-Za-z0-9._%+-]{3,}@[a-zA-Z]{3,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,})" title="Example: name@email.com" placeholder="name@email.com">
											</div>
											   <div class="form-group card-label">
														<label>Mobile Number</label>
												<input type="text" class="form-control floating" name="phone"
												       pattern="[0-9]+" maxlength="10" title="Enter a 10 digit phone number">
											</div>
											   <div class="form-group card-label">
														<label>Password</label>
												<input type="password" id="password" name="password" class="form-control floating" required 
													   pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" 
													   title="Must contain 8 to 12 uppercase, lowercase letters, numbers and symbols">
											</div>
										   <div class="form-group card-label">
														<label>Confirm Password</label>
												<input type="password" class="form-control floating" id="retype-password">
											</div>
											<div class="text-right">
												<a class="forgot-link" href="login.php">Already have an account?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" name = "submit" type="submit">Signup</button>
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Register Content -->
								
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
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
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
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14360.984391829074!2d28.256738442065434!3d-25.861376505012544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e9567b26fcc118f%3A0x164a9f8a696b5813!2sRoute%2021%20Business%20Park%2C%20Centurion%2C%200178!5e0!3m2!1sen!2sza!4v1671531637140!5m2!1sen!2sza" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
		<script src="assets/js/Register.js"></script>

	</body>

</html>