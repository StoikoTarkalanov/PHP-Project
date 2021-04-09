<?php
session_start();

include("conection.php");
include("functions.php");

// set navigation for user/non user
$styleData = set_user_navigation();

// get offer ID from cookie
$offer_data = $_COOKIE["singleProductId"];

// get current job offer
$query = "SELECT * FROM created_posts WHERE offer_id = '$offer_data'";
$result = mysqli_query($conn2, $query);

$offerData = mysqli_fetch_array($result, MYSQLI_ASSOC);

// get all offers
$secondQuery = "SELECT * FROM created_posts WHERE offer_id != '$offer_data'";
$allResults = mysqli_query($conn2, $secondQuery);

$allData = mysqli_fetch_all($allResults, MYSQLI_ASSOC);

// check if user have any offers
if (count($allData) == 0) {
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
	<link rel="stylesheet" href="../css/nav.css">
	<link rel="stylesheet" href="../css/master.css">
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
	<div class="site-wrapper">
		<header class="site-header">
			<h2 class="site-title"><a href="index.php">Job Offers</a></h2>
		</header>

		<div class="job-single">
			<main class="job-main">

				<div class="job-card">
					<div class="job-primary">
						<header class="job-header">
							<h2 class="job-title"><a href="#">
									<?php echo htmlspecialchars($offerData['title']); ?>
								</a></h2>
							<div class="job-meta">
								<a class="meta-company" href="#">
									<?php echo htmlspecialchars($offerData['company']); ?>
								</a> 
								<span class="meta-date">Posted on:
									<?php echo htmlspecialchars($offerData['date_post']); ?>
								</span> 
							</div>
							<div class="job-details">
								<span class="job-location">
									Location: <?php echo htmlspecialchars($offerData['location']); ?>
								</span> 
								<span class="job-type">Information</span> 
							</div>
						</header>

						<div class="job-body">
							<p>
								<?php echo htmlspecialchars($offerData['description']); ?>
							</p>
						</div>
						<div class="job-body">
							<p>
								Salary: <?php echo htmlspecialchars($offerData['salary']); ?>
							</p>
						</div>
					</div>
				</div>

			</main>
			<aside class="job-secondary">
				<div class="job-logo">
					<div class="job-logo-box">
						<img src="https://pngimg.com/uploads/php/php_PNG7.png" alt="">
					</div>
				</div>
				<a id="applyBtn" href="#" class="button button-wide" onclick="requestData()">Apply now</a>
				<a href="#"><?php echo htmlspecialchars($offerData['company']); ?>.com</a>
			</aside>
		</div>
		<script>
			function requestData() {
				const checkButton = document.getElementById('applyBtn').textContent;

				if (checkButton == 'Apply now') {
					document.getElementById('applyBtn').textContent = 'Cancel';
					document.getElementById('applyBtn').style.backgroundColor = 'red';
				} else {
					document.getElementById('applyBtn').textContent = 'Apply now';
					document.getElementById('applyBtn').style.backgroundColor = '#3c71fe';
				}
			}
		</script>
		<h2 class="section-heading">Other related jobs:</h2>
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
							<span class="job-type">Information</span>
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