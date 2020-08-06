<?php
session_start();

require_once '../config/csrf_token.php';

$name = $_REQUEST['subName'];
$price = $_REQUEST['subPrice'];

if (!isset($_SESSION['User']))
    header("Location: ./login.php");

if (!$name && !$price) {
    header("Location: ../subscription.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Payment</title>

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

<div class="box">
    <div>
        <img src="../assets/images/core/logo.png" class="img">
    </div>
    <br>
    <h1 class="title">Upload Payment Receipt :</h1>
    <br>
    <div class="infosub">
        Subscription Plan : <?= $name; ?>
        <br>
        Subscription Price : $<?= $price; ?>
        <br>
        Transfer to : XXX-XXX-XXXX
    </div>
    <br>
    <form action="controller/paymentController.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="subName">
        <input type="hidden" name="subPrice">
        <input type="file" style="background-color:#333333;color:white;" name="fileToUpload">
        <input class="pricingTable-signup hvr-bounce-to-right" type="submit" name="submit"
               style="background-color:#333333;color:white;" value="Pay Now">
        <input type="hidden" name="token" value=<?= $_SESSION['csrf_token']; ?>>
    </form>
    <a href="subscription.php" class="cancel">Cancel Payment</a>
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