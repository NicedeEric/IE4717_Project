<?php
    session_start();
    if (!isset($_SESSION['userId'])) {
        header('location: sign_in.php?' . SID);
        exit();
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lawrence Electronics Shops Online - Profile Setting Page</title>
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
        background-color: #fff;
        box-shadow: 0px 5px 5px #e8e8e8;
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
<div style="height: 50px;"></div>
<div class="content">
    <h1>Please update your profile here<br><br></h1>
    <form action="handle_profile_setting.php" method='post'>
        <label for="username">New Username:</label><br>
        <input type="text" name="username"><br><br>
        <label for="email">New Email:</label><br>
        <input type="email" name="email" id="email"><br><br>
        <label for="password">New Password:</label><br>
        <input type="password" name="password" id="password"><br><br>
        <label for="password2">New Password Confirmation:</label><br>
        <input type="password" name="password2"><br><br>
        <label for="address">New Address:</label><br>
        <input type="text" name="address"><br><br><br><br>
        <input class="button1" type="submit" value="Submit"><br>
    </form>
    <script type = "text/javascript" src = "../JS/form_validator.js">
    </script>
    <br><br>
    <form action="profile.php">
        <input class="button2" type="submit" value="Cancel" />
    </form>
    <br><br>
</div>
</div>
<footer>
    <?php include 'footer.php'; ?>
</footer>
</body>
</html>