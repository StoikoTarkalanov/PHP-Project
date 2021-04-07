<?php
session_start();

include("conection.php");

// get offer id from cookie
$offer_data = $_COOKIE["singleProductId"];

// get current job offer
$query = "SELECT * FROM created_posts WHERE offer_id='$offer_data'";
$result = mysqli_query($conn2, $query);

$offerData = mysqli_fetch_array($result, MYSQLI_ASSOC);

// get all offers
$secondQuery = "SELECT * FROM created_posts";
$allResults = mysqli_query($conn2, $secondQuery);

$allData = mysqli_fetch_array($allResults, MYSQLI_ASSOC);

// echo var_dump($offerData);
// echo '<br>';
// echo '<br>';
// echo var_dump($allData['title']);

// foreach($allData as $teds) {
// echo var_dump($teds['title']);
// }

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
								</a> <!-- Company Ltd -->
								<span class="meta-date">Posted on:
									<?php echo htmlspecialchars($offerData['date_post']); ?>
								</span> <!-- Date of Post -->
							</div>
							<div class="job-details">
								<span class="job-location">
									<?php echo htmlspecialchars($offerData['location']); ?>
								</span> <!-- Job Location -->
								<span class="job-type">Contract staff</span> <!-- Contarct staff -->
							</div>
						</header>

						<div class="job-body">
							<!-- Text Area Field -->
							<p>
								<?php echo htmlspecialchars($offerData['description']); ?>
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
				<a href="#" class="button button-wide">Apply now</a>
				<a href="#"><?php echo htmlspecialchars($offerData['company']); ?>.com</a>
			</aside>
		</div>

		<h2 class="section-heading">Other related jobs:</h2>
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