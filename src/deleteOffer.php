<?php
session_start();

include("conection.php");
include("functions.php");

$currentOffer = $_COOKIE["deleteProduct"];

$query = "DELETE FROM created_posts WHERE offer_id = '$currentOffer'";
$data = mysqli_query($conn2, $query);

setcookie("deleteProduct", "", time() - 3600);
header("Location: index.php");
