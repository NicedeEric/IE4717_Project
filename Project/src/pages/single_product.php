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
        box-shadow: 5px 5px #00b0ff;
    }
    .productImg img {
        width: 100%;
        height: 10%;
    }
    .productName {
        margin-left: 2%;
        width: 80%;
        font-size: 18px;
        overflow:hidden !important;
        text-overflow: ellipsis;
    }
    .price {
        margin-left: 2%;
        font-size: 20px;
        color: #00b0ff;
    }
    .category {
        float: right;
        margin-right: 2%;
        font-size: 15px;
        color: #ccc;
    }
</style>
<body>
    <div class="singleProduct">
        <div class="productImg">
            <img src="../img/cart.png" alt="">
        </div>
        <div class="productName">
            Product Name is asdfsdfsdfasdfsofbsfjasosn
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