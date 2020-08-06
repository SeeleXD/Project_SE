<?php
include('../../database/connect.php');
session_start();

if (!isset($_SESSION['Admin']))
    header("Location: login.php");
else if (!isset($_POST['subscription']))
    header("Location: ../manage-user-subscription.php");

$sql = "UPDATE users SET Subscription=? WHERE UserId=?";
$ps = $con->prepare($sql);
$ps->bind_param("ss", $_POST['subscription'], $_POST['userid']);
$ps->execute();

header("Location: ../manage-user.php");


