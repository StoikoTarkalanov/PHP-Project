<?php
session_start();

include('conection.php');

$sql = "SELECT date_post, title, company, location from created_posts";
$data = $conn2->query($sql);

$allData = mysqli_fetch_all($data, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="stylesheet" href="../css/master.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<header class="site-wrapper">
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
    <a href="logout.php">Logout</a>
    <a href="createPage.php">Create</a>
</header>

<body>
    <div class="site-wrapper">
        <header class="site-header">
            <h1 class="site-title"><a href="index.php">Job Offers</a></h1>
        </header>

        <ul class="jobs-listing">

            <?php foreach ($allData as $item) { ?>

                <li class="job-card">
                    <div class="job-primary">
                        <h2 class="job-title"><a href="#">
                                <?php echo htmlspecialchars($item['title']); ?>
                            </a></h2>
                        <div class="job-meta">
                            <a class="meta-company" href="#">
                                <?php echo htmlspecialchars($item['company']); ?>
                            </a>
                            <span class="meta-date">Posted on:
                                <?php echo htmlspecialchars($item['date_post']); ?>
                            </span>
                        </div>
                        <div class="job-details">
                            <span class="job-location">
                                <?php echo htmlspecialchars($item['location']); ?>
                            </span>
                            <span class="job-type">Contract staff</span>
                        </div>
                    </div>
                    <div class="job-logo">
                        <div class="job-logo-box">
                            <img src="https://pngimg.com/uploads/php/php_PNG7.png" alt="">
                        </div>
                    </div>
                </li>

            <?php } ?>

        </ul>

        <footer class="site-footer">
            <p>Copyright 2020 | Developer links:
                <a href="editPage.php">Edits</a>,
                <a href="index.php">Home</a>,
                <a href="singlePage.php">Single</a>
            </p>
        </footer>
    </div>

</body>

</html>