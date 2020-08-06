<?php
session_start();
include('../database/connect.php');

if (!isset($_SESSION['Admin']))
    header("Location: login.php");
else if (!isset($_GET['uname']))
    header("Location: manage-user.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <link href="../assets/css/core/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/core/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="icon" href="../assets/images/icon.png"/>
    <link rel="stylesheet" href="../assets/css/core/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/user.css">
    <link rel="stylesheet" href="../assets/css/errorModal.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <script src="../assets/js/jquery.min.js"></script>
</head>
<body>
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
                    <li><a class="nav-link active" href="index.php">Home</a></li>
                    <li><a class="nav-link" href="manage-user.php">Manage User</a></li>
                    <li><a class="nav-link" href="manage-theory.php">Manage Theory</a></li>
                    <li><a class="nav-link" href="controller/logoutController.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container">
    <div class="section-title text-center">
        <h3>Ban User Confirmation Page</h3>
    </div>

    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Ban User Confirmation</div>
        <div class="card-body">
            <form method="post" action="./controller/manageUserBannedController.php">

                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" id="username" type="text" name="username"
                           value="<?= $_GET['uname'] ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Admin Password</label>
                    <input class="form-control" id="exampleInputPassword1" type="password" name="password"
                           placeholder="Input Password">
                </div>

                <input type="submit" class="btn btn-danger btn-block" name="banned" value="Banned User"/>
            </form>
        </div>
    </div>
</div>
</body>
<script src="../assets/js/all.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/swiper.min.js"></script>
</html>