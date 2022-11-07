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
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            if ($_SESSION['cart'][$i][0] == $productId) {
                $_SESSION['cart'][$i][1] = $_SESSION['cart'][$i][1] + $quantity;
                header('location:' . $_SERVER['PHP_SELF'] . '?' . SID);
                return;
            }
        }
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
    #cart {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 80%;
    }
    #cart td, #cart th {
        border: 1px solid #ddd;
        padding: 8px;
    }
    #cart tr:nth-child(even) {background-color: #f2f2f2;}
    #cart tr:hover {background-color: #ddd;}
    #cart th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #3115ad;
        color: white;
    }
</style>
<body>
<header>
    <?php include_once('./header.php'); ?>
</header>
<div class="homeBody">
<div class="content">
    <h1>Your Shopping Cart<br><br></h1>
    <table id="cart">
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
                    echo '<td>$' . number_format($price * $qty, 2) . '</td>';
                    echo '</tr>';
                    $total = $total + $price * $qty;
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total: </th>
                <th><?php echo "$" . number_format($total, 2); ?></th>
            </tr>
        </tfoot>
    </table>
    <br><br>
    <form action="home.php">
        <input class="button2" type="submit" value="Continue shopping" />
    </form>
    <br>
    <form action="payment.php" method="get">
        <input type="hidden" name="price" value=<?php echo $total; ?> /> 
        <input class="button1" type="submit" value="Proceed to payment" /><br>
    </form>
    <br>
    <form action="cart.php?" method="get">
        <input type="hidden" name="empty" value=1 />
        <input class="button2" type="submit" value="Empty your cart" />
    </form>
</div>
</div>
<footer>
    <?php include 'footer.php'; ?>
</footer>
</body>
</html>