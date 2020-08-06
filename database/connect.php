<?php
$addr = 'localhost';
$username = 'root';
$password = '';
$database = 'db';

$con = new mysqli($addr, $username, $password, $database);
if ($con->connect_error) {
    die('Connection failed: ' . $con->connect_error);
}
