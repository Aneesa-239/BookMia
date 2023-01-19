<?php
require_once "config.php";

session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


if (isset($_POST["submit"])) {
    $Name = $_POST['f_name'];
    $Surname = $_POST['l_name'];
    $Email = $_SESSION['name'];
    $Phone = $_POST['phone_nr'];
    $DOB = $_POST['DOB'];
    $date = DateTime::createFromFormat('Y/m/d', "$DOB");
    $ADD = $_POST['address'];
    $City = $_POST['city'];
    $Prov = $_POST['province'];
    $Count = $_POST['country'];
    $Zip = $_POST['zipcode'];

    echo "$Name, $Email";



    //Add EmailAddress= $Email after session's update, else the person's email must not be changeable
    $query = "UPDATE User SET FirstName ='$Name', LastName= '$Surname', PhoneNumber= '$Phone', DateBirth = '$date', address= '$ADD', city= '$City', province='$Prov', country='$Count', zipcode='$Zip'  WHERE EmailAddress= '$Email'";

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: ../../a_profile.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

// If upload button is clicked ...
if (isset($_POST['upload'])) {

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../img/" . $filename;

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
        header('Location: ../../profile-settings.php?message= Failed to upload image!');
        /*echo "<h3>  Failed to upload image!</h3>";*/
    }
}




?>