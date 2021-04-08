<?php

function check_login($con)
{

    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }

        header("Location: index.php");
    }
}

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

function function_alert($message)
{
    echo "<script>window.alert('$message');</script>";
}

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

