<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/color.css">
    <link rel="stylesheet" href="../CSS/base.css">
</head>
<style>
    .singleProduct {
        display: inline-block;
        width: 20%;
        margin: 10px;
        background-color: #fff;
        border: 1px solid #00b0ff;
    }

    .singleProduct:hover {
        padding-top: 2px;
        box-shadow: 5px 5px #00b0ff;
    }
    .productImg img {
        width: 100%;
        height: 10%;
    }
    .productName {
        font-size: 20px;
    }
    .price {
        margin-left: 2%;
        font-size: 24px;
        color: #00b0ff;
    }
    .category {
        margin-left: 70%;
        font-size: 20px;
        color: #ccc;
    }
</style>
<body>
    <div class="singleProduct">
        <div class="productImg">
            <img src="../img/cart.png" alt="">
        </div>
        <div class="productName">
            Product Name
        </div>
        <div class="productInfo">
            <span class="price">
                $product price
            </span>
            <span class="category">
                category
            </span>
        </div>
    </div>
</body>
</html>