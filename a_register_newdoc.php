<?php 
    require_once('assets/php/config.php');


		ini_set('display_errors', '1');
		ini_set('display_startup_errors', '1');
		error_reporting(E_ALL);
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

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <?php

		require_once('assets/php/config.php');
		ini_set('display_errors', '1');
		ini_set('display_startup_errors', '1');
		error_reporting(E_ALL);
		
		//$authsess = $_SESSION['name'];
		?>


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
                    <a href="a_index.php" class="navbar-brand logo">
                        <img src="assets/img/favicon.png" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="a_index.php" class="menu-logo">
                            <img src="assets/img/favicon.png" class="img-fluid" alt="Logo">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    <ul class="main-nav">
                        <li>
                            <a href="a_index.php">Home</a>
                        </li>
                    </ul>
                </div>
                


                </ul>
            </nav>
        </header>
        <!-- /Header -->

        

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                   
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <div class="card">
                            <div class="card-body">
                            

                                <!-- Profile Settings Form -->
                                <form method="post" action="assets/php/newdoc.php">
                                    <div class="row form-row">
                                        
            

                                        
                                        
                                        <div class="col-12 col-md-6">
                                            <div class="form-group card-label">
														<label>First Name</label>
                                                <input type="text" name="f_name" class="form-control" value="" title="Letters Only" required pattern="[a-zA-Z]+" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group card-label">
														<label>Last Name</label>
                                                <input type="text" name="l_name" class="form-control" value="" required 
														pattern="[a-zA-Z]+" 
														title="Letters Only">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                         <div class="form-group card-label">
														<label>Email Address</label>
                                                <input type="email" name="email" class="form-control" placeholder="name@gmail.com" value=""pattern="[A-Za-z0-9._%+-]{3,}@[a-zA-Z]{3,}([.]{1}[a-zA-Z]{2,}|[.]{1}[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,})" required>
							
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                        <div class="form-group card-label">
														<label>Mobile Number</label>
                                                <input type="text" name="phone_nr" class="form-control" value=""pattern="[0-9]+" 
													   maxlength="10" 
													   title="Enter a 10 digit phone number" required>
                                            </div>
                                        </div>  
                                        
                                         <div class="col-12 col-md-6">
                                        <div class="form-group card-label">
														<label>Price (per hour)</label>
                                                <input type="text" name="price" class="form-control" value="" maxlength="10" 
													   title="Please only enter number" required>
                                            </div>
                                        </div> 
                                        
										

													<div class="col-12 col-md-6"
												 <div class="form-group card-label">
														<label>Type of Doctor
														</label>
			<?php
        require("assets/php/config.php");
        
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);


//pull the required data from the database
	$query = "SELECT * FROM DoctorType";
								
	//getting email -> put in var -> 							
	$result = mysqli_query($conn, $query);
	$options = [];
	
	if ($result->num_rows > 0) {
									// fetch all data from db into array 
									$options = $result->fetch_all(MYSQLI_ASSOC);
									

								}	
								?>						
															<select class="select form-control" name = "type_d" id="type_d">
							
																 <?php foreach ($options as $option){ ?>
      <option value="<?php echo $option['DocTypeID']; ?>"><?php echo $option['DoctorTitle']; ?></option>
    <?php }; ?>
    
    
															</select>
															
														</div>
													</div>

												</div>  
									
                                        
                                          <div class="col-12">
                                            <div class="form-group card-label">
														<label>Description of Doctor Type</label>
                                                <input type="text" name="descript" class="form-control" value="" placeholder ="Therapists, or psychotherapists, are licensed mental health professionals who specialize in helping clients develop better cognitive and emotional skills, reduce symptoms of mental illness, and cope with various life challenges to improve their lives." required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="form-group card-label">
														<label>Description of Profession</label>
                                                <input type="text" name="des_pro" name="des_pro" class="form-control" value="" placeholder ="MPT - Master of Physical Therapy, MBBS,MD - General Medicine" required>
                                            </div>
                                        </div>
                                        
                                           <div class="col-12">
                                            <div class="form-group card-label">
														<label>Servives Doctor will provide</label>
                                                <input type="text" name="seriv" class="form-control" value="" placeholder ="Therapeutic Exercises and Functional Training, Modalities, Sports Rehabilitation, Pre and Post-Operative Care" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="form-group card-label">
														<label>Location of practice</label>
                                                <input type="text" name="loca" class="form-control" placeholder="City, Province"value="" required>
                                            </div>
                                        </div>
                                        
                        <label>Please note that these are temporary password - ensure they are given to doctor.</label>                 
                                        
                                        <div class="col-12 col-md-6">
                                           <div class="form-group card-label">
														<label>Password</label>
                                                <input type="password" id="password" name="password" class="form-control floating" required 
													   pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" 
													   title="Must contain 8 to 12 uppercase, lowercase letters, numbers and symbols">
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-md-6">
                                           <div class="form-group card-label">
														<label>Confirm Password</label>
                                                <input  type="password" class="form-control floating" id="retype-password" required>
                                            </div>
                                        </div>
                                    <div class="submit-section">
                                        <button type="submit" name="submit" class="btn btn-primary submit-btn">Save
                                            Changes</button>
                                    </div>
                                </form>
                                <!-- /Profile Settings Form -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Content -->



</body>

</html>