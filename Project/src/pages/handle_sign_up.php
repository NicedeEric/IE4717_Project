<?php
    function includeWithVariables($filePath, $variables = array(), $print = true) {
        $output = NULL;
        if(file_exists($filePath)){
            // Extract the variables to a local namespace
            extract($variables);
    
            // Start output buffering
            ob_start();
    
            // Include the template file
            include $filePath;
    
            // End buffering and return its contents
            $output = ob_get_clean();
        }
        if ($print) {
            print $output;
        }
        return $output;
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lawrence Electronics Shops Online - Register Page</title>
</head>
<style>
    .homeBody {
        margin: 100px auto;
        margin-bottom: 0;
        height: 1000px;
        width: 80%;
        background-color: #f5f5f5;
        z-index: 0;
    }
    .content {
        padding: 50px;
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
    <?php includeWithVariables('./header.php', array('searchedText' => $searchedText)); ?>
</header>
<div class="homeBody">
<div class="content">
    <h1>Your sign up status<br><br></h1>

    <?php
        include '../dbconnect.php';
        if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) ||
            empty($_POST['password2']) || empty($_POST['address'])) {
            echo "<p style=\"color: red\">All records to be filled in.<br><br></p>";
            echo "<form action=\"sign_up.php\"><input class=\"button1\" type=\"submit\" value=\"Back to Sign up\" /></form>";
            return;
        }

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $address = $_POST['address'];

        if ($password != $password2) {
            echo "<p style=\"color: red\">Sorry, passwords do not match.<br><br></p>";
            echo "<form action=\"sign_up.php\"><input class=\"button1\" type=\"submit\" value=\"Back to Sign up\" /></form>";
            return;
        }

        $password = md5($password);
        $sql = "insert into Users (address, username, email, password) values ('$address', '$username', '$email', '$password');";
        $result = $db->query($sql);

        if (!$result) {
            echo "<p style=\"color: red\">Your query failed.<br><br></p>";
            echo "<form action=\"sign_up.php\"><input class=\"button1\" type=\"submit\" value=\"Back to Sign up\" /></form>";
        }
        else {
            echo "<p style=\"color: green\">Welcome, " . $username . ", you are now registered.<br><br></p>";
        }
    ?>

    <br><br>
    <form action="sign_in.php">
        <input class="button2" type="submit" value="Go to Login" />
    </form>
    <br><br>
</div>
</div>
<footer>
    <?php include 'footer.php'; ?>
</footer>
</body>
</html>