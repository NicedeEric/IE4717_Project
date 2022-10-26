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
        width: 22.9%;
        height: 20%;
        margin: 10px;
        background-color: #fff;
        cursor: pointer;
        box-shadow: 0px 15px 10px #e8e8e8;
    }

    .singleProduct:hover {
        border: 1px solid #00b0ff;
        box-shadow: 1px 1px #00b0ff;
    }
    .productImg img {
        width: 100%;
        height: 10%;
    }
    .productName {
        margin-left: 2%;
        width: 60%;
        height: 30px;
        font-size: 18px;
        white-space: nowrap; 
        overflow:hidden;
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
    <?php
        echo "<div class='singleProduct' id='".$productRow['id']."'>"
    ?>
        <div>
            <div class="productImg">
                <?php echo "<img src='".$productRow["img_url"]."'>"?>
            </div>
            <div class="productName">
                <?php echo $productRow["name"];?>
            </div>
            <div class="productInfo">
                <span class="price">
                    $<?php echo $productRow["price"];?>
                </span>
                <span class="category">
                    <?php echo $productRow["category"];?>
                </span>
            </div>
        </div>
    <?php
        echo "</div>"
    ?>
</body>
</html>