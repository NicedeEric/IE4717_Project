<?php
    session_start();
    if (!isset($_SESSION['userId'])) {
        header('location: sign_in.php?' . SID);
        exit();
    }
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (isset($_GET['empty'])) {
        unset($_SESSION['cart']);
        header('location:' . $_SERVER['PHP_SELF'] . '?' . SID);
        exit();
    }

    if (isset($_GET['selectedProductId'])) {
        $productId = $_GET["selectedProductId"];
        $quantity = $_POST['productQty'];
        $_SESSION['cart'][] = [$productId, $quantity];
        header('location:' . $_SERVER['PHP_SELF'] . '?' . SID);
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lawrence Electronics Shops Online - Shopping Cart Page</title>
    <link rel="stylesheet" href="stylesheet.css">
	<script type="text/javascript" src="">
	</script>
</head>
<body>
<header>
    <!-- <?php include 'header.php'; ?> -->
</header>
<div class="content">
    <h1>Your Shopping Cart<br></h1>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include "../dbconnect.php";
                $total = 0;
                for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                    $query = "select name, price from Products where id = " . $_SESSION['cart'][$i][0];
                    $result = $db->query($query);
                    $row = $result->fetch_assoc();
                    $name = $row['name'];
                    $price = $row['price'];
                    $qty = $_SESSION['cart'][$i][1];
                    echo '<tr>';
                    echo '<td>' . $name . '</td>';
                    echo '<td>' . $qty . '</td>';
                    echo '<td>' . number_format($price * $qty, 2) . '</td>';
                    echo '</tr>';
                    $total = $total + $price * $qty;
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total: </th>
                <th><?php echo number_format($total, 2) ?></th>
            </tr>
        </tfoot>
    </table>
    <br><br>
    <form action="home.php">
        <input type="submit" value="Continue shopping" />
    </form>
    <form action="payment.php" method="get">
        <input type="hidden" name="price" value=<?php echo $total; ?> /> 
        <input type="submit" value="Proceed to payment" />
    </form>
    <form action="cart.php?" method="get">
        <input type="hidden" name="empty" value=1 />
        <input type="submit" value="Empty your cart" />
    </form>
</div>
<footer>
    <!-- <?php include 'footer.php'; ?> -->
</footer>
</body>
</html>