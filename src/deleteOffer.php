<?php
session_start();

include("conection.php");
include("functions.php");

// get offer id from cookie
$currentOffer = $_COOKIE["deleteProduct"];

// deleting offer
$query = "DELETE FROM created_posts WHERE offer_id = '$currentOffer'";
$data = mysqli_query($conn2, $query);

// delete cookie
setcookie("deleteProduct", "", time() - 3600);

// redirect to all user offers
header("Location: editPage.php");
