<?php
session_start();

include('conection.php');

if (isset($_SESSION['user_id']) && isset($_COOKIE["singleProductId"])) {
	$offer_data = $_COOKIE["singleProductId"];

	// get current job offer
	$query = "SELECT * FROM created_posts WHERE offer_id = '$offer_data'";
	$result = mysqli_query($conn2, $query);

	$userOffers = mysqli_fetch_array($result, MYSQLI_ASSOC);
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
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
	<div class="site-wrapper">
		<header class="site-header">
			<h1 class="site-title"><a href="index.php">Job Offers</a></h1>
		</header>

		<ul class="jobs-listing">
			<?php foreach ($userOffers as $item) { ?>

				<li class="job-card">
					<div class="job-primary">
						<h2 class="job-title"><a href="javascript:void(0)" onclick="test(<?php echo htmlspecialchars($item['offer_id']); ?>)">
								<?php echo htmlspecialchars($item['title']); ?>
							</a></h2>
						<div class="job-meta">
							<a class="meta-company" href="javascript:void(0)">
								<?php echo htmlspecialchars($item['company']); ?>
							</a>
							<span class="meta-date">Posted on:
								<?php echo htmlspecialchars($item['date_post']); ?>
							</span>
						</div>

					</div>
					<div class="job-edit">
						<a href="#">Edit</a>
						<a href="#">Delete</a>
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
	<script>
		function test(id) {
			setCookie('singleProductId', id, 1000);

			window.open("singlePage.php", "_self");
		}

		function setCookie(cname, cvalue, exdays) {
			let d = new Date();
			d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
			let expires = "expires=" + d.toUTCString();
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		}
	</script>
</body>

</html>