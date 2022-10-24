<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lawrence Electronics Shops Online - Profile Update Page</title>
    <link rel="stylesheet" href="stylesheet.css">
	<script type="text/javascript" src="">
	</script>
</head>
<body>
<header>
    <!-- <?php include 'header.php'; ?> -->
</header>
<div class="content">
    <h1>Your profile update status<br></h1>

    <?php
        session_start();
        include 'dbconnect.php';
        if (isset($_POST['submit'])) {
            if (empty($_POST['username']) && empty($_POST['email']) && empty($_POST['password']) &&
                empty($_POST['password2']) && empty($_POST['address'])) {
                echo "Please fill in the records you want to update.";
                echo "<form action=\"profile_update.php\"><input type=\"submit\" value=\"Back to Profile update\" /></form>";
                return;
            }
        }

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $address = $_POST['address'];
        $id = $_SESSION['valid_user'];
        $fail = FALSE;

        if ($password != $password2) {
            echo "Sorry, passwords do not match.";
            echo "<form action=\"profile_update.php\"><input type=\"submit\" value=\"Back to Profile update\" /></form>";
            return;
        }

        if (!empty($password)) {
            $password = md5($password);
            $sql = "update User set password = '$password' where id = '$id';";
            $result = $db->query($sql);
            if (!$result) {
                $fail = TRUE;}
        }

        if (!empty($username)) {
            $sql = "update User set username = '$username' where id = '$id';";
            $result = $db->query($sql);
            if (!$result) {
                $fail = TRUE;}
        }

        if (!empty($email)) {
            $sql = "update User set email = '$email' where id = '$id';";
            $result = $db->query($sql);
            if (!$result) {
                $fail = TRUE;}
        }

        if (!empty($address)) {
            $sql = "update User set address = '$address' where id = '$id';";
            $result = $db->query($sql);
            if (!$result) {
                $fail = TRUE;}
        }

        if ($fail) {
            echo "Your query failed.";
            echo "<form action=\"profile_update.php\"><input type=\"submit\" value=\"Back to Profile update\" /></form>";
        }
        else {
            echo "Your profile is successfully updated.";
        }
    ?>

    <br>
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