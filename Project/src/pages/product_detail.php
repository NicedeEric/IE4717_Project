<?php
    include "../dbconnect.php";
    session_start();
    // $_SESSION['userId'] = "none";
    // if (isset($_POST['userId']) && isset($_POST['password'])) {
    //     // if the user has just tried to log in
    //     $userId = $_POST['userId'];
    //     $password = $_POST['password'];
    //     // $password = md5($password);
    //     // $query = 'select * from users '
    //     //     ."where username='$userid' "
    //     //     ." and password='$password'";
    //     // $result = $dbcnx->query($query);
    //     // if ($result->num_rows >0 ) {
    //     //     // if they are in the database register the user id
    //     //     $_SESSION['userId'] = $userid;    
    //     // }
    //     // $dbcnx->close();
    //     $_SESSION['userId'] = $userid;
    // }
    $productId = $_GET["selectedProductId"];
    $query = "select * from Products where id = ".$productId.";";
    $result = $db->query($query);
    $row =$result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .homeBody {
        margin: 100px auto;
        margin-bottom: 0;
        height: 800px;
        width: 80%;
        background-color: #f5f5f5;
        z-index: 0;
    }
    body {
        min-width:1400px;
    }
    .productContent {
        width: 100%;
        height: 550px;
        background-color: #fff;
        box-shadow: 0px 5px 5px #e8e8e8;
    }
    .productGallery {
        float: left;
        width: 50%;
    }
    .productGallery img{
        width: 80%;
        height: 20%;
    }
    .productDetail {
        margin-left: 50%;
        width: 50%:
    }
    .productName {
        width: 90%;
        height: 50px;
        padding-top: 30px;
        margin: 10px auto;
        font-size: 24px;
    }
    .productName strong {
        display: -webkit-box;
        max-width: 500px;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .productPrice {
        width: 90%;
        height: 50px;
        padding-left: 5%;
        margin: 40px auto;
        font-size: 30px;
        line-height: 50px;
        background-color: #fafafa;
        color: #00b0ff;
    }
    .productCategory {
        width: 90%;
        height: 50px;
        margin: 40px auto;
        font-size: 20px;
        line-height: 50px;
    }
    .productQuantity {
        width: 90%;
        height: 50px;
        margin: 10px auto;
        font-size: 20px;
    }
    .number{
        display: inline-block;
    }
    .minus, .plus{
        width:20px;
        height:20px;
        background:#f2f2f2;
        border-radius:4px;
        padding:8px 5px 8px 5px;
        border:1px solid #ddd;
        display: inline-block;
        vertical-align: middle;
        text-align: center;
        cursor: pointer;
    }
    .productQty {
        height:34px;
        width: 100px;
        text-align: center;
        font-size: 26px;
        border:1px solid #ddd;
        border-radius:4px;
        display: inline-block;
        vertical-align: middle;
    }
    .title {
        display: inline-block;
        color: #757575;
        width: 22%;
    }
    .productOptions {
        margin-top: 30px;
    }
    .addToCartButton {
        width: 30%;
        height: 50px;
        margin-left: 5%;
        border: 2px solid #00b0ff;
        color: #00b0ff;
        background-color: #DAE9F5;
        font-size: 20px;
        cursor: pointer;
    }
    .buyNowButton {
        width: 20%;
        height: 50px;
        margin-left: 5%;
        border: none;
        color: #fff;
        background-color: #00b0ff;
        font-size: 20px;
        cursor: pointer;
    }
</style>
<body>
    <!-- Header -->
    <?php
        // includeWithVariables('./header.php', array('searchedText' => $searchedText));
        include_once('./header.php');
    ?>
    <div class="homeBody">
        <div style="height: 50px">
        </div>
        <div class="productContent">
            <div class="productGallery">
                <?php  
                    echo "<img src='".$row["img_url"]."'>"
                ?>
            </div>
            <div class="productDetail">
                <div class="productName">
                    <strong><?php  echo $row["name"]?></strong>
                </div>
                <div class="productPrice">$<?php  echo $row["price"]?></div>
                <div class="productCategory">
                    <span class="title">category</span>  
                    <?php  echo $row["category"]?></div>
                <div class="productQuantity">
                    <span class="title">Quantity</span>  
                    <div class="number">
                        <span class="minus">-</span>
                        <input type="text" value="1" name="productQty" id="productQty" class="productQty"/>
                        <span class="plus">+</span>
                    </div>
                    <span style="color: #757575; font-size: 16px;" id="productStock"><?php  echo $row["stock"]?> pieces avaiable</span>
                </div>
                <div class="productOptions">
                    <input class="addToCartButton" type="submit" value="Add To Cart">
                    <input class="buyNowButton" type="submit" value="Buy Now">
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php
        include('./footer.php')
    ?>
</body>
<script>
    var minusBtn = document.getElementsByClassName("minus")[0];
    var plusBtn = document.getElementsByClassName("plus")[0];
    var productQty = document.getElementById("productQty");
    var maxQty = parseInt(document.getElementById("productStock").innerHTML);
    minusBtn.onclick = function () {
        var count = parseInt(productQty.value) - 1;
        count = count < 1 ? 1 : count;
        productQty.value = count;
    }
    plusBtn.onclick = function () {
        var count = parseInt(productQty.value) + 1;
        count = count < 1 ? 1 : count;
        count = count > maxQty ? maxQty : count;
        productQty.value = count;
    }
</script>
</html>