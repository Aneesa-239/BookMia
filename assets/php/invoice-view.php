<?php

    

require_once('config.php');



  
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    
    


//if(isset($_GET['id']) && !empty($_GET['id'])) {

  
        
      $app = $_GET['id'];
      
      $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
        
      $doc = "SELECT * FROM User INNER JOIN Doctor ON Doctor.UserCode = User.UserCode INNER JOIN Booking ON Booking.DoctorCode = Doctor.DoctorCode WHERE Booking.BookingCode = '$app'";

      $res = mysqli_query($conn, $doc);
      $info = mysqli_fetch_assoc($res);

      $d_name = $info['FirstName'];
      $d_lastname = $info['LastName']; 
      $d_loca = $info['Location'];

      
      $pat = "SELECT * FROM User INNER JOIN Patient ON Patient.UserCode = User.UserCode INNER JOIN Booking ON Booking.PatientCode = Patient.PatientCode WHERE Booking.BookingCode = '$app'";

         
      $res = mysqli_query($conn, $pat);
      $data = mysqli_fetch_assoc($res);

    
      $name = $data['FirstName'];
      $lastname = $data['LastName'];
      $patemail = $data['address'];
      $city = $data['city'];
      $pro = $data['province'];
      $zc = $data['zipcode'];
      $count = $data['country'];
      
       
      $price = "SELECT * FROM User INNER JOIN Doctor ON Doctor.UserCode = User.UserCode INNER JOIN Booking ON Booking.DoctorCode = Doctor.DoctorCode WHERE Booking.BookingCode = '$app'";

         
      $res = mysqli_query($conn, $price);
      $data = mysqli_fetch_assoc($res);

    
      $amount = $data['Fees'];

    


  


echo("


<!DOCTYPE html> 
<html lang='en'>
  
<head>
    <meta charset='utf-8'>
    <title>BookMia</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    
    <!-- Favicons -->
    <link href='../img/favicon.png' rel='icon'>
    
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='../css/bootstrap.min.css'>
    
    <!-- Fontawesome CSS -->
    <link rel='stylesheet' href='../plugins/fontawesome/css/fontawesome.min.css'>
    <link rel='stylesheet' href='../plugins/fontawesome/css/all.min.css'>
    
    <!-- Main CSS -->
    <link rel='stylesheet' href='../css/style.css'>
  
  </head>
  <body>
      
      <!-- Page Content -->
      <div class='content'>
        <div class='container-fluid'>


<div class='row'>
            <div class='col-lg-8 offset-lg-2'>
              <div class='invoice-content'>
                  
    
                <div class='invoice-item'>
                  <div class='row'>
                    <div class='col-md-6'>
                      <div class='invoice-logo'>
                        <img src='../img/favicon.png' alt='logo'>
                      </div>
                    </div>
                    <div class='col-md-6'>
                      <p class='invoice-details'>
                        <strong>Issued:</strong> 10/01/2023
                      </p>
                    </div>
                  </div>
                </div>
                
                <!-- Invoice Item -->
                <div class='invoice-item'>
                  <div class='row'>
                    <div class='col-md-6'>
                      <div class='invoice-info'>
          
                        <strong class='customer-text'>Invoice From</strong>
                        <p class='Invoice-details invoice-details-two'>
                          Dr."	.$d_name."
		" . $d_lastname . "<br> " . $d_loca . "
                        <br>
                          
                        </p>
                      </div>
                    
                      
                    </div>
                    <div class='col-md-6'>
                      <div class='invoice-info invoice-info2'>
        
                        <strong class='customer-text'>Invoice To</strong>
                        <p class='invoice-details'>
                        " . $name . " " . $lastname . "   <br>
                          " . $patemail . ", " . $city . "<br>
                          " . $pro . ", " . $zc . ", " . $count . " <br>
                        </p>
                      </div>
                
                    </div>
                  </div>
                </div>
                <!-- /Invoice Item -->
                
                <!-- Invoice Item -->
                <div class='invoice-item'>
                  <div class='row'>


<div class='col-md-12'>
                      <div class='invoice-info'>
                        <strong class='customer-text'>Payment Method</strong>
                        <p class='invoice-details invoice-details-two'>
                          Credit Card <br>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Invoice Item -->
                
                <!-- Invoice Item -->
                <div class='invoice-item invoice-table-wrap'>
                  <div class='row'>
  
                    <div class='col-md-12'>
                      <div class='table-responsive'>
                        <table class='invoice-table table table-bordered'>
                          <thead>
                            <tr>
                              <th>Description</th>
                              <th class='text-center'>Quantity</th>
                              <th class='text-center'>VAT</th>
                              <th class='text-right'>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>General Consultation</td>
                              <td class='text-center'>1</td>
                              <td class='text-center'>15%</td>
                              <td class='text-right'>R " . $amount . "</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class='col-md-6 col-xl-4 ml-auto'>
                      <div class='table-responsive'>
                        <table class='invoice-table-two table'>
                          <tbody>
                          <tr>
                            <th>Subtotal:</th>
                            <td><span>R " . $amount . "</span></td>
                          </tr>
                          
                          <tr>
                            <th>Total Amount:</th>
                            <td><span>R " . $amount . "</span></td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                
                  </div>
                </div>
                <!-- /Invoice Item -->
                
                <!-- Invoice Information -->
                <div class='other-info'>
                  <h4>Other information</h4>
                  <p class='text-muted mb-0'>Welcome to BookMia® Medical Professional website. Mia Medical, LLC (“Mia Medical”) provides its Services to you (the “Buyer”) subject to the notices, terms and conditions of this agreement ('Agreement'). We reserve the right to change this website and these terms and conditions at any time.All new customers will be required to prepay. Unless otherwise indicated on the sales order, payment may be made via Credit Card, Check or Wire Transfer with the following considerations:Checks can be made payable to “Mia Medical” and sent to:Mia Medical, PO Box 775245, Gauteng ,South Africa.Credit card payments can be taken at http://www.motseki.net.za/bookmia/user/ or a payment link from the emailed invoice. Each payment MUST reference the Mia Medical Invoice Number or payment may be rejected.If payment is made via wire transfers: Buyer is responsible for all fees charged by Buyer’s banking or financial institution and any intermediary bank.</p>
                </div>
                <!-- /Invoice Information -->
                
              </div>
              
            </div>
          </div>

        </div>


</div>    
      <!-- /Page Content -->
       
     </div>
     <!-- /Main Wrapper -->
    
    <!-- jQuery -->
    <script src='assets/js/jquery.min.js'></script>
    
    <!-- Bootstrap Core JS -->
    <script src='assets/js/popper.min.js'></script>
    <script src='assets/js/bootstrap.min.js'></script>
    
    <!-- Slick JS -->
    <script src='assets/js/slick.js'></script>
    
    <!-- Custom JS -->
    <script src='assets/js/script.js'></script>
    
  </body>

</html>
");








?>