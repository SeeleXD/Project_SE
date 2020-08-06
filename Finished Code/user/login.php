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

    <title>User Login</title>

    <link rel="icon" href="../assets/images/icon.png"/>
    <link rel="stylesheet" href="../assets/css/core/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/login-register.css">
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
                    <li><a class="nav-link" href="index.php">Home</a></li>
                    <li><a class="nav-link" href="register.php">Register</a></li>
                    <li><a class="nav-link active" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="bgLogin">
    <div class="boxLogin">
        <div class="mb-4"><img src="../assets/images/core/logo.png"></div>
        <form action="controller/loginController.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Input Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Input Password">
            </div>
            <input type="hidden" name="token" value=<?= $_SESSION['csrf_token']; ?>>
            <button name="submit" class="btn btn-primary" type="submit">Login</button>
        </form>
    </div>
</div>

<?php
if (isset($_SESSION['Msg'])) {
    echo "<script type='text/javascript'>
                $(document).ready(function(){
                    $(\"#errorModal\").modal();
                });
                </script>";
    unset($_SESSION['Msg']);
}
?>

</body>
<script src="../assets/js/all.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/swiper.min.js"></script>
</html>