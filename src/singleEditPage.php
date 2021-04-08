<?php
session_start();

include("conection.php");
include("functions.php");

$styleData = set_user_navigation();

$currentOffer = $_COOKIE["currentEdit"];
// echo var_dump($currentOffer);

// get current job offer to edit
$query = "SELECT * FROM created_posts WHERE offer_id='$currentOffer'";
$result = mysqli_query($conn2, $query);

$offerData = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];
    // echo $title;

    if (!empty($title) && !empty($description) && !empty($company) && !empty($location) && !empty($salary)) {

        $secondQuery = "UPDATE CREATED_POSTS SET title='$title', description='$description', company='$company',location='$location', salary='$salary' WHERE offer_id = '$currentOffer'";
        $notifyMe = mysqli_query($conn2, $secondQuery);

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
    <link rel="stylesheet" href="../css/createForm.css">
    <link rel="stylesheet" href="../css/nav.css">
    <title>Edit</title>
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
            <h1>Edit Job Offer</h1>

            <p>
                <input class="text-box" type="text" name="title" placeholder="Title" value="<?php echo $offerData['title']; ?>">
            </p>
            <p>
                <input class="text-box" type="text" name="company" placeholder="Company Name" value="<?php echo $offerData['company']; ?>">
            </p>
            <p>
                <input class="text-box" type="text" name="location" placeholder="Job Location" value="<?php echo $offerData['location']; ?>">
            </p>
            </p>
            <p>
                <textarea class="text-box area" name="description" placeholder="Enter Description"><?php echo $offerData['description']; ?></textarea>
            </p>
            <p>
                <input class="text-box" type="text" name="salary" placeholder="Salary" value="<?php echo $offerData['salary']; ?>">
            </p>
            <p>
                <input class="btn" type="submit" name="update" value="Edit">
            </p>
        </form>
    </section>

</body>

</html>