<?php
echo "register is called";
//call the database config file, with the database connection
require_once "config.php";
$Name = $_POST['name'];
$Surname = $_POST['surname'];
$Email = $_POST['email'];
$Phone = $_POST['phone'];
$Password = $_POST['password'];

echo "$Name, $Surname,$Email', '$Phone, $Password";
//database SQL insert code
/*$sql = "INSERT INTO User (UserCode, FirstName, EmailAddress, PhoneNumber, Password) 
        VALUES ('#US002', '$Name', $Surname','$Email', '$Phone', '$Password')";
//Insert into the database
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); */
$query = "insert into User(UserCode,FirstName,Lastname,EmailAddress,PhoneNumber,Password) values('#US002', '$Name', $Surname','$Email', '$Phone', '$Password')";
$run = mysqli_query($conn, $query) or die(mysqli_error());

if ($run) {
    echo "Form submitted";
    header("location: index-2.html");
    exit();
} else {
    echo "Form not submitted";
}


//if (mysqli_query($conn,$sql)){
//Insert into the database
// if ($conn->query($sql) === TRUE) 
//echo "New record created successfully";
//redirect the user to home page



//} else {
//echo "Error: " . $sql . "<br>" . mysqli_error($conn);


mysqli_close($conn);

?>