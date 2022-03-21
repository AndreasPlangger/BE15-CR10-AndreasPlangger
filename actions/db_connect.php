<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "BE15_CR10_AndreasPlangger_BigLibrary";

$connect = mysqli_connect($hostname, $username, $password, $dbname);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
};
