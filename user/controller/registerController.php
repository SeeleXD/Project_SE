<?php
include('../../database/connect.php');
session_start();

if (isset($_POST['submit'])) {
    if($_REQUEST['token']!= $_SESSION['csrf_token']){
        $_SESSION['Msg'] = 'invalid token !';
        header("Location: ../register.php");
        die();
    }
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $confpass = $_POST['confpassword'];

    if ($username == '' || $pass == '' || $email == '') {
        $_SESSION['Msg'] = 'Please Fill All Fields!';
        header("Location: ../register.php");
        die();
    } else if (strcmp($pass, $confpass) != 0) {
        $_SESSION['Msg'] = "Password Doesn't Match!";
        header("Location: ../register.php");
        die();
    }

    $q = "SELECT * FROM users WHERE username=?";
    $s = $con->prepare($q);
    $s->bind_param("s", $username);
    $s->execute();

    $res = $s->get_result();

    if ($res->num_rows != 0) {
        $_SESSION['Msg'] = 'Username Already Exists!';
        header("Location: ../register.php");
        die();
    } else {
        $q = "INSERT INTO users(UserId, Username, Subscription, Password, Email) VALUES (UUID(),?,'Free',?,?)";
        $s = $con->prepare($q);
        $s->bind_param("sss", $username, $pass, $email);
        $s->execute();
        header("Location: ../login.php");
    }
}


?>
