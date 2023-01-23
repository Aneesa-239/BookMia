<?php
require_once "config.php";


        ini_set('display_errors', '1');
		ini_set('display_startup_errors', '1');
		error_reporting(E_ALL);
		
		
$doccount = "SELECT COUNT(*) FROM Doctor";
$last = mysqli_query($conn, $doccount);
$row = [];

if ($last->num_rows > 0) {
    // fetch all data from db into array 
    $row = $last->fetch_all(MYSQLI_ASSOC);
}
if (!empty($row))
    foreach ($row as $rows) {
        $number = $rows['COUNT(*)'] + 1;
    }
    
// If upload button is clicked ...
if (isset($_POST["submit"])) {
    
    $Name = $_POST['f_name'];
    $Surname = $_POST['l_name'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone_nr'];
    $fee = $_POST['price'];
    $Selected_option = $_POST['type_d'];
    $Overview = $_POST['descript'];
    $Education = $_POST['des_pro'];
    $doing = $_POST['seriv'];
    $Location = $_POST['loca'];
    $Password = $_POST['password'];
    
    /*$filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../img/".$filename; */
    
    $query1 = "INSERT INTO User ( FirstName, LastName, EmailAddress, PhoneNumber, UserPassword) 
            VALUES ('$Name', '$Surname', '$Email', '$Phone', '$Password')";

    $query2 = "INSERT INTO Doctor SET  DoctorCode = 'DR00$number', UserCode =(SELECT UserCode FROM User WHERE EmailAddress = '$Email' LIMIT 1), DoctorType = '$Selected_option',Profession = '$Education' , Location = '$Location', Fees = '$fee' , Services = '$doing'";
         
    mysqli_query($conn, $query1);
    mysqli_query($conn, $query2);
    
   header('Location: ../../a_doctor-list.php?message="Image uploaded successfully!"');
 
    /* Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        
        /*echo "<h3>  Image uploaded successfully!</h3>";
        echo print_r($_SESSION, TRUE);
    }
                
     
    header('Location: ../../newdoc.php?message="Image upload was unsuccessful!"');*/
  
}
?>