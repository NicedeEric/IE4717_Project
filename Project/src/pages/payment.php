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
<body>
<header>
    <!-- <?php include 'header.php'; ?> -->
</header>
<div class="content">
    <h1>You need to pay <?php echo number_format($_GET['price'], 2); ?><br></h1>
    <form action="handle_payment.php">
        <input type="submit" value="Make payment" />
    </form>
    <br>
    <form action="cart.php">
        <input type="submit" value="Back to cart" />
    </form>
</div>
<footer>
    <!-- <?php include 'footer.php'; ?> -->
</footer>
</body>
</html>