<?php
session_start();
include('./../database/connect.php');

if (!isset($_SESSION['User']))
    header("Location: index.php");

$q = "SELECT * FROM users WHERE UserId=?";
$s = $con->prepare($q);
$s->bind_param("s", $_SESSION['User']);
$s->execute();

$res = $s->get_result();
$res = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

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
                    <li><a class="nav-link active" href="home.php">Home</a></li>
                    <li><a class="nav-link" href="theory.php">Theory</a></li>
                    <li><a class="nav-link" href="subscription.php">Subscription</a></li>
                    <li><a class="nav-link" href="controller/logoutController.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div id="profile" class="col-12 row">
    <div class="col-4 profilepic">
        <img src="../assets/images/home/profile-picture.png" class="rounded-circle image" style="float:right">
    </div>
    <div class="col-7 info">
        <h1><?= $res['Username']; ?></h1>
        <ul class="a">Subscription :
            <li style="color:blue;strong;padding-left:2em;"><?= $res['Subscription']; ?></li>
        </ul>
    </div>
</div>

<div id="NewsSuggestion" class="col-12 row">
    <table id="tableNews">
        <tr>
            <th>
                <img src="../assets/images/home/the-hacker-news.jpg" class="tableImg">
                The Hacker News Update
            </th>
        </tr>

        <tr>
            <td>
                <a href="https://thehackernews.com/2020/04/usb-drive-botnet-malware.html" target="_blank">Malicious USB
                    Drives Infect 35,000 Computers With Crypto-Mining Botnet</a>
            </td>

        </tr>

        <tr>
            <td>
                <a href="https://thehackernews.com/2020/04/bec-scam-wire-transfer-money.html" target="_blank"> Hackers
                    Trick 3 British Private Equity Firms Into Sending Them $1.3 Million</a>
            </td>
        </tr>

        <tr>
            <td>
                <a href="https://thehackernews.com/2020/04/zero-day-warning-its-possible-to-hack.html" target="_blank">Zero-Day
                    Warning: It's Possible to Hack iPhones Just by Sending Emails</a>
            </td>
        </tr>
    </table>
    <table id="tableSuggest">
        <tr>
            <th>
                <img src="../assets/images/home/book.png" class="tableImg">&nbsp;Try out This Courses !
            </th>
        </tr>
        <tr>
            <td>
                <a href="" target="_blank">
                    <img src="../assets/images/home/c.png" class="tableImg">&nbsp;C Language Basic 1
                </a>
            </td>
        </tr>

        <tr>
            <td>
                <a href="" target="_blank">
                    <img src="../assets/images/home/python.png" class="tableImg">&nbsp;Python Language Basic 1
                </a>
            </td>
        </tr>

        <tr>
            <td>
                <a href="" target="_blank">
                    <img src="../assets/images/home/ctf.png" class="tableImg">&nbsp;CTF Challenge 1
                </a>
            </td>
        </tr>
    </table>
</div>


</body>
<script src="../assets/js/all.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/swiper.min.js"></script>
</html>