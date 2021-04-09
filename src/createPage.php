<?php
session_start();

include("conection.php");
include("functions.php");

// set navigation for user/non user
$styleData = set_user_navigation();

// check if user is creating offer
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get all data from fields
    $date_post = date('m-d-Y');
    $title = $_POST['title'];
    $description = $_POST['description'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];

    // check for empty field
    if (!empty($title) && !empty($description) && !empty($company) && !empty($location) && !empty($salary)) {
        // get user id from session
        $user_id_session = $_SESSION["user_id"];

        // insert data to database
        $offer_id = random_num(20);
        $query = "INSERT INTO created_posts (offer_id, get_user_id, title, description, company, location, salary, date_post) VALUES ('$offer_id', '$user_id_session', '$title', '$description', '$company','$location', '$salary', '$date_post')";

        mysqli_query($conn2, $query);

        // redirect to users offers
        header("Location: editPage.php");
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
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/createForm.css">
    <title>Document</title>
</head>

<nav id="user" class="nav-bar" <?php echo $styleData[0]; ?>>
    <a class="a-button a-btn" href="singlePage.php">Single Offer</a>
    <a class="a-button a-btn" href="editPage.php">My Offers</a>
    <a class="a-button a-btn" href="createPage.php">Create Offer</a>
    <a class="a-button a-btn" href="logout.php">Logout</a>
</nav>

<nav id="guest" class="nav-bar" <?php echo $styleData[1]; ?>>
    <a class="a-button a-btn" href="singlePage.php">Single Offer</a>
    <a class="a-button a-btn" href="login.php">Login</a>
    <a class="a-button a-btn" href="register.php">Register</a>
</nav>

<body>
    <header class="adjust">
        <h1><a href="index.php">Job Offers</a></h1>
    </header>
    <section>
        <form class="form" method="POST">
            <h1>Create Job Offer</h1>

            <p>
                <input class="text-box" type="text" name="title" placeholder="Title">
            </p>
            <p>
                <input class="text-box" type="text" name="company" placeholder="Company Name">
            </p>
            <p>
                <input class="text-box" type="text" name="location" placeholder="Job Location">
            </p>
            <p>
                <textarea class="text-box area" name="description" placeholder="Enter Description"></textarea>
            </p>
            <p>
                <input class="text-box" type="text" name="salary" placeholder="Salary">
            </p>
            <p>
                <input class="btn" type="submit" value="Create">
            </p>
        </form>
    </section>

</body>

</html>