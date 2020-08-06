<?php
include('../../database/connect.php');
session_start();

if (isset($_POST['submit'])) {

    if($_REQUEST['token']!= $_SESSION['csrf_token']){
        $_SESSION['Msg'] = 'invalid token !';
        header("Location: ../login.php");
        die();
    }
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $q = "SELECT * FROM users WHERE username=?";
    $s = $con->prepare($q);
    $s->bind_param("s", $username);
    $s->execute();

    $res = $s->get_result();
    if ($res->num_rows == 0) {
        echo "null";
        $_SESSION['Msg'] = 'Username doesnt exists!';
        header("Location: ../login.php");
    } else {
        $res = $res->fetch_assoc();
        var_dump($res);
        if ($pass != $res['Password']) {
            $_SESSION['Msg'] = 'Wrong Password And Username Combination!';
            header("Location: ../login.php");
        } else {
            $_SESSION['User'] = $res['UserId'];
            header("Location: ../home.php");
        }
    }
}
