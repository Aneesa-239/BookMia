<?php

/*
ini_set('display_errors', 'On');
error_reporting(E_ALL);
*/

echo "register is called";

//call the database config file, with the database connection
require_once "config.php";

$patientcount = "Select COUNT(*) from Patient";
$last = mysqli_query($conn, $patientcount);
$row = [];

if ($last->num_rows > 0) {
    // fetch all data from db into array 
    $row = $last->fetch_all(MYSQLI_ASSOC);
}
if (!empty($row))
    foreach ($row as $rows) {
        $number = $rows['COUNT(*)'] + 1;
    }



if (isset($_POST["submit"])) {

    $Name = $_POST['name'];
    $Surname = $_POST['surname'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $Password = $_POST['password'];

    $query1 = "INSERT INTO User ( FirstName, LastName, EmailAddress, PhoneNumber, UserPassword, IsAdmin) 
            VALUES ('$Name', '$Surname', '$Email', '$Phone', '$Password', '0')";
    $string = "INSERT INTO Patient SET 

                PatientCode = '#PT00$number',UserCode = (SELECT UserCode
         FROM User
        WHERE EmailAddress = '$Email')";

    //when Patient logs in they will have to be saved into the Patient Table.

    echo "$Name, $Surname, $Email, $Phone, $Password";

    mysqli_query($conn, $query1);

    mysqli_query($conn, $string);


    mysqli_close($conn);

    header("Location: ../../login.php");
    /*
    $run = mysqli_query($conn, $query) or die(mysqli_error());
    if ($run) {
    echo "Form submitted";
    header("location: index-2.html");
    exit();
    } 
    else {
    echo "Form not submitted";
    }
    mysqli_close($conn);
    */

}



// If upload button is clicked ...
if (isset($_POST['upload'])) {
    
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../img/".$filename;
    
    ini_set('display_errors', '1');
		ini_set('display_startup_errors', '1');
		error_reporting(E_ALL);
    
    $authsess = $_SESSION['name'];
    // Get all the submitted data from the form
    
    $sql = "Update User SET image = '$filename' WHERE EmailAddress = '$authsess' ";
 
 
    // Execute query
    mysqli_query($conn, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        header('Location: ../../profile-settings.php?message=Image uploaded successfully!');
        /*echo "<h3>  Image uploaded successfully!</h3>";
        echo print_r($_SESSION, TRUE);*/
    } else {
         header('Location: ../../profile-settings.php?message=Image uploaded successfully!');
        /*echo "<h3>  Failed to upload image!</h3>";*/
    }
}

?>