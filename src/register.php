<?php
session_start();

include("conection.php");
include("functions.php");

// check if user is trying to register
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get all data from fields
    $user_name = $_POST['username'];
    $password = $_POST['password'];

    // check for empty field
    if (!empty($user_name) && !empty($password)) {

        // insert user data to database
        $user_id = random_num(20);
        $query = "INSERT INTO users (user_id, user_name, password) VALUES ('$user_id', '$user_name', '$password')";

        mysqli_query($con, $query);

        // set user ID in session
        $_SESSION["user_id"] = $user_id;

        // redirect to login page
        header("Location: login.php");
        die;
    } else {
        // sending mesage to the user that there is missing field
        function_alert("All fields are required");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" href="../css/register.css">
    <title>Register</title>
</head>

<body>
    <header class="adjusting-position">
        <h1 class="site-title"><a href="index.php">Job Offers</a></h1>
    </header>
    <section>
        <form class="form" method="POST">
            <h1>Register</h1>
            <p>
                <input type="text" name="username" placeholder="Enter Username">
            </p>
            <p>
                <input type="password" name="password" placeholder="********">
            </p>
            <p>
                <input class="btn" type="submit" value="Register">
            </p>
            <p>
                <span class="l-field">If you have profile click <a href="login.php">HERE</a></span>
            </p>
        </form>
    </section>

</body>

</html>