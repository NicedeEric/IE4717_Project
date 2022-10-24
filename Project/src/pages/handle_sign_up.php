<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lawrence Electronics Shops Online - Register Page</title>
    <link rel="stylesheet" href="stylesheet.css">
	<script type="text/javascript" src="">
	</script>
</head>
<body>
<header>
    <!-- <?php include 'header.php'; ?> -->
</header>
<div class="content">
    <h1>Your sign up status<br></h1>

    <?php
        include 'dbconnect.php';
        if (isset($_POST['submit'])) {
            if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) ||
                empty($_POST['password2']) || empty($_POST['address'])) {
                echo "All records to be filled in.";
                echo "<form action=\"sign_up.php\"><input type=\"submit\" value=\"Back to Sign up\" /></form>";
                return;
            }
        }

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $address = $_POST['address'];

        if ($password != $password2) {
            echo "Sorry, passwords do not match.";
            echo "<form action=\"sign_up.php\"><input type=\"submit\" value=\"Back to Sign up\" /></form>";
            return;
        }

        $password = md5($password);
        $sql = "insert into User (address, username, email, password) values ('$address', '$username', '$email', '$password');";
        $result = $db->query($sql);

        if (!$result) {
            echo "Your query failed.";
            echo "<form action=\"sign_up.php\"><input type=\"submit\" value=\"Back to Sign up\" /></form>";
        }
        else {
            echo "Welcome, " . $username . ", you are now registered.";
        }
    ?>

    <br>
    <form action="login.php">
        <input type="submit" value="Go to Login" />
    </form>
    <br><br>
</div>
<footer>
    <!-- <?php include 'footer.php'; ?> -->
</footer>
</body>
</html>