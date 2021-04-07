<?php
session_start();

include("conection.php");
include("functions.php");
$user_data = check_login($con);

if (!isset($user_data)) {
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

        mysqli_query($conn2, $query);

        header("Location: editPage.php");
        die;
    } else {
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
    <!-- <link rel="stylesheet" href="../css/master.css"> -->
    <link rel="stylesheet" href="../css/createForm.css">
    <title>Document</title>
</head>

<body>
    <header class="adjust">
        <h1><a href="index.php">Job Offers</a></h1>
    </header>
    <section>
        <form class="form" method="POST">
            <h1>Create Job Offer</h1>

            <p>
                <!-- <label class="" for="title">Title:</label> -->
                <input class="text-box" type="text" name="title" placeholder="Title">
            </p>
            <p>
                <!-- <label class="" for="company">Company:</label> -->
                <input class="text-box" type="text" name="company" placeholder="Company Name">
            </p>
            <p>
                <!-- <label class="" for="location">Job Location:</label> -->
                <input class="text-box" type="text" name="location" placeholder="Job Location">
            </p>
            <p>
                <!-- <label class="" for="date">Date Of Creating:</label> -->
                <input class="text-box date" type="date" name="date">
            </p>
            <p>
                <!-- <label class="" for="description">Description:</label> -->
                <textarea class="text-box area" name="description" placeholder="Enter Description"></textarea>
            </p>
            <p>
                <!-- <label class="" for="salary">Salary:</label> -->
                <input class="text-box" type="text" name="salary" placeholder="Salary">
            </p>
            <p>
                <input class="btn" type="submit" value="Create">
            </p>
        </form>
    </section>

</body>

</html>