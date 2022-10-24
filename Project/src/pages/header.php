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
    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        height: 100px;
        margin: 0 auto;
        z-index: 1;
    }
    img {
        width: 50px;
        height: 50px;
    }
    .welcome {
        position: absolute;
        left: 0; 
    }
    .optionBar {
        font: 24px;
        color: #fff;
    }
    .options {
        position: absolute;
        right: 0;
        margin: 0 auto;
    }
    .options span {
        margin: 0 10px;
        float: right;
        cursor: pointer;
        color: #fff;
    }
    .searchBar {
        position: absolute;
        width: 100%;
        height: 70px;
        top: 30px;
    }
    .logo {
        position: absolute;
        width: 20%;
        left: 8%;
        top: -2px;
    }
    .logo img {
        width: 30%;
        height: 20%;
        cursor: pointer;
    }
    .searchBox {
        position: absolute;
        width: 85%;
        left: 18%;
    }
    .cart {
        position: absolute;
        left: 83%;
        cursor: pointer;
    }
    .searchBar div {
        display: inline-block;
    }
    .searchBox input {
        position: absolute;
        top: 8px;
        height: 35px;
        width: 70%;
    }
</style>
<body>
    <div class="navbar mainColor">
        <div class="optionBar">
            <div class="welcome">
                Welcome to Lawrence's Shop
            </div>
            <div class="options">
                <?php
                    if ($_SESSION["userId"] == "none") {
                        echo "<a href='sign_in.php'><span>Sign In</span></a>";
                        echo "<a href='sign_up.php'><span>Sign Up</span></a>";
                    }
                    else {
                        echo "<a href='cart.php'><span>Shopping Cart</span></a>";
                        echo "<a href='profile_setting.php'><span>My Account</span></a>";
                    }
                ?>    
            </div>
        </div>
        <div class="searchBar">
            <div class="logo">
                <a href="home.php"><img src="../img/Lawrence_logo.png" alt="Lawrence's store"></a>    
            </div>
            <div class="searchBox">
                <input type="text">
            </div>
            <div class="cart">
                <a href="cart.php"><img src="../img/cart.png" alt="shopping cart logo"></a>
            </div>
        </div>
    </div>
</body>
</html>