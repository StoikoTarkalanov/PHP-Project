<?php
session_start();

include("conection.php");
include("functions.php");

$styleData = set_user_navigation();

$query = "SELECT * from created_posts";
$result = mysqli_query($conn2, $query);

$allData = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<nav id="user" class="nav-bar" <?php echo $styleData[0]; ?>>
    <a class="a-button a-btn" href="editPage.php">My Offers</a>
    <a class="a-button a-btn" href="singlePage.php">Single Offer</a>
    <a class="a-button a-btn" href="createPage.php">Create Offer</a>
    <a class="a-button a-btn" href="logout.php">Logout</a>
</nav>

<nav id="guest" class="nav-bar" <?php echo $styleData[1]; ?>>
    <a class="a-button a-btn" href="singlePage.php">Single Offer</a>
    <a class="a-button a-btn" href="login.php">Login</a>
    <a class="a-button a-btn" href="register.php">Register</a>
</nav>

<body>
    <div class="site-wrapper">
        <header class="site-header">
            <h1 class="site-title"><a href="index.php">Job Offers</a></h1>
        </header>

        <ul class="jobs-listing">

            <?php foreach ($allData as $item) { ?>

                <li class="job-card">
                    <div class="job-primary">
                        <h2 class="job-title"><a href="#" onclick="test(<?php echo htmlspecialchars($item['offer_id']); ?>)">
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
                               Location: <?php echo htmlspecialchars($item['location']); ?>
                            </span>
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
        <footer class="footer">
            <p>Copyright 2021</p>
        </footer>
    </div>
    <script>
        function test(id) {
            setCookie('singleProductId', id, 1000);

            window.open('singlePage.php', '_self');
        }

        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }
    </script>
</body>

</html>