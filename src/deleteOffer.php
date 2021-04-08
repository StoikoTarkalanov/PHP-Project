<?php
include("conection.php");

$currentOffer = $_GET["data"];

$query = "DELETE FROM created_posts WHERE offer_id = '$currentOffer'";
mysqli_query($conn2, $query);
