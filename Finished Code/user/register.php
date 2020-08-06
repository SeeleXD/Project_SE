<?php
session_start();
include('./modal/error.php');
require_once '../config/csrf_token.php';
if (isset($_SESSION['User']))
    header("Location: ./home.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="icon" href="../assets/images/icon.png"/>
    <link rel="stylesheet" href="../assets/css/core/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/login-register.css">
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
                    <li><a class="nav-link" href="index.php#home">Home</a></li>
                    <li><a class="nav-link active" href="register.php">Register</a></li>
                    <li><a class="nav-link" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="bgRegister">
    <div class="boxRegister">
        <div>
            <img src="../assets/images/core/logo.png">
        </div>
        <br>
        <form action="./controller/registerController.php" method="POST">
            <div class="form-group">
                <label for="email">E-mail Address</label>
                <input type="email" class="form-control" name="email" placeholder="Input E-mail">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Input Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Input Password">
            </div>
            <div class="form-group">
                <label for="confpassword">Confirm Password</label>
                <input type="password" class="form-control" name="confpassword" placeholder="Confirm Password">
            </div>
            <input type="hidden" name="token" value=<?= $_SESSION['csrf_token']; ?>>
            <button class="btn btn-primary" name="submit" type="submit">Register</button>
        </form>
    </div>
</div>
</body>
<script src="../assets/js/all.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/swiper.min.js"></script>
</html>
