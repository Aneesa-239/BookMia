<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if (isset($_GET['flag'])) {
    $flag = $_GET['flag'];
} else {
    $flag = "";
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
								<img src="assets/img/favicon.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li>
								<a href="index.php" style = "color: #fefefe">Home</a>
							</li>
							
						</ul>
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
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

							
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="BookMia Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Login<a href="#"></a></h3>
										</div>
										<form action="assets/php/authenticate.php" method="post">
										    
	<div class="form-group card-label">
														<label>Email Address</label>
    <input type="text" name="p_email" id="username" class="form-control floating" required	pattern="[A-Za-z0-9._%+-]{3,}@[a-zA-Z]{3,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,})" title="Example: name@email.com" placeholder="name@email.com">
    
    </div>
    
    <div class="form-group card-label">
														<label>Password</label></label>

    <input type="password" name="p_password" placeholder="Password" id="password" class="form-control floating" requiredpattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" 
													   title="Must contain 8 to 12 uppercase, lowercase letters, numbers and symbols">
	</div>
	
	<div class="text-right">
		<a class="forgot-link" href="forgot-password.php">Forgot Password ?</a>
	</div>
	

	
    <button class="btn btn-primary btn-block btn-lg login-btn" onclick="show()" type="submit" name="submit" value="Login">Login</button>
    
    <div class="text-center dont-have">Don’t have an account? <a href="p_register.php">Register</a></div>
    
    	
    
										<script src="assets/js/Login_validation.js"></script> <!--after form call the javascript stuff-->
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->

			
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
	
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<?php 
		
		if ($flag == "true") {
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