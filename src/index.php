<?php
session_start();

include("conection.php");
include("functions.php");

// set navigation for user/non user
$styleData = set_user_navigation();

// pagination & all data
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$no_of_records_per_page = 6;
$offset = ($pageno - 1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM created_posts";
$result = mysqli_query($conn2, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM created_posts LIMIT $offset, $no_of_records_per_page";
$allData = mysqli_query($conn2, $sql);

// search
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentWord = $_POST['word'];
    $querySearch = "SELECT * FROM created_posts WHERE title='$currentWord'";
    $resultSearch = mysqli_query($conn2, $querySearch);
    $allData = mysqli_fetch_all($resultSearch, MYSQLI_ASSOC);
}

// check if there are any offers
$checkQuery = "SELECT * FROM created_posts";
$allResults = mysqli_query($conn2, $checkQuery);

$checkData = mysqli_fetch_array($allResults, MYSQLI_ASSOC);
if ($checkData == 0) {
    function_alert("The\'re are no offers yet!");
}
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
    <link rel="stylesheet" href="../css/onSearch.css">
    <link rel="stylesheet" href="../css/pagination.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
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
    <form class="onSearch" method="post">
        <input class="text-box" type="text" name="word" placeholder="Search for offer" /><br />
        <input class="btnSubmit" type="submit" value="Search" />
    </form>

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

        <ul class="pagination">
            <li class="first"><a href="?pageno=1">First</a></li>
            <li class="<?php if ($pageno <= 1) {
                            echo 'disabled';
                        } ?> second">
                <a href="<?php if ($pageno <= 1) {
                                echo '#';
                            } else {
                                echo "?pageno=" . ($pageno - 1);
                            } ?>">Prev</a>
            </li>
            <li class="<?php if ($pageno >= $total_pages) {
                            echo 'disabled';
                        } ?> third">
                <a href="<?php if ($pageno >= $total_pages) {
                                echo '#';
                            } else {
                                echo "?pageno=" . ($pageno + 1);
                            } ?>">Next</a>
            </li>
            <li class="fourth"><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
        </ul>

        <footer class="footer">
            <p>Copyright 2021</p>
        </footer>
    </div>
    <script>
        function test(id) {
            // set cookie
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