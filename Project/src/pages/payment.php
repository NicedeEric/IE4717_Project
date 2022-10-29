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
    <title>Lawrence Electronics Shops Online - Payment Page</title>
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
    <h1>You need to pay $<?php echo number_format($_GET['price'], 2); ?><br><br></h1>
    <form action="handle_payment.php" method="get">
        <input type="hidden" name="buy_now" value=<?php echo isset($_GET['buy_now']); ?> />
        <input class="button1" type="submit" value="Make payment" />
    </form>
    <br>
    <form action="cart.php">
        <input class="button2" type="submit" value="Back to cart" />
    </form>
</div>
</div>
<footer>
    <?php include 'footer.php'; ?>
</footer>
</body>
</html>