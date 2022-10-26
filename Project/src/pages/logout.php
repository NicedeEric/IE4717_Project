<?php
    session_start();
    unset($_SESSION['userId']);
    session_destroy();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lawrence Electronics Shops Online - Logout Page</title>
    <link rel="stylesheet" href="stylesheet.css">
	<script type="text/javascript" src="">
	</script>
</head>
<body>
<header>
    <!-- <?php include 'header.php'; ?> -->
</header>
<div class="content">
    <h1>You have logged out.<br></h1>
    <form action="sign_in.php">
        <input type="submit" value="Go to Login" />
    </form>
    <br><br>
    <form action="home.php">
        <input type="submit" value="Go to Homepage" />
    </form>
    <br><br>
</div>
<footer>
    <!-- <?php include 'footer.php'; ?> -->
</footer>
</body>
</html>