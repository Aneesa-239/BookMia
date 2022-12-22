<?php
echo "register is called";

//call the database config file, with the database connection
require_once "config.php";

if (isset($_POST["submit"])) {

    $Name = $_POST['name'];
    $Surname = $_POST['surname'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $Password = $_POST['password'];

    echo "$Name, $Surname,$Email', '$Phone, $Password";

    $query = "insert into User(UserCode,FirstName,Lastname,EmailAddress,PhoneNumber,Password) 
            values('#US002', '$Name', $Surname','$Email', '$Phone', '$Password')";
    $run = mysqli_query($conn, $query) or die(mysqli_error());

    if ($run) {
        echo "Form submitted";
        header("location: index-2.html");
        exit();
    } else {
        echo "Form not submitted";
    }
}







mysqli_close($conn);

?>