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

    $query = "insert into User(FirstName,Lastname,EmailAddress,PhoneNumber,UserPassword) 
            values('$Name', $Surname','$Email', '$Phone', '$Password')";

    echo "$Name, $Surname,$Email', '$Phone, $Password";
    mysqli_query($conn, $query);

    mysqli_close($conn);
    header("Location:index-2.html");
}
?>