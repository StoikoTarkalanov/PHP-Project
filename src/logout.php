<?php
session_start();

// check if user is logged 
if (isset($_SESSION['user_id'])) {
    // delete user ID from session
    unset($_SESSION['user_id']);
}

// redirect to home page
header("Location: index.php");
die;
