<?php
session_start();
include('../database/connect.php');

$q = "SELECT * FROM theory WHERE TheoryId=?";
$s = $con->prepare($q);
$s->bind_param("s", $_GET['id']);
$s->execute();

$res = $s->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Theory Page</title>

    <link href="../assets/css/core/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/core/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="icon" href="../assets/images/core/icon.png"/>
    <link rel="stylesheet" href="../assets/css/core/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/errorModal.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <script src="../assets/js/jquery.min.js"></script>

    <script src="../assets/js/text-editor.js"></script>
</head>

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
                    <li><a class="nav-link" href="manage-user.php">Manage User</a></li>
                    <li><a class="nav-link active" href="manage-theory.php">Manage Theory</a></li>
                    <li><a class="nav-link" href="controller/logoutController.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="section-title text-center mt-5 pt-5">
    <h3 class="blockquote">EDIT THEORY</h3>
</div>

<style>
    .content {
        width: 100%;
        margin: auto;
    }
</style>

<div class="content">

    <div class="col-12 row center">
        <form action="controller/manageTheoryEditController.php" method="post">

            <input type="hidden" name="TheoryId" value="<?= $res['TheoryId'] ?>">

            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" id="title" type="text" name="title" value="<?= $res['Title'] ?>">
            </div>

            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Subscription</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="subscription" id="Free"
                               value="Free" <?= ($res['TheorySubscription'] == 'Free') ? "checked" : ""; ?>>
                        <label class="form-check-label" for="Free">
                            Free Subscription
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="subscription" id="Ultimate"
                               value="Ultimate" <?= ($res['TheorySubscription'] == 'Ultimate') ? "checked" : ""; ?>>
                        <label class="form-check-label" for="Ultimate">
                            Ultimate Subscription
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="subscription" id="Premium"
                               value="Premium" <?= ($res['TheorySubscription'] == 'Premium') ? "checked" : ""; ?>>
                        <label class="form-check-label" for="Premium">
                            Premium Subscription
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="editor">Content</label>
                <textarea type="text" name="content" id="editor"><?= $res['Content'] ?></textarea>
            </div>

            <input type="submit" class="btn btn-primary btn-block" name="edit theory" value="Edit Theory Page"/>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'));
    </script>
</div>
</body>
<script src="../assets/js/all.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/swiper.min.js"></script>
</html>