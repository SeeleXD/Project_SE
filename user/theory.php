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

$sql = "";
if ($res["Subscription"] === "Free") {
    $sql = "SELECT TheoryId, Title, Content FROM theory WHERE TheorySubscription='Free'";
} else {
    $sql = "SELECT TheoryId, Title, Content FROM theory";
}
$result = $con->query($sql);
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
                    <li><a class="nav-link active" href="theory.php">Theory</a></li>
                    <li><a class="nav-link" href="subscription.php">Subscription</a></li>
                    <li><a class="nav-link" href="controller/logoutController.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="card mt-5 pt-5">
    <div class="card-header">
        <i class="fa fa-fw fa-globe"></i>
        <strong>View Theory</strong>
    </div>
    <?php
    if ($result == true) {
        ?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr class="bg-primary text-white">
                        <th>Title</th>
                        <th></th>
                    </tr>
                    </thead>
                    <?php
                    while ($row = $result->fetch_assoc()) { ?>
                        <tbody>
                        <tr style="color: black">
                            <th><?= $row['Title']; ?></th>
                            <td class="float-right">
                                <a class="badge badge-secondary p-2"
                                   href="theory-view.php?id=<?= $row['TheoryId'] ?>">View Theory</a>
                            </td>
                        </tr>
                        </tbody>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="card-body">
            <strong>Theory Not Found</strong>
        </div>
        <?php
    }
    ?>
</div>
</body>
<script src="../assets/js/all.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/swiper.min.js"></script>