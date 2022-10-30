<?php
    session_start();
    if (!isset($_SESSION['userId'])) {
        header('location: sign_in.php?' . SID);
        exit();
    }
    else {
        include "../dbconnect.php";
        $userId = $_SESSION['userId'];
        $query = "select * from Users where id = ".$userId.";";
        $result = $db->query($query);
        $row =$result->fetch_assoc();
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
    .content span {
        font-size: 24px;
    }
    label {
        font-size: 24px;
        color: #777;
    }

</style>
<body>
<header>
    <?php include_once('./header.php'); ?>
</header>
<div class="homeBody">
<div style="height: 50px;"></div>
<div class="content">
    <h1>Your Profile<br><br></h1>
    <form action="profile_setting.php" method='post'>
        <label for="username">Username:</label>
        <span type="text" name="username"><?php echo $row["username"]?></span><br><br>
        <label for="email">Email:</label>
        <span type="email" name="email" id="email"><?php echo $row["email"]?></span><br><br>
        <label for="address">Address:</label>
        <span type="text" name="address"><?php echo $row["address"]?></span><br><br><br><br>
        <input class="button1" type="submit" value="Update Profile"><br>
    </form>
    <br><br>
    <br><br>
</div>
</div>
<footer>
    <?php include 'footer.php'; ?>
</footer>
</body>
</html>