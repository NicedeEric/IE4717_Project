<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lawrence Electronics Shops Online - Payment Confirmation Page</title>
    <link rel="stylesheet" href="stylesheet.css">
	<script type="text/javascript" src="">
	</script>
</head>
<body>
<header>
    <!-- <?php include 'header.php'; ?> -->
</header>
<div class="content">
    <h1>Payment confirmation<br></h1>

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
        echo ("Mail sent to : ".$to);
        unset($_SESSION['cart']);
    ?>

    <br>
    <form action="home.php">
        <input type="submit" value="Back to Shopping" />
    </form>
    <br><br>
</div>
<footer>
    <!-- <?php include 'footer.php'; ?> -->
</footer>
</body>
</html>