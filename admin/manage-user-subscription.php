<?php
session_start();
include('../database/connect.php');

if (!isset($_SESSION['Admin']))
    header("Location: login.php");
else if (!isset($_GET['uname']))
    header("Location: manage-user.php");

$sql = "SELECT UserId, Username, Subscription FROM users WHERE username=?";
$ps = $con->prepare($sql);
$ps->bind_param("s", $_GET['uname']);
$ps->execute();
$result = $ps->get_result();

if ($result->num_rows === 0)
    header("Location: manage-user.php");
$result = $result->fetch_assoc();

$photo_sql = "SELECT * FROM payment WHERE UserID=?";
$photo_ps = $con->prepare($photo_sql);
$photo_ps->bind_param("s", $result['UserId']);
$photo_ps->execute();
$photo_result = $photo_ps->get_result();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User Page</title>

    <link href="../assets/css/core/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/core/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="icon" href="../assets/images/icon.png"/>
    <link rel="stylesheet" href="../assets/css/core/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/errorModal.css">
    <link rel="stylesheet" href="../assets/css/errorModal.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/manage-user.css">

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
                    <li><a class="nav-link active" href="manage-user.php">Manage User</a></li>
                    <li><a class="nav-link" href="manage-theory.php">Manage Theory</a></li>
                    <li><a class="nav-link" href="controller/logoutController.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container mt-5 pt-5">

    <div class="d-flex flex-row justify-content-between m-3">
        <h1 class="font-weight-light text-center text-lg-left "><?= $result['Username'] ?></h1>
        <button type="button" class="btn btn-danger btn-sm ">
            <a class="text-light" href="./manage-user.php">Back</a>
        </button>
    </div>

    <hr class="mt-2 mb-3">

    <div class="row text-center text-lg-left">
        <?php
        if ($photo_result->num_rows === 0) {
            ?>
            <h3 class="font-weight-light text-center text-lg-left ml-3 mb-0">No Payment Upload !</h3>
            <?php
        } else {
            ?>
            <form action="./controller/manageUserSubscriptionController.php" method="post"
                  class="d-flex flex-column m-3"
                  style="width: 100%">
                <h3 class="font-weight-light text-center text-lg-left ml-3 mb-0">Subscription Type:</h3>
                <div class="d-flex flex-row ml-3 mb-0">
                    <div class="form-check mr-3">
                        <input class="form-check-input" type="radio" name="subscription" id="Free"
                               value="Free" <?= ($result['Subscription'] == 'Free') ? "checked" : ""; ?>/>
                        <label class="form-check-label h5" for="Free">
                            Free Subscription
                        </label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" type="radio" name="subscription" id="Ultimate"
                               value="Ultimate" <?= ($result['Subscription'] == 'Ultimate') ? "checked" : ""; ?>/>
                        <label class="form-check-label h5" for="Ultimate">
                            Ultimate Subscription
                        </label>
                    </div>
                    <div class="form-check mr-3">
                        <input class="form-check-input" type="radio" name="subscription" id="Premium"
                               value="Premium" <?= ($result['Subscription'] == 'Premium') ? "checked" : ""; ?>/>
                        <label class="form-check-label h5" for="Premium">
                            Premium Subscription
                        </label>
                    </div>
                </div>
                <input type="hidden" name="userid" value="<?= $result['UserId'] ?>">
                <input type="submit" class="btn btn-primary btn-sm mt-1" value="Save"/>
            </form>
            <?php
            while ($row = $photo_result->fetch_assoc()) {
                ?>
                <div class="col-lg-3 col-md-4 col-6 mt-2">
                    <img id="myImg" class="img-fluid img-thumbnail" style="width:100%;max-width:300px"
                         src="../assets/images/transaction/<?= $row['PaymentPath'] ?>" alt="<?= $row['PaymentPath'] ?>">
                </div>
                <?php
            }
        }
        ?>

    </div>

</div>
</body>
<script src="../assets/js/all.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/swiper.min.js"></script>
</html>