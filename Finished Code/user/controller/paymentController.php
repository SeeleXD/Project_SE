<?php
session_start();
include '../../database/connect.php';

if($_REQUEST['token']!= $_SESSION['csrf_token']){
    $_SESSION['Msg'] = 'invalid token !';
    header("Location: ../subscription.php");
    die();
}

$target_dir = "../../assets/images/transaction/";

$old_file_name = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($old_file_name, PATHINFO_EXTENSION));

$new_file_name = uniqid() . '.' . $imageFileType;
$target_file = $target_dir . $new_file_name;

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if ($check === false)
        $_SESSION['Msg'] = "Invalid File";
    else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
        $_SESSION['Msg'] = "Invalid File Extension";
    else if ($_FILES["fileToUpload"]["size"] > 500000)
        $_SESSION['Msg'] = "File too Large";

    if (isset($_SESSION['Msg'])){
        header("Location: ../subscription.php");
        die();
    }

    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    $today = date("Y-m-d H:i:s");
    $id = date("YmdHis") . rand(1,100);
    $q = "INSERT INTO payment(Id, UserID, PaymentDate, PaymentPath) VALUES(?,?,?,?)";
    $ps = $con->prepare($q);
    $ps->bind_param("ssss",$id, $_SESSION['User'], $today,  $new_file_name);
    $ps->execute();

    $_SESSION['Msg'] = 'Payment Sucessfull, Verifying your payment :)';
    header("Location: ../subscription.php");
}
