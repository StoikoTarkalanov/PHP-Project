<?php
session_start();

include("conection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user_name = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password)) {

        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['password'] === $password) {
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");
                die;
            }
        }
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
        <h1>Login</h1>

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
                <input type="submit" value="Log in">
            </p>
            <p>
                <span>If you don't have profile click <a href="register.php">here</a></span>
            </p>
        </form>
    </section>

</body>

</html>