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
    <title>Lawrence Electronics Shops Online - Login Page</title>
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
    <?php
        $_SESSION["searchedText"] = $searchedText;
        include('header.php');
        // includeWithVariables('./header.php', array('searchedText' => $searchedText));
    ?>
</header>
<div class="homeBody">
<div class="content">
    <h1>Please log in here<br><br></h1>
    <?php
        if (isset($username)) {
            echo "<p style=\"color: red\">Could not log you in. Please try again. <br><br></p>";
        }
    ?>
    <form action="sign_in.php" method='post'>
        <label for="username">Username:</label><br>
        <input type="text" name="username"><br><br>
        <!-- <label for="email">Email:</label><br>
        <input type="email" name="email"><br><br> -->
        <label for="password">Password:</label><br>
        <input type="password" name="password"><br><br>
        <input class="button1" type="submit" value="Submit"><br><br>
    </form>
    <form action="sign_up.php">
        <input class="button2" type="submit" value="Sign up" />
    </form>
    <br><br>
    <form action="home.php">
        <input class="button2" type="submit" value="Go to Homepage" />
    </form>
    <br><br>
</div>
</div>
<footer>
    <?php
        include('./footer.php');
    ?>
</footer>
</body>
</html>