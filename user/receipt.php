<?php
session_start();
$name = $_REQUEST['subname'];
$price = $_REQUEST['subprice'];

if (!isset($_SESSION['User']))
    header("Location: login.php");

if (!$name && !$price) {
    header("Location: ./subscription.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>

    <link rel="icon" href="../assets/images/core/icon.png"/>
    <link rel="stylesheet" href="../assets/css/core/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/errorModal.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/user.css">
    <link rel="stylesheet" href="../assets/css/subscription.css">

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
                    <li><a class="nav-link" href="home.php">Home</a></li>
                    <li><a class="nav-link" href="theory.php">Theory</a></li>
                    <li><a class="nav-link active" href="subscription.php">Subscription</a></li>
                    <li><a class="nav-link" href="controller/logoutController.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="box pt-5 mt-5 center flex-column">
    <div>
        <img src="../assets/images/core/logo.png" class="img">
    </div>
    <br>
    <h1 class="title">Payment Details :</h1>
    <br>
    <div class="infosub">
        Subscription Plan : <?= $name; ?>
        <br>
        Subscription Price : $<?= $price; ?>
    </div>
    <br>
    <form action="payment.php" method="POST">
        <input type="hidden" name="subName" value=<?= $name; ?>>
        <input type="hidden" name="subPrice" value=<?= $price; ?>>
        <button class="pricingTable-signup hvr-bounce-to-right" type="submit"
                style="background-color:#333333;color:white;">Pay Now
        </button>
    </form>
    <a href="subscription.php" class="cancel">Change Plan</a>
</div>
</body>
<script src="../assets/js/all.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/swiper.min.js"></script>
</html>