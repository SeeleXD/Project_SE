<?php
include('../../database/connect.php');
session_start();

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $pass = $_POST['password'];

    $q = "SELECT * FROM admin WHERE username=?";
    $s = $con->prepare($q);
    $s->bind_param("s", $username);
    $s->execute();

    $res = $s->get_result();
    if ($res->num_rows == 0) {
        $_SESSION['Msg'] = 'Username doesnt exists!';
        header("Location: ../login.php");
    } else {
        $res = $res->fetch_assoc();
        if ($pass != $res['Password']) {
            $_SESSION['Msg'] = 'Wrong Password And Username Combination!';
            header("Location: ../login.php");
        } else {
            $_SESSION['Admin'] = $res['ID'];
            header("Location: ../index.php");
        }
    }
}
