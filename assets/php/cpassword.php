<?php
require_once "config.php";

session_start();
$authsess = $_SESSION['name'];

        ini_set('display_errors', '1');
		ini_set('display_startup_errors', '1');
		error_reporting(E_ALL);


if (isset($_POST["submit"])) {
    
    $old = $_POST['old_pws'];
    $new = $_POST['new_pws'];
    
    $sql = "select * from User where  EmailAddress = '$authsess'";
	
	$rs = mysqli_query($conn,$sql);
	$numRows = mysqli_num_rows($rs);
	$hash_o = password_hash($old,PASSWORD_DEFAULT);

	if($numRows == 1 and $hash_o){
		$row = mysqli_fetch_assoc($rs);
		
 
  	if(password_verify($old,$hash_o)){
  	    
  	    
  	    $hash = password_hash( $new, PASSWORD_DEFAULT);// The hash of the password that
  	    
  	    $query = "UPDATE User SET UserPassword = '$hash'  WHERE EmailAddress = '$authsess'";
    
    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: ../../change-password.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
  	}
  	
	}
	
     mysqli_close($conn); 

}


?>