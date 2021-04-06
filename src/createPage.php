<?php
session_start();

include("conection.php");
include("functions.php");
$user_data = check_login($con);

if (!isset($user_data)) {
    header("Location: login.php");
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date_post = $_POST['date'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];

    if (!empty($date_post) && !empty($title) && !empty($description) && !empty($company) && !empty($location) && !empty($salary)) {

        $offer_id = random_num(20);
        $query = "INSERT INTO created_posts (offer_id, date_post, title, description, company, location, salary) VALUES ('$offer_id', '$date_post', '$title', '$description', '$company','$location', '$salary')";

        $_SESSION["offer"] = $offer_id;

        mysqli_query($conn2, $query);
    } else {
        echo "You're information is invalid!";
    }

    header("Location: singlePage.php");
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <section>
        <form method="POST">
            <h1>Create Job Offer</h1>

            <p>
                <label for="title">Title:</label>
                <input type="text" name="title">
            </p>
            <p>
                <label for="company">Company:</label>
                <input type="text" name="company">
            </p>
            <p>
                <label for="location">Job Location:</label>
                <input type="text" name="location">
            </p>
            <p>
                <label for="date">Date Of Creating:</label>
                <input type="date" name="date">
            </p>
            <p>
                <label for="description">Description:</label>
                <textarea name="description"></textarea>
            </p>
            <p>
                <label for="salary">Salary:</label>
                <input type="text" name="salary">
            </p>
            <p>
                <input type="submit" value="Create">
            </p>
        </form>
    </section>

</body>

</html>