<?php
    session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lawrence Electronics Shops Online - Payment Confirmation Page</title>
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
</style>
<body>
<header>
    <?php include_once('./header.php'); ?>
</header>
<div class="homeBody">
<div class="content">
    <h1>Payment confirmation<br><br></h1>

    <?php
        session_start();
        include '../dbconnect.php';
        $id = $_SESSION['userId'];

        $sql = "select email from Users where id = '$id';";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();
        $email = $row['email'];

        $to = $email;
        $subject = 'Payment Confirmation';
        $message = 'Hi, your purchase is successful. Thank you for shopping with Lawrence Electronics Store Online!';
        mail($to, $subject, $message);
        echo ("Mail sent to : " . $to);

        if ($_GET['buy_now'] != 1) {
            unset($_SESSION['cart']);
        }
    ?>

    <br><br>
    <form action="home.php">
        <input class="button1" type="submit" value="Back to Shopping" />
    </form>
    <br><br>
</div>
</div>
<footer>
    <?php include 'footer.php'; ?>
</footer>
</body>
</html>