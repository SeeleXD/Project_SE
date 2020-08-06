<?php
session_start();
include('../database/connect.php');

if (!isset($_SESSION['User']))
    header("Location: login.php");

$sql_user = "SELECT Subscription FROM users WHERE UserID=?";
$ps = $con->prepare($sql_user);
$ps->bind_param("s", $_SESSION['User']);
$ps->execute();
$res = $ps->get_result()->fetch_assoc();

$q = "SELECT * FROM theory WHERE TheoryId=?";
$s = $con->prepare($q);
$s->bind_param("s", $_GET['id']);
$s->execute();
$result = $s->get_result()->fetch_assoc();

if ($res["Subscription"] === "Free" && $result["TheorySubscription"] !== "Free")
    header("Location: subscription.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theory</title>

    <link rel="icon" href="../assets/images/core/icon.png"/>
    <link rel="stylesheet" href="../assets/css/core/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/errorModal.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/user.css">

    <script src="../assets/js/jquery.min.js"></script>
</head>

<header class="header header_style_01">
    <nav class="navbar header-nav navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="../assets/images/core/logo.png" alt="image"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarApp" aria-controls="navbarApp" aria-expanded="false" aria-label="Toggle navigation">
				<span></span>
				<span></span>
				<span></span>
			</button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarApp">
                <ul class="navbar-nav">
                    <li><a class="nav-link" href="home.php">Home</a></li>
                    <li><a class="nav-link active" href="theory.php">Theory</a></li>
                    <li><a class="nav-link" href="subscription.php">Subscription</a></li>
                    <li><a class="nav-link" href="controller/logoutController.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<style>
    .content {
        width: 100%;
        margin: auto;
    }
</style>

<div class="content mt-5 pt-5">

    <div class="col-12 flex-column center">
        <h2><?= $result['Title'] ?></h2>
        <?= $result['Content'] ?>
    </div>

    <button type="button" class="btn btn-danger btn-sm float-right mr-5">
        <a class="text-light" href="./theory.php">Back</a>
    </button>

</div>

</html>
<script src="../assets/js/all.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/swiper.min.js"></script>