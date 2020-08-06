<?php
session_start();
include('./modal/notice.php');
if (!isset($_SESSION['User']))
    header("Location: ./login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Subscription</title>

    <link rel="icon" href="../assets/images/icon.png"/>
    <link rel="apple-touch-icon" href="../assets/images/icon.png">
    <link rel="stylesheet" href="../assets/css/core/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/errorModal.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/user.css">

    <script src="../assets/js/jquery.min.js"></script>
</head>
<body>
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

<div id="pricing" class="section lb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Subscription</h3>
            <p>Upgrade Your Experience <strong>starting from $45 per Month !</strong> Get Access to more modules,
                courses, and VMs.</p>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="price-value">$0
                        <span class="month">Free Subscription</span>
                    </div>
                    <h3 class="title">Standard</h3>
                    <ul class="pricing-content">
                        <li>3 Free Courses</li>
                        <li>Live Support</li>
                        <li><s>Priority to Get New Courses</s></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="pricingTable active">
                    <div class="price-value">$30
                        <span class="month">monthly</span>
                    </div>
                    <h3 class="title">Ultimate</h3>
                    <ul class="pricing-content">
                        <li>Unlimited Access to All Courses</li>
                        <li>24/7 Priority Live Support</li>
                        <li>Priority to Get New Courses</li>
                    </ul>
                    <form action="receipt.php" method="POST">
                        <input type="hidden" name="subname" value="Ultimate">
                        <input type="hidden" name="subprice" value="30">
                        <button class="pricingTable-signup hvr-bounce-to-right" type="submit">Get Started</button>
                    </form>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="price-value">$15
                        <span class="month">monthly</span>
                    </div>
                    <h3 class="title">Premium</h3>
                    <ul class="pricing-content">
                    <li>All Perks from Standard Subscription</li>
                        <li>3 Additional Courses Every Month</li>
                        <li>Live Support</li>
                        <li><s>Priority to Get New Courses</s></li>
                    </ul>
                    <form action="receipt.php" method="POST">
                        <input type="hidden" name="subname" value="Premium">
                        <input type="hidden" name="subprice" value="15">
                        <button class="pricingTable-signup hvr-bounce-to-right" type="submit">Get Started</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script src="../assets/js/all.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/swiper.min.js"></script>
</html>