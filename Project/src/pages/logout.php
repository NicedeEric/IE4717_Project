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
    <?php include_once('./header.php'); ?>
</header>
<div class="homeBody">
<div class="content">
    <h1>You have logged out.<br><br></h1>
    <form action="sign_in.php">
        <input class="button1" type="submit" value="Go to Login" />
    </form>
    <br><br>
    <form action="home.php">
        <input class="button2" type="submit" value="Go to Homepage" />
    </form>
    <br><br>
</div>
</div>
<footer>
    <?php include 'footer.php'; ?>
</footer>
</body>
</html>