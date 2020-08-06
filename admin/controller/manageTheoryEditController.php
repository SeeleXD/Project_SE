<?php
session_start();
include('../../database/connect.php');

if (!isset($_SESSION['Admin']))
    header("Location: ../theory-view.php");

$title = $_POST['title'];
$content = $_POST['content'];
$id = $_POST['TheoryId'];

$q = "UPDATE theory SET Title=?, TheorySubscription=?, Content=? WHERE TheoryId=?";
$s = $con->prepare($q);
$s->bind_param("sssi", $title, $_POST['subscription'], $content, $id);
$s->execute();

header("Location: ../manage-theory.php");