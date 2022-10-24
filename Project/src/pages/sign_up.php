<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lawrence Electronics Shops Online - Sign Up Page</title>
    <link rel="stylesheet" href="stylesheet.css">
	<script type="text/javascript" src="">
	</script>
</head>
<body>
<header>
    <!-- <?php include 'header.php'; ?> -->
</header>
<div class="content">
    <h1>Please sign up here<br></h1>
    <form action="handle_sign_up.php" method='post'>
        <label for="username">Username:</label><br>
        <input type="text" name="username"><br><br>
        <label for="email">Email:</label><br>
        <input type="email" name="email"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password"><br><br>
        <label for="password2">Password confirmation:</label><br>
        <input type="password" name="password2"><br><br>
        <label for="address">Address:</label><br>
        <input type="text" name="address"><br><br>
        <input type="submit" value="Submit"><br><br>
    </form>
    <form action="sign_in.php">
        <input type="submit" value="Go to Login" />
    </form>
    <br><br>
</div>
<footer>
    <!-- <?php include 'footer.php'; ?> -->
</footer>
</body>
</html>