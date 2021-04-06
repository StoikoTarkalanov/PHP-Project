<?php
session_start();

include("conection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user_name = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password)) {

        $user_id = random_num(20);
        $query = "INSERT INTO users (user_id, user_name, password) VALUES ('$user_id', '$user_name', '$password')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    } else {
        echo "You're information is invalid!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <section>
        <h1>Register</h1>

        <form method="POST">
            <p>
                <label for=" username">Username:</label>
                <input type="text" name="username" placeholder="username">
            </p>
            <p>
                <label for="login-pass">Password:</label>
                <input type="password" name="password" placeholder="********">
            </p>
            <p>
                <input type="submit" value="Register">
            </p>
            <p>
                <span>If you have profile click <a href="login.php">here</a></span>
            </p>
        </form>
    </section>

</body>

</html>