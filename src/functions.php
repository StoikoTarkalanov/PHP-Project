<?php

// function used to create ID 
function random_num($length)
{
    $text = "";
    if ($length < 5) {
        $length = 5;
    }

    $len = rand(4, $length);
    for ($i = 0; $i < $len; $i++) {
        $text .= rand(0, 9);
    }

    return $text;
}

// function to alert messages
function function_alert($message)
{
    echo "<script>window.alert('$message');</script>";
}

// function setting user navigatin
function set_user_navigation()
{
    $styleUser = "";
    $styleGuest = "";
    if (isset($_SESSION["user_id"])) {
        $styleUser = "style='display:block;'";
        $styleGuest = "style='display:none;'";
    } else {
        $styleUser = "style='display:none;'";
        $styleGuest = "style='display:block;'";
    }

    return array($styleUser, $styleGuest);
}
