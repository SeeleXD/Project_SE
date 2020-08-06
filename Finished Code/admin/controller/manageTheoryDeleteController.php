<?php
session_start();
include('../../database/connect.php');

if (!isset($_SESSION['Admin']))
    header("Location: ../manage-theory.php");

$id = $_GET['id'];

$q = "DELETE FROM theory WHERE TheoryId=?";
$s = $con->prepare($q);
$s->bind_param("s", $id);
$s->execute();

header("Location: ../manage-theory.php");
?>
