<?php
    include "../dbconnect.php";
    $productId = $_GET["selectedProductId"];
    $quantity = $_POST['productQty'];
    $query = "select price from Products where id = ".$productId.";";
    $result = $db->query($query);
    $row = $result->fetch_assoc();
    $price = $row['price'] * $quantity;
    header('location: payment.php?price=' . $price . '&buy_now=1');
    exit();
?>