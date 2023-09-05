<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php getTitle(); ?></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <br>
    <p>
        <img class="logo" src="images/projectLogo.jpg" width="150" height="150">
    </p>

    <h1>Welcome to Get Nailed !</h1>
    <h3>A website where you can pamper yourself</h3>

    <form action="search.php" method="GET">
        <label>What are you looking for
            <input type="text" name="search" placeholder="Search Here" />
        </label>
        <input type="submit" value="Search">
    </form>

    <p class="header">
        <a href="index.php">Home</a>
        <a href="AboutUs.php">About us</a>
        <?php if (isset($_SESSION['ID_customer'])) { ?>
            <a href="ContactUs.php">Contact us</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
        <?php } else { ?>
            <a href="LogIn.php">Login</a>
            <a href="SingUp.php">SingUp</a>
        <?php } ?>
    </p>

    <hr>