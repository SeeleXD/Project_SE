<?php
include('../../database/connect.php');
session_start();

if (!isset($_SESSION['Admin']))
    header("Location: login.php");
else if (!isset($_POST['banned']))
    header("Location: ../manage-user.php");

$sql_admin = "SELECT password FROM admin WHERE ID=?";
$ps = $con->prepare($sql_admin);
$ps->bind_param("s", $_SESSION['Admin']);
$ps->execute();

$res = $ps->get_result()->fetch_assoc();

if ($res['password'] !== $_POST['password']) {
    $_SESSION['Msg'] = "Failed Banned User !";
    header("Location: ../manage-user.php");
}
$sql = "UPDATE users SET isBanned=1 WHERE Username=?";
$ps = $con->prepare($sql);
$ps->bind_param("s", $_POST['username']);
$ps->execute();

header("Location: ../manage-user.php");
