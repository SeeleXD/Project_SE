<?php
session_start();
include('../database/connect.php');

if (!isset($_SESSION['Admin']))
    header("Location: login.php");

$sql = "SELECT Username, Email, Subscription FROM users WHERE isBanned=0";
$result = $con->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User Page</title>

    <link href="../assets/css/core/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/core/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="icon" href="../assets/images/core/icon.png"/>
    <link rel="stylesheet" href="../assets/css/core/bootstrap.min.css">
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
                    <li><a class="nav-link active" href="manage-user.php">Manage User</a></li>
                    <li><a class="nav-link" href="manage-theory.php">Manage Theory</a></li>
                    <li><a class="nav-link" href="controller/logoutController.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="card mt-5 pt-5">
    <div class="card-header">
        <i class="fa fa-fw fa-globe"></i>
        <strong>Manage User</strong>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr class="bg-primary text-white">
                    <th>Username</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                </thead>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tbody>
                        <tr style="color: black">
                            <th><?= $row['Username']; ?></th>
                            <td><?= $row['Email']; ?></td>
                            <td class="float-right">
                                <a class="badge badge-secondary p-2"
                                   href="manage-user-subscription.php?uname=<?= $row['Username'] ?>">Change User
                                    Subscription</a>
                                <a class="badge badge-danger p-2"
                                   href="manage-user-banned.php?uname=<?= $row['Username'] ?>">Ban User</a>
                            </td>
                        </tr>
                        </tbody>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>


</body>
<script src="../assets/js/all.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/swiper.min.js"></script>
</html>

