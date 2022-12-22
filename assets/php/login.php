<?php

require_once "config.php";
require_once "session.php";

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){

    $email = trim ($_POST['p_email']); // giving the name you called input in html another name
    $password = trim($_POST['p_password']);

    //validate if email is empty
    if (empty($email)) {
        $error .= '<p class="error"> Please enter email.</p>';
    }

    //validate if password is empty
    if (empty($password)) {
        $error .= '<p class="error"> Please enter password.</p>';
    }

    if (empty($error)) {
        if ($query = $db -> prepare("SELECT * FROM user WHERE email = ?")){
            $query -> bind_param('s', $email);
            $query -> execute();
            $row = $query -> fetch();
            if ($row){
                if (password_verify($password, $row['password'])){
                    $_SESSION["userid"] = $row['id'];
                    $_SESSION["user"] = $row;

                    //redirect the user to home page
                    header("location: index-2.html");
                    exit;
                } else {
                    $error .= '<p class = "error"> No user exist with that email address .</p>';
                }
            }
            $query -> close();
        }
    //Close connection
    mysqi_close($db); // always remember to close the db
}
?>
