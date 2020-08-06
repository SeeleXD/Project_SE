<?php
session_start();
include('../../database/connect.php');

if (!isset($_SESSION['Admin']))
    header("Location: ../manage-theory.php");

$title = $_POST['title'];
$content = htmlentities($_POST['content']);
$subscription = $_POST['subscription'];

if (empty($content))
    header("Location: ../manage-theory.php");

$q = "INSERT INTO theory(TheorySubscription, Title, Content) VALUES (?,?,?)";
$s = $con->prepare($q);
$s->bind_param("sss", $subscription, $title, $content);
$s->execute();

header("Location: ../manage-theory.php");


