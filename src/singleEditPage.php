<?php
session_start();

include("conection.php");



// get current job offer to edit
$query = "SELECT * FROM created_posts WHERE offer_id=24732";
$result = mysqli_query($conn2, $query);

$offerData = mysqli_fetch_array($result, MYSQLI_ASSOC);
// echo var_dump($offerData);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/createForm.css">
    <title>Edit</title>
</head>

<body>
    <header class="adjust">
        <h1><a href="index.php">Job Offers</a></h1>
    </header>
    <section>
        <form class="form" method="POST">
            <h1>Edit Job Offer</h1>

            <p>
                <input class="text-box" type="text" name="title" placeholder="Title" value="<?php echo htmlspecialchars($offerData['title']); ?>">
            </p>
            <p>
                <input class="text-box" type="text" name="company" placeholder="Company Name" value="<?php echo htmlspecialchars($offerData['company']); ?>">
            </p>
            <p>
                <input class="text-box" type="text" name="location" placeholder="Job Location" value="<?php echo htmlspecialchars($offerData['location']); ?>">
            </p>
            </p>
            <p>
                <textarea class="text-box area" name="description" placeholder="Enter Description"><?php echo htmlspecialchars($offerData['description']); ?></textarea>
            </p>
            <p>
                <input class="text-box" type="text" name="salary" placeholder="Salary" value="<?php echo htmlspecialchars($offerData['salary']); ?>">
            </p>
            <p>
                <input class="btn" type="submit" value="Edit">
            </p>
        </form>
    </section>

</body>

</html>