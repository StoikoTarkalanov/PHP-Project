<?php
session_start();

include("conection.php");
include("functions.php");

$styleData = set_user_navigation();

if (isset($_SESSION["user_id"])) {
	$offer_data = $_SESSION["user_id"];

	// get user job offers to edit
	$query = "SELECT * FROM created_posts WHERE get_user_id = '$offer_data'";
	$result = mysqli_query($conn2, $query);

	$userOffers = mysqli_fetch_all($result, MYSQLI_ASSOC);

	if (count($userOffers) == 0) {
		function_alert("You don\'t have any offers created yet! To go back press Job Offers logo!");
	}
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
			<h1 class="site-title"><a href="index.php">Job Offers</a></h1>
		</header>

		<ul class="jobs-listing">
			<?php foreach ($userOffers as $item) { ?>

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

					</div>
					<div class="job-edit">
						<a href="singleEditPage.php" onclick="onEdit(<?php echo htmlspecialchars($item['offer_id']); ?>)">Edit</a>
						<a href="deleteOffer.php" onclick="onDelete(<?php echo htmlspecialchars($item['offer_id']); ?>)">Delete</a>
					</div>
				</li>

			<?php } ?>
		</ul>
	</div>
</body>

<script>
	function onDelete(id) {
		setCookie('deleteProduct', id, 1);
	}

	function onEdit(id) {
		setCookie('currentEdit', id, 1);
	}

	function test(id) {
		setCookie('singleProductId', id, 1);

		window.open("singlePage.php", "_self");
	}

	function setCookie(cname, cvalue, exdays) {
		let d = new Date();
		d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
		let expires = "expires=" + d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}
</script>



</html>