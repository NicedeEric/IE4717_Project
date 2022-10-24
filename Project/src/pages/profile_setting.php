<?php
    session_start();
    if (!isset($_SESSION['valid_user'])) {
        header('location: login.php?' . SID);
        exit();
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lawrence Electronics Shops Online - Profile Setting Page</title>
    <link rel="stylesheet" href="stylesheet.css">
	<script type="text/javascript" src="">
	</script>
</head>
<body>
<header>
    <!-- <?php include 'header.php'; ?> -->
</header>
<div class="content">
    <h1>Please update your profile here<br></h1>
    <form action="profile_update.php" method='post'>
        <label for="username">New Username:</label><br>
        <input type="text" name="username"><br><br>
        <label for="email">New Email:</label><br>
        <input type="email" name="email"><br><br>
        <label for="password">New Password:</label><br>
        <input type="password" name="password"><br><br>
        <label for="password2">New Password Confirmation:</label><br>
        <input type="password" name="password2"><br><br>
        <label for="address">New Address:</label><br>
        <input type="text" name="address"><br><br>
        <input type="submit" value="Submit"><br>
    </form>
    <br><br>
    <form action="home.php">
        <input type="submit" value="Back to Homepage" />
    </form>
    <br><br>
</div>
<footer>
    <!-- <?php include 'footer.php'; ?> -->
</footer>
</body>
</html>