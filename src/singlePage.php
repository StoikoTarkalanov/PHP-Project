<?php
session_start();

include("conection.php");

$offer_data = $_SESSION["offer"];

$sql = "SELECT * from created_posts where offer_id='$offer_data'";
$data = $conn2->query($sql);


$allData = mysqli_fetch_array($data, MYSQLI_ASSOC);
$item = $allData[rand(0, count($allData) - 1)];
// $item = $allData;



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
									<?php echo htmlspecialchars($item['title']); ?>
								</a></h2>
							<div class="job-meta">
								<a class="meta-company" href="#">
									<?php echo htmlspecialchars($item['company']); ?>
								</a> <!-- Company Ltd -->
								<span class="meta-date">Posted on:
									<?php echo htmlspecialchars($item['date_post']); ?>
								</span> <!-- Date of Post -->
							</div>
							<div class="job-details">
								<span class="job-location">
									<?php echo htmlspecialchars($item['location']); ?>
								</span> <!-- Job Location -->
								<span class="job-type">Contract staff</span> <!-- Contarct staff -->
							</div>
						</header>

						<div class="job-body">
							<!-- Text Area Field -->
							<p>
								<?php echo htmlspecialchars($item['description']); ?>
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
				<a href="onApplyClick.php" class="button button-wide">Apply now</a>
				<a href="companyLinkRedirect.php"><?php echo htmlspecialchars($item['company']); ?>.com</a>
			</aside>
		</div>

		<h2 class="section-heading">Other related jobs:</h2>
		<ul class="jobs-listing">
			<?php foreach ($allData as $itemData) { ?>
				<li class="job-card">
					<div class="job-primary">
						<h2 class="job-title"> <a href="onPageClick.php?id=<?php echo $itemData['offer_id']; ?>">
								<?php echo htmlspecialchars($itemData['title']); ?>
							</a></h2>
						<div class="job-meta">
							<?php echo htmlspecialchars($itemData['company']); ?>
							<span class="meta-date">Posted on:
								<?php echo htmlspecialchars($itemData['date_post']); ?>
							</span>
						</div>
						<div class="job-details">
							<span class="job-location">
								<?php echo htmlspecialchars($itemData['location']); ?>
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