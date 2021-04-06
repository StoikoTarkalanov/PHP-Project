<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_db";

$dbhost2 = "localhost";
$dbuser2 = "root";
$dbpass2 = "";
$dbname2 = "creating_db";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("Failed to connect!");
}

if (!$conn2 = mysqli_connect($dbhost2, $dbuser2, $dbpass2, $dbname2)) {
    die("Failed to connect!");
}
