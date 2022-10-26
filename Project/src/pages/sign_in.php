<?php
    session_start();
    if (isset($_SESSION['userId'])) {
        header('location: home.php?' . SID);
        exit();
    }
    
    include '../dbconnect.php';
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        $query = "select id from Users where username = '$username' and password = '$password';";
        $result = $db->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['userId'] = $row['id'];
            header('location: home.php?' . SID);
        }
        $db->close();
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lawrence Electronics Shops Online - Login Page</title>
    <link rel="stylesheet" href="stylesheet.css">
	<script type="text/javascript" src="">
	</script>
</head>
<body>
<header>
    <!-- <?php include 'header.php'; ?> -->
</header>
<div class="content">
    <h1>Please log in here<br></h1>
    <?php
        if (isset($username)) {
            echo "Could not log you in. Please try again. <br>";
        }
    ?>
    <form action="sign_in.php" method='post'>
        <label for="username">Username:</label><br>
        <input type="text" name="username"><br><br>
        <!-- <label for="email">Email:</label><br>
        <input type="email" name="email"><br><br> -->
        <label for="password">Password:</label><br>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Submit"><br><br>
    </form>
    <form action="sign_up.php">
        <input type="submit" value="Sign up" />
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