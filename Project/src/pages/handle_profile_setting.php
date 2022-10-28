<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lawrence Electronics Shops Online - Profile Update Page</title>
    <link rel="stylesheet" href="stylesheet.css">
	<script type="text/javascript" src="">
	</script>
</head>
<style>
    .homeBody {
        margin: 100px auto;
        margin-bottom: 0;
        height: 1000px;
        width: 70%;
        padding: 50px;
        background-color: #f5f5f5;
        z-index: 0;
    }
    body {
        min-width:1400px;
    }
    .button1 {
        width: 15%;
        height: 30px;
        border: none;
        color: #fff;
        background-color: #00b0ff;
        font-size: 15px;
        cursor: pointer;
    }
    .button2 {
        width: 15%;
        height: 30px;
        border: 2px solid #00b0ff;
        color: #00b0ff;
        background-color: #DAE9F5;
        font-size: 15px;
        cursor: pointer;
    }
</style>
<body>
<header>
    <?php include_once('./header.php'); ?>
</header>
<div class="homeBody">
    <h1>Your profile update status<br><br></h1>

    <?php
        session_start();
        include '../dbconnect.php';
        if (empty($_POST['username']) && empty($_POST['email']) && empty($_POST['password']) &&
            empty($_POST['password2']) && empty($_POST['address'])) {
            echo "<p style=\"color: red\">Please fill in the records you want to update.<br><br></p>";
            echo "<form action=\"profile_setting.php\"><input class=\"button1\" type=\"submit\" value=\"Back to Profile update\" /></form>";
            return;
        }

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $address = $_POST['address'];
        $id = $_SESSION['userId'];
        $fail = FALSE;

        if ($password != $password2) {
            echo "<p style=\"color: red\">Sorry, passwords do not match.<br><br></p>";
            echo "<form action=\"profile_setting.php\"><input class=\"button1\" type=\"submit\" value=\"Back to Profile update\" /></form>";
            return;
        }

        if (!empty($password)) {
            $password = md5($password);
            $sql = "update Users set password = '$password' where id = '$id';";
            $result = $db->query($sql);
            if (!$result) {
                $fail = TRUE;}
        }

        if (!empty($username)) {
            $sql = "update Users set username = '$username' where id = '$id';";
            $result = $db->query($sql);
            if (!$result) {
                $fail = TRUE;}
        }

        if (!empty($email)) {
            $sql = "update Users set email = '$email' where id = '$id';";
            $result = $db->query($sql);
            if (!$result) {
                $fail = TRUE;}
        }

        if (!empty($address)) {
            $sql = "update Users set address = '$address' where id = '$id';";
            $result = $db->query($sql);
            if (!$result) {
                $fail = TRUE;}
        }

        if ($fail) {
            echo "<p style=\"color: red\">Your query failed.<br><br></p>";
            echo "<form action=\"profile_setting.php\"><input class=\"button1\" type=\"submit\" value=\"Back to Profile update\" /></form>";
        }
        else {
            echo "<p style=\"color: green\">Your profile is successfully updated.<br><br></p>";
        }
    ?>

    <br>
    <form action="home.php">
        <input class="button2" type="submit" value="Go to Homepage" />
    </form>
    <br><br>
</div>
<footer>
    <?php include 'footer.php'; ?>
</footer>
</body>
</html>